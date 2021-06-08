<?php

namespace App\Http\Controllers\Admin;

use App\Models\Achievements;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\AchievementsRepository;
use App\Models\Products;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\ProductsCate;
use App\Models\Gallery;
use DB;

class AchievementsController extends Controller
{
    //
    protected $_repository;

    public function __construct(AchievementsRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $total = Achievements::count('id');
            $query = Achievements::select('id', 'image', 'title', 'slug', 'user_id', 'created_at', 'is_published');
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
                    $post->created_at,
                    "<a href='" . route('achievements.clone', $post->id) . "' class='hidden btn btn-warning btn-xs'><i class='fa fa-fw fa-eye'></i></a>&nbsp;<a href='" . route('achievements.show', $post->id) . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('achievements.destroy', $post->id) . "' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                "recordsTotal" => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.categories');
        return view('admin.page.achievements.index', compact('_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.achievements.add');
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

        if ($id && isset($request->gallery)) {
            foreach ($request->gallery as $itemGallery) {
                if (!empty($itemGallery)) {
                    $gallery = new gallery();
                    $gallery->image = $itemGallery;
                    $gallery->product_id = $id;
                    $gallery->type = 'achievements';
                    $gallery->save();
                }
            }
        }
        Session::flash('success', trans('message.admin.create'));
        return redirect()->route('achievements.show', $id);
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

        $gallery = gallery::where('type', 'achievements')->where('product_id', $id)->get();
        return view('admin.page.achievements.edit', compact('data', '_title', 'gallery'));
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
            DB::table('galleys')->where('type', 'achievements')->where('product_id', $id)->delete();
            foreach ($request->gallery as $itemGallery) {
                if (!empty($itemGallery)) {
                    $gallery = new gallery();
                    $gallery->image = $itemGallery;
                    $gallery->product_id = $id;
                    $gallery->type = 'achievements';
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
            //delete gallery
            DB::table('galleys')->where('type', 'achievements')->where('product_id', $id)->delete();
            Session::flash('success', trans('message.admin.delete'));
        } else {
            Session::flash('danger', trans('message.admin.delete'));
        }
        return redirect()->route('achievements.index');
    }

    public function clone($id)
    {
        $data = $this->_repository->find($id);
        $new = $data->replicate();
        $new->slug = $data->slug . '-' . generateRandomString(1);
        $new->push();
        Session::flash('success', trans('message.admin.clone'));
        return redirect()->route('achievements.index');
    }
}
