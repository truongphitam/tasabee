<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\StatedRepository;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Stated;
use Illuminate\Support\Facades\App;
use Auth;

class StatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_repository;

    public function __construct(StatedRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            //
            $total = Stated::count('id');

            $query = Stated::select(['*']);
            if (Auth::guard('admins')->user()->role == 'author' && Auth::guard('admins')->user()->role == 'contributor') {
                $query = $query->where('user_id', '=', Auth::guard('admins')->user()->id);
            } 

            if (isset($request->search['value']) && !empty($request->search['value'])) {
                $query = $query->where('title', 'like', '%' . $request->search['value'] . '%');
                $filtered = $query->count();
            } 
            // Pagination
            $posts = $query->orderBy('id', 'desc');
            $posts = $query->skip($request->start)->take($request->length);
            $posts = $query->get();
            // Output
            $rows = [];
            foreach ($posts as $post) {
                $routeEdit = route('stated.show', $post->id);
                $rows[] = [
                    "<img width='150' src='$post->avatar' class='img-responsive'/>",
                    $post->title.'<br>'.$post->sub_title,
                    $post->author->name,
                    $post->created_at,
                    "<a href='" . route('stated.clone', $post->id) . "' class='hidden btn btn-warning btn-xs'><i class='fa fa-fw fa-eye'></i></a>&nbsp;<a href='" . $routeEdit . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('stated.destroy', ['id' => $post->id]) . "' class='hidden btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                'recordsTotal' => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.stated');
        return view('admin.page.stated.index', compact('_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.page.stated.add', compact(''));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        if(isset($id) && !empty($id)){
            // update 
            $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
            $slug = $this->_repository->generateSlug($slug, $id);
            $param = $request->except(['_token', 'slug']);
            $param += ['slug' => $slug];
            $post = $this->_repository->update($id, $param);
            Session::flash('success', trans('message.admin.update'));
        }else{
            // create
            $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
            $slug = $this->_repository->generateSlug($slug, 0);
            $param = $request->except(['_token', 'slug']);
            $param += ['slug' => $slug];
            if (Auth::guard('admins')->user()->role == 'contributor') {
                $param = $request->except(['is_published']);
            }
            $id = $this->_repository->create($param);
            Session::flash('success', trans('message.admin.create'));
        } 

        $routeEdit = route('stated.show', $id);
        //
        return redirect($routeEdit);
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
        $data = $this->_repository->find($id);
        $_title = $data->title;
        return view('admin.page.stated.add', compact('data', '_title'));
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
        if (isset($request->products_to_cate) && !empty($request->products_to_cate)) {
            $post->categories()->detach();
            $post->categories()->attach($request->products_to_cate);
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
        } else {
            Session::flash('danger', trans('message.admin.delete'));
        }
        return back();
    }

    public function clone($id)
    {
        $data = $this->_repository->find($id);
        $new = $data->replicate();
        $new->slug = $data->slug . '-' . generateRandomString(1);
        $new->push();
        //
        Session::flash('success', trans('message.admin.clone'));
        return back();
    }
}
