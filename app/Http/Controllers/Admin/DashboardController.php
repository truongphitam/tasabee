<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Orders;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->admins = Auth::guard('admins')->user();
    }

    public function index(Request $request)
    {
        //
        $admins = Auth::guard('admins')->user();

        $orders = Orders::count();
        if($admins->role == 'accountant'){
            $orders = Orders::where('staff_id', $admins->id)->count();
        }
        $customers = User::count();
        $staff = Admins::count();
        if ($request->ajax()) {
            $admins = Auth::guard('admins')->user();
            //
            $block = $request->block ? $request->block : '';
            $days = $request->days ? $request->days : '';
            $days = explode("-", $days);
            //
            //$dates = $this->periodDays($days[0], $days[1]);
            $from = convertToYMD($days[0]).' 00:00:00';
            $to = convertToYMD($days[1]).' 23:59:59';
            $dates = $this->periodDays($from, $to);
            $orders = Orders::select('*');
            if($admins->role == 'accountant'){
                $orders = $orders->where('staff_id', $admins->id);
            }
            $orders = $orders->whereBetween('created_at',[$from, $to])->get();
            //dd($dates);
            $body_table = view('render.tr_orders')->with('orders', $orders)->render();
            $period = (object)[
                'body_table' => $body_table,
                'date' => $dates,
                'title' => '',
                'sub_total' => (object)[
                    'title' => 'Doanh Thu',
                    'total' => 0,
                    'value' => []
                ],
                'payment' => (object)[
                    'title' => 'Đã thanh toán',
                    'total' => 0,
                    'value' => []
                ],
                'discount' => (object)[
                    'title' => 'Giảm giá',
                    'total' => 0,
                    'value' => []
                ],
                'vat' => (object)[
                    'title' => 'VAT',
                    'total' => 0,
                    'value' => []
                ],
                'deposit' => (object)[
                    'title' => 'Công nợ',
                    'total' => 0,
                    'value' => []
                ],
                'status_orders_0' => (object)[
                    'title' => 'Đơn hàng mới',
                    'total' => 0,
                    'value' => []
                ],
                'status_orders_1' => (object)[
                    'title' => 'Đang xử lý',
                    'total' => 0,
                    'value' => []
                ],
                'status_orders_2' => (object)[
                    'title' => 'Đang giao hàng',
                    'total' => 0,
                    'value' => []
                ],
                'status_orders_3' => (object)[
                    'title' => 'Đã giao hàng',
                    'total' => 0,
                    'value' => []
                ],
                'status_orders_4' => (object)[
                    'title' => 'Hoàn thành',
                    'total' => 0,
                    'value' => []
                ]
            ]; 

            $_sub_total = [];
            $_payment = [];
            $_discount = [];
            $_vat = [];
            $_deposit = [];
            
            $_date = [];

            $_status_orders = [];
            foreach($period->date as $date){
                
                $data = Orders::select(
                    DB::raw('sum(sub_total) as `sub_total`'), 
                    DB::raw('sum(payment) as `payment`'), 
                    DB::raw('sum(discount) as `discount`'),
                    DB::raw('sum(vat) as `vat`'),
                    DB::raw('sum(deposit) as `deposit`')
                );
                if($admins == 'accountant'){
                    $data = $data->where('staff', $admins->id);
                }
                $data = $data->whereDate('created_at', '=', $date)->first();
                $_sub_total[] = $data->sub_total ? (int)$data->sub_total : 0;
                $_payment[] = $data->payment ? (int)$data->payment : 0;
                $_discount[] = $data->discount ? (int)$data->discount : 0;
                $_vat[] = $data->vat ? (int)$data->vat : 0;
                $_deposit[] = $data->deposit ? (int)$data->deposit : 0;
                // Tổng số đơn hàng theo trạng thái
                for($i = 0; $i < 5; $i++){
                    $status_orders = Orders::select('*');
                    if($admins == 'accountant'){
                        $status_orders = $status_orders->where('staff', $admins->id);
                    }
                    $status_orders = $status_orders->where('status_orders', $i)->whereDate('created_at', '=', $date)->count();
                    $_status_orders[$i][] = $status_orders;
                    
                }
                $_date[] = $date;
            }
            $period->sub_total->value = $_sub_total;
            $period->sub_total->total = array_sum($_sub_total);

            $period->payment->value = $_payment;
            $period->payment->total = array_sum($_payment);

            $period->discount->value = $_discount;
            $period->discount->total = array_sum($_discount);

            $period->vat->value = $_vat;
            $period->vat->total = array_sum($_vat);

            $period->deposit->value = $_deposit;
            $period->deposit->total = array_sum($_deposit);
            // trạng thái đơn hàng
            $period->status_orders_0->value = $_status_orders[0];
            $period->status_orders_0->total = array_sum($_status_orders[0]);

            $period->status_orders_1->value = $_status_orders[1];
            $period->status_orders_1->total = array_sum($_status_orders[1]);

            $period->status_orders_2->value = $_status_orders[2];
            $period->status_orders_2->total = array_sum($_status_orders[2]);

            $period->status_orders_3->value = $_status_orders[3];
            $period->status_orders_3->total = array_sum($_status_orders[3]);

            $period->status_orders_4->value = $_status_orders[4];
            $period->status_orders_4->total = array_sum($_status_orders[4]);

            $period->date = $_date;
            return response()->json(['data' => $period]);

        }
        return view('admin.page.dashboard.index', compact('orders', 'customers', 'staff'));
    }

    public function periodDays($from , $to){
        $from = Carbon::parse($from);
        $to = Carbon::parse($to);
        //dd($from);
        $dates = [];
        for($i = 0; $i <= $to->diffInDays($from); $i++){
            $dates[] = (clone $from)->addDays($i)->format('Y-m-d');
        }
        return $dates;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
    }
}
