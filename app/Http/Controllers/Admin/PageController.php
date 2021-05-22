<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Repository\PageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Page;
use App\Models\Categories;
use Illuminate\Support\Facades\App;
use DB;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_repository;

    public function __construct(PageRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $total = Page::count('id');
            $query = Page::select('id', 'image', 'title', 'slug', 'user_id', 'created_at', 'is_published');
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
                    "<img src='$post->image' class='img-responsive'/>",
                    $post->title,
                    $post->slug,
                    $post->is_published == 'on' ? "<a role='button' class='btn btn-success btn-xs'><i class='fa fa-check-square-o'></i></a>" : "<a role='button' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-close'></i></a>",
                    $post->created_at,
                    "<a target='_blank' href='' class='hidden btn btn-warning btn-xs'><i class='fa fa-fw fa-eye'></i></a>&nbsp;<a href='" . route('page.show', $post->id) . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('page.destroy', $post->id) . "' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                "recordsTotal" => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.page');
        return view('admin.page.page.index', compact('_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $_title = trans('admin.title.add') . ' ' . trans('admin.object.page');
        return view('admin.page.page.add', compact('_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
        $slug = $this->_repository->generateSlug($slug, 0);
        $param = $request->except(['_token', 'slug']);
        $param += ['slug' => $slug];
        $id = $this->_repository->create($param);
        Session::flash('success', trans('message.admin.create'));
        return redirect()->route('page.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->_repository->find($id);
        $_title = $data->title;
        //$gallery = gallery::where('type', 'page')->where('product_id', $id)->get();
        return view('admin.page.page.edit', compact('data', '_title'));
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
        if ($id && isset($request->gallery)) {
            DB::table('gallerys')->where('type', 'page')->where('product_id', $id)->delete();
            foreach ($request->gallery as $itemGallery) {
                if (!empty($itemGallery)) {
                    $gallery = new gallery();
                    $gallery->image = $itemGallery;
                    $gallery->product_id = $id;
                    $gallery->type = 'page';
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
            $gallery = DB::table('gallerys')->where('type', 'achievements')->where('product_id', $id)->delete();
            
            Session::flash('success', trans('message.admin.delete'));
        } else {
            Session::flash('danger', trans('message.admin.delete'));
        }
        return redirect()->route('page.index');
    }

    public function clone($id)
    {
        $data = $this->_repository->find($id);
        $new = $data->replicate();
        $new->slug = $data->slug . '-' . generateRandomString(1);
        $new->push();
        Session::flash('success', trans('message.admin.clone'));
        return redirect()->route('page.index');
    }
}
