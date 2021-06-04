<?php

namespace App\Http\Controllers\Admin;

use App\Repository\SliderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_repository;

    public function __construct(SliderRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        $type = $request->type ? $request->type  : '';
        if ($request->ajax()) {
            $total = Contact::count('id');
            $query = Contact::select(['*']);
            $type = $request->type ? $request->type  : '';
            if($type){
                $query = $query->where('type', $type);
            }
            if ($request->search['value'] && !empty($request->search['value'])) {
                $query = $query->where('name', 'like', '%' . $request->search['value'] . '%');
                $filtered = $query->count();
            }
            # Pagination
            $posts = $query->orderBy('id', 'desc');
            $posts = $query->skip($request->start)->take($request->length);
            $posts = $query->get();
            # Output
            $rows = [];
            foreach ($posts as $post) {
                if($type == 'product'){
                    $rows[] = [
                        '#'.$post->id,
                        $post->name,
                        $post->phone,
                        $post->email,
                        '<a href="'.route('products.show', $post->products_id).'">'.($post->product ? $post->product->title : '').'</a>', 
                        $post->note,
                        convertToDMY($post->created_at),
                    ];
                }else{
                    $rows[] = [
                        '#'.$post->id,
                        $post->name,
                        $post->email,
                        $post->note,
                        convertToDMY($post->created_at),
                    ];
                }
            }

            return response()->json([
                'data' => $rows,
                "recordsTotal" => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.contact');
        return view('admin.page.contact.index', compact('_title', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post = new Slider();
        $_title = trans('admin.title.add') . ' ' . trans('admin.object.slider');
        return view('admin.page.slider.add', compact('_title', 'post'));
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
        $event_date = $request->event_date ? convertToYMD($request->event_date) : date('Y-m-d');
        $slug = isset($request->slug) && !empty($request->slug) ? $request->slug : $request->title[App::getLocale()];
        $param = $request->except(['_token', 'slug', 'event_date']);
        $param += ['event_date' => $event_date];
        if($id){
            $slug = $this->_repository->generateSlug($slug, $id);
            $param += ['slug' => $slug];
            $update = $this->_repository->update($id, $param);
            Session::flash('success', trans('message.admin.create'));
        }else{
            $slug = $this->_repository->generateSlug($slug, 0);
            $param += ['slug' => $slug];
            $id = $this->_repository->create($param);
            Session::flash('success', trans('message.admin.update'));
        }

        return redirect()->route('slider.show', $id);
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
        $_title = trans('admin.title.edit') . ' ' . trans('admin.object.slider');
        $post = $this->_repository->find($id);
        $post->event_date = $post->event_date ? convertToDMY($post->event_date) : date('d/m/Y');
        return view('admin.page.slider.add', compact('post', '_title'));
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
        return redirect()->route('slider.index');
    }
}
