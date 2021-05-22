<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PostRepository;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use Illuminate\Support\Facades\App;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_repository;

    public function __construct(PostRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        $post_type = $request->post_type ? $request->post_type : type_posts();
        if ($request->ajax()) {
            $post_type = $request->has('post_type') ? $request->post_type : '';
            //
            $total = $post_type ? Post::where('post_type', $post_type)->count('id') : Post::count('id');

            $query = Post::select(['*']);
            if (Auth::guard('admins')->user()->role == 'author' && Auth::guard('admins')->user()->role == 'contributor') {
                $query = $query->where('user_id', '=', Auth::guard('admins')->user()->id);
            } 

            if (isset($request->search['value']) && !empty($request->search['value'])) {
                $query = $query->where('title', 'like', '%' . $request->search['value'] . '%');
                $filtered = $query->count();
            }
            if ($post_type) {
                $query = $query->where('post_type', $post_type);
                $filtered = $query->count();
            }
            // Pagination
            $posts = $query->orderBy('id', 'desc');
            $posts = $query->skip($request->start)->take($request->length);
            $posts = $query->get();
            // Output
            $rows = [];
            $hidden = $post_type == type_purpose() ? 'hidden' : '';
            foreach ($posts as $post) {
                $routeEdit = route('post.show', $post->id) . '?post_type=' . $post_type;
                $rows[] = [
                    //$post->id,
                    "<img src='$post->image' class='img-responsive'/>",
                    $post->title,
                    $post->author->name,
                    //isset($post->categories->title) ? $post->categories->title : '',
                    //$post->stick ? 'YES' : '',
                    $post->expert,
                    $post->created_at,
                    "<a href='" . route('post.clone', $post->id) . "' class='".$hidden." btn btn-warning btn-xs'><i class='fa fa-fw fa-eye'></i></a>&nbsp;<a href='" . $routeEdit . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('post.destroy', ['id' => $post->id]) . "' class='".$hidden." btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                'recordsTotal' => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.post');
        return view('admin.page.post.index', compact('_title', 'post_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $post_type = $request->post_type ? $request->post_type : type_posts();
        $post = $this->_repository->init();

        return view('admin.page.post.add', compact('post_type', 'post'));
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
        // save post categories 
        if (isset($request->products_to_cate) && !empty($request->products_to_cate)) {
            $post = $this->_repository->find($id);
            $post->categories()->attach($request->products_to_cate);
        }

        $routeEdit = route('post.show', $id) . '?post_type=' . $request->post_type;
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
        $post = $this->_repository->find($id);
        $_title = $post->title;
        $post_type = $post->post_type;
        return view('admin.page.post.add', compact('post', '_title', 'post_type'));
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
