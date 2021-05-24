<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\SponsorRepository;
use Illuminate\Support\Facades\Session;
use App\Models\Sponsor;
use Illuminate\Support\Facades\App;
use Auth;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_repository;

    public function __construct(SponsorRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) { 
            $total = count($this->_repository->getAll());

            $query = Sponsor::select(['*']); 

            if (isset($request->search['value']) && !empty($request->search['value'])) {
                $query = $query->where('title', 'like', '%' . $request->search['value'] . '%');
                $filtered = $query->count();
            } 
            // Pagination
            $posts = $query->orderBy('priority', 'asc');
            $posts = $query->skip($request->start)->take($request->length);
            $posts = $query->get();
            // Output
            $rows = [];
            foreach ($posts as $post) {
                $rows[] = [
                    $post->priority,
                    $post->title,
                    $post->is_published,
                    $post->created_at,
                    "<a target='_blank' href='' class='hidden btn btn-warning btn-xs'><i class='fa fa-fw fa-eye'></i></a>&nbsp;<a href='" . route('sponsor.show', $post->id) . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('sponsor.destroy', $post->id) . "' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                'recordsTotal' => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = 'Nhà tài trợ';
        return view('admin.page.sponsor.index', compact('_title', 'post_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $post = $this->_repository->init();
        $_title = 'Thêm nhà tài trợ';
        $gallery = [];
        return view('admin.page.sponsor.add', compact('post', '_title', 'gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = $request->gallery ? $request->gallery : '';
        $param = $request->all();
        if($gallery && is_array($gallery)){
            $array = [];
            foreach($gallery as $item){
                if($item){
                    array_push($array, $item);
                }
            };
            unset($param['gallery']);
            $gallery = json_encode($array);
            //
        } 
        $param += [
            'gallery' => $gallery
        ];
        $id = $request->id;
        if(isset($id) && !empty($id)){
            // update 
            $post = $this->_repository->update($id, $param);
            Session::flash('success', trans('message.admin.update'));
        }else{
            // create
            unset($param['id']);
            $id = $this->_repository->create($param);
            Session::flash('success', trans('message.admin.create'));
        } 
        //
        return redirect()->route('sponsor.show', $id);
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
        $gallery = $post->gallery ? json_decode($post->gallery) : [];
        $_title = $post->title;
        return view('admin.page.sponsor.add', compact('post', '_title', 'gallery'));
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
