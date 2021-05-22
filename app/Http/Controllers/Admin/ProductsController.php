<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Repository\ProductsRepository;
use App\Models\Products;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\ProductsCate;
use App\Models\Gallery;
use App\Models\ProductsToCate;
use DB;

class ProductsController extends Controller
{
    //
    protected $_repository;

    public function __construct(ProductsRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $total = Products::count('id');
            $query = Products::select('id', 'image', 'title', 'slug', 'user_id', 'created_at', 'is_published');
            # Category filter
//            if ($request->has('category')) {
//                $query = $query->where('cate_id', (int)$request->category);
//                $filtered = $query->count();
//            }
            # Search title
            if ('' !== $search = $request->search['value']) {
                $query = $query->where('title', 'like', '%' . $search . '%');
                $filtered = $query->count();
            }
            # Pagination
            $posts = $query->orderBy('id', 'desc');
            $posts = $query->skip($request->start)->take($request->length);
            $posts = $query->get();
            # Output
            $rows = [];
            foreach ($posts as $post) {
                $rows[] = [
                    $post->id,
                    "<img src='$post->image' class='img-responsive'/>",
                    $post->title,
                    $post->slug,
                    ProductsToCate::getNameMultiCate($post->id),
                    $post->expert,
                    $post->created_at,
                    "<a href='" . route('products.clone',
                        $post->id) . "' class='btn btn-warning btn-xs'><i class='fa fa-fw fa-eye'></i></a>&nbsp;<a href='" . route('products.show',
                        $post->id) . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('products.destroy',
                        $post->id) . "' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                "recordsTotal" => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.categories');
        return view('admin.page.products.index', compact('_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post = new Products();
        $categories = [];
        $gallery = [];
        return view('admin.page.products.add', compact('post', 'categories', 'gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro_id = $request->id ? $request->id : ''; 
        $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
        $slug = $this->_repository->generateSlug($slug, 0);
        $param = $request->except(['_token', 'slug', 'id']);
        $param += ['slug' => $slug];
        //dd($param);
        if($pro_id){
            Session::flash('success', trans('message.admin.update'));
            $update = $this->_repository->update($pro_id, $param);
        }else{
            Session::flash('success', trans('message.admin.create'));
            $pro_id = $this->_repository->create($param);
        }
        if ($pro_id) {
            if (isset($request->products_to_cate)) {
                DB::table('products_to_cate')->where('products_id', $pro_id)->delete();
                foreach ($request->products_to_cate as $item) {
                    $pro_to_cate = new ProductsToCate();
                    $pro_to_cate->cate_id = $item;
                    $pro_to_cate->products_id = $pro_id;
                    $pro_to_cate->save();
                }
            }
            if (isset($request->gallery)) {
                DB::table('gallerys')->where('product_id', $pro_id)->delete();
                foreach ($request->gallery as $itemGallery) {
                    if (!empty($itemGallery)) {
                        $gallery = new gallery();
                        $gallery->image = $itemGallery;
                        $gallery->product_id = $pro_id;
                        $gallery->save();
                    }
                }
            }
        }
        return redirect()->route('products.show', $pro_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            $_post = $this->_repository->find($id);
            $_post = format_data_by_locale($_post);
            $_post->price_vnd = show_vnd($_post->price);
            return response()->json($_post);
        }
        $categories = [];
        $gallery = [];
        $post = Products::with('gallery', 'categories')->find($id);
        if($post->categories && !$post->categories->isEmpty()){
            foreach($post->categories as $category){
                array_push($categories, $category->cate_id);
            }
        } 
        //dd($categories);        
        $_title = $post->title;
        return view('admin.page.products.add', compact('post', '_title', 'categories', 'gallery'));
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
            DB::table('products_to_cate')->where('products_id', $id)->delete();
            DB::table('gallerys')->where('product_id', $id)->delete();
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
}
