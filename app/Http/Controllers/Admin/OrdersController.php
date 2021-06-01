<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Attributes;
use App\Repository\ProductsRepository;
use App\Models\Products;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\ProductsCate;
use App\Models\Gallery;
use App\Models\Orders;
use App\Models\OrdersAttached;
use App\Models\OrdersDetail;
use App\Models\ProductsToCate;
use App\User;
use DB, Excel;
use App\Repository\OrdersRepository;
class OrdersController extends Controller
{
    //
    protected $_repository;

    public function __construct(OrdersRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $total = Orders::count('id');
            $query = Orders::select('*');
            $dates = $request->date_range_by_days ? $request->date_range_by_days : '';
            $customer_id = $request->customer_id ? $request->customer_id : '';
            $staff_id = $request->staff_id ? $request->staff_id : '';
            $invoice_number = $request->invoice_number ? $request->invoice_number : '';
            $dates = explode('-', $dates);
            $from = convertToYMD($dates[0]). ' 00:00:00';
            $to = convertToYMD($dates[1]). ' 23:59:59';

            # Filter
            if ($invoice_number) {
                $query = $query->where('invoice_number', 'like', '%' . $invoice_number . '%');
                $filtered = $query->count();
            }
            if ($customer_id) {
                $query = $query->where('customer_id', (int)$customer_id);
                $filtered = $query->count();
            }
            if ($staff_id) {
                $query = $query->where('staff_id', (int)$staff_id);
                $filtered = $query->count();
            } 
            $posts = $query->orderBy('id', 'desc');
            $posts = $query->whereBetween('created_at',[$from, $to])->skip($request->start)->take($request->length);
            $posts = $query->get();
            # Output
            $rows = [];
            foreach ($posts as $post) {
                $rows[] = [
                    $post->auto_code,
                    $post->customer ? $post->customer->name : '',
                    $post->staff ? $post->staff->name : '',
                    $post->invoice_number,
                    $post->packing_list,
                    $post->bill_number,
                    convertToDMY($post->invoice_date),
                    $post->debt_term_date,
                    convertToDMY($post->debt_due_date),
                    show_title_status_orders($post->status_orders),
                    "<a href='" . route('orders.clone',
                        $post->id) . "' class='hidden btn btn-warning btn-xs'><i class='fa fa-fw fa-eye'></i></a>&nbsp;<a href='" . route('orders.show',
                        $post->id) . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('orders.destroy',
                        $post->id) . "' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                "recordsTotal" => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.orders');
        $customer = User::orderBy('id', 'desc')->get();
        $staff = Admins::where('role', 'staff')->orderBy('id', 'desc')->get();

        return view('admin.page.orders.index', compact('_title', 'customer', 'staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products_id = '';
        $post = new Orders();
        $post->auto_code = generate_code_auto('orders');
        $products = Products::orderBy('id')->get();
        $customer = User::orderBy('id', 'desc')->get();
        $staff = Admins::where('role', 'staff')->orderBy('id', 'desc')->get();
        return view('admin.page.orders.add', compact('post', 'products', 'customer', 'staff', 'products_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id ? $request->id : ''; 
        $param = $request->except(['id', '_token', 'invoice_date', 'etd', 'eta']);
        $param += [
            'invoice_date' => convertToYMD($request->invoice_date),
            'debt_due_date' => convertToYMD($request->_debt_due_date),
            'etd' => convertToYMDHIS($request->etd),
            'eta' => convertToYMDHIS($request->eta),
            'sub_total' => $request->sub_total
        ];
        //dd($param);
        if($id){
            // Update 
            //dd($param);
            DB::table('orders_details')->where('orders_id', $id)->delete();
            if ($request->hasFile('_file_contract')) {
                $file = $request->_file_contract;
                $file_contract = $file->getClientOriginalName();
                $this->uploadFile('', $file, '');
                $param += ['file_contract' => $file_contract];
            }
            $update = $this->_repository->update($id, $param);
            Session::flash('success', trans('message.admin.update'));
        }else{
            $file_contract = '';
            $file = '';
            if ($request->hasFile('_file_contract')) {
                $file = $request->_file_contract;
                $file_contract = $file->getClientOriginalName();
                $this->uploadFile('', $file, '');
            }
            // Create new
            $param += [
                'auto_code' => generate_code_auto('orders'),
                'file_contract' => $file_contract
            ];
            $id = $this->_repository->create($param);
            if($file){
                
            }
            Session::flash('success', trans('message.admin.create'));
        } 
        // Save orders detail 
        if($request->products && !empty($request->products)){
            $quantity = $request->quantity;
            $price = $request->price;
            $item_unit = $request->item_unit;
            $packing_method = $request->packing_method;
            foreach($request->products as $key => $product){
                $orders_detail = new OrdersDetail();
                $orders_detail->orders_id = $id;
                $orders_detail->price = $price[$key];
                $orders_detail->products_id = $product;
                $orders_detail->quantity = $quantity[$key];
                $orders_detail->item_unit = $item_unit[$key];
                $orders_detail->packing_method = $packing_method[$key];
                $orders_detail->sub_total = $quantity[$key] * $price[$key];
                $orders_detail->save();
            }
        }

        // attached file for orders
        if ($request->hasFile('_attached_file')) {
            DB::table('orders_attacheds')->where('orders_id', $id)->delete();
            $files = $request->_attached_file;
            if($files && !empty($files)){
                foreach($files as $file){
                    $path = public_path().'/attached/file/';
                    $file_name = $file->getClientOriginalName();
                    if(file_exists($path.$file_name)){
                        unlink($path.$file_name);
                    }
                    //
                    $attached = new OrdersAttached();
                    $attached->orders_id = $id;
                    $attached->path = $path.$file_name;
                    $attached->name = $file_name;
                    $attached->mime_type = $file->getSize() ? $file->getSize() : '';
                    $attached->size = $file->getSize() ? $file->getSize() : '';
                    $attached->save();
                    //
                    $file->move($path, $file_name);
                }
            }
        }

        return redirect()->route('orders.show', $id);
    }

    private function uploadFile($orders_id = '', $file, $type = ''){
        $path = public_path().'/attached/contract/';
        if($type == 'attached'){
            $path = public_path().'/attached/file/';
        }
        // Check file and delete if exits 
        $file_name = $file->getClientOriginalName();
        if(file_exists($path.$file_name)){
            unlink($path.$file_name);
        }
        //
        $file->move($path, $file_name);
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $products_id = [];
        $post = Orders::with('detail', 'attached')->find($id);
        if($post && $post->detail && !$post->detail->isEmpty()){
            foreach($post->detail as $detail){
                array_push($products_id, $detail->products_id);
            }
        }   
        $products_id = json_encode($products_id);
        $products = Products::orderBy('id')->get();
        $customer = User::orderBy('id', 'desc')->get();
        $staff = Admins::where('role', 'staff')->orderBy('id', 'desc')->get();
        $_title = $post->title;
        //
        $post->invoice_date = convertToDMY($post->invoice_date);
        $post->debt_due_date = convertToDMY($post->debt_due_date);
        $post->etd = convertToDMYHIS($post->etd);
        $post->eta = convertToDMYHIS($post->eta);
        return view('admin.page.orders.add', compact('_title', 'post', 'products', 'customer', 'staff', 'products_id'));      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
        $slug = $this->_repository->generateSlug($slug, $id);
        $param = $request->except(['_token', 'slug']);
        $param += ['slug' => $slug];
        $_post = $this->_repository->update($id, $param);
        $post = $this->_repository->find($id);

        if (isset($request->achievements) && !empty($request->achievements)) {
            $post->achievements()->detach();
            $post->achievements()->attach($request->achievements);
        }
        if ($id && isset($request->gallery)) {
            DB::table('gallerys')->where('product_id', $id)->delete();
            foreach ($request->gallery as $itemGallery) {
                if (!empty($itemGallery)) {
                    $gallery = new gallery();
                    $gallery->image = $itemGallery;
                    $gallery->product_id = $id;
                    $gallery->save();
                }
            }
        }
        Session::flash('success', trans('message.admin.edit'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $flag = $this->_repository->destroy($id);
        if ($flag == true) {
            Session::flash('success', trans('message.admin.delete'));
            DB::table('orders_attacheds')->where('orders_id', $id)->delete();
            DB::table('orders_details')->where('orders_id', $id)->delete();
        } else {
            Session::flash('danger', trans('message.admin.delete'));
        }
        return redirect()->route('products.index');
    }

    public function clone($id)
    {
        $data = Products::with('gallery', 'categories')->find($id);
        $new = $data->replicate();
        $new->slug = $data->slug . '-' . generateRandomString(1);
        $new->push();
        if($data->gallery && !$data->gallery->isEmpty()){
            foreach($data->gallery as $gallery){
                $gallery = new gallery();
                $gallery->image = $gallery->image;
                $gallery->product_id = $new->id;
                $gallery->save();
            }
        }
        if($data->categories && !$data->categories->isEmpty()){
            foreach($data->categories as $categories){
                $pro_to_cate = new ProductsToCate();
                $pro_to_cate->cate_id = $categories->cate_id;
                $pro_to_cate->products_id = $new->id;
                $pro_to_cate->save();
            }
        }
        Session::flash('success', trans('message.admin.clone'));
        return redirect()->route('products.index');
    }

    public function confirmStatusOrders(Request $request){
        $orders = Orders::find($request->orders_id);
        $orders->status_orders = $request->status_orders;
        $orders->save();

        return response()->json(true);
    }

    public function exportExeclForOrders(Request $request){
        $dates = $request->date_range_by_days ? $request->date_range_by_days : '';
        $customer_id = $request->customer_id ? $request->customer_id : '';
        $staff_id = $request->staff_id ? $request->staff_id : '';
        $invoice_number = $request->invoice_number ? $request->invoice_number : '';
        $dates = explode('-', $dates);
        $from = convertToYMD($dates[0]). ' 00:00:00';
        $to = convertToYMD($dates[1]). ' 23:59:59';
        $posts = Orders::select('*');
        # Filter
        if ($invoice_number) {
            $posts = $posts->where('invoice_number', 'like', '%' . $invoice_number . '%');
        }
        if ($customer_id) {
            $posts = $posts->where('customer_id', (int)$customer_id);
        }
        if ($staff_id) {
            $posts = $posts->where('staff_id', (int)$staff_id);
        } 
        $posts = $posts->orderBy('id', 'desc');
        $posts = $posts->whereBetween('created_at',[$from, $to])->get();
        $name = 'Orders_'.time();
        $data = [];
        $heading = [
            'ID',
            'Khách hàng',
            'Nhân viên',
            'Số hoá đơn',
            'Số Packing list',			
            'Số Bill',
            'Tờ khai hải quan',
            'Ngày lập hóa đơn',
            'Thời hạn công nợ',
            'Hạn công nợ',
            'Trị giá đơn hàng',
            'Tỷ giá',
            'Trị giá đơn hàng (VND)',
            'Phương thức thanh toán',
            'Thanh toán',
            'Công nợ',
            'Trạng thái đơn hàng',
        ];
        array_push($data, $heading);
        if($posts){
            foreach($posts as $post){
                $data[] = [
                    $post->auto_code,
                    $post->customer ? $post->customer->name : '',
                    $post->staff ? $post->staff->name : '',
                    $post->invoice_number,
                    $post->packing_list,
                    $post->bill_number,
                    $post->customs_declaration,
                    convertToDMY($post->invoice_date),
                    $post->debt_term_date,
                    convertToDMY($post->debt_due_date),
                    $post->sub_total .' ('.$post->currency_unit.')',
                    $post->exchange_rate,
                    $post->sub_total_vnd .' VNĐ',
                    $post->payment_method,
                    $post->payment,
                    $post->deposit,
                    show_title_status_orders($post->status_orders),
                ];
                //array_push($data, $item);
            }
        }
        return Excel::create($name, function ($excel) use ($data) {
            $excel->sheet('Orders', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }
}
