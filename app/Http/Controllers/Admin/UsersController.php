<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Repository\UsersRepository;
use Illuminate\Support\Facades\Session;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Excel;
class UsersController extends Controller
{
    //
    protected $_repository;

    public function __construct(UsersRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $total = User::count('id');
            $query = User::select('id', 'email', 'name', 'first_name', 'last_name', 'website', 'phone', 'address', 'role', 'image', 'created_at');
            # Category filter
//            if ($request->has('category')) {
//                $query = $query->where('cate_id', (int)$request->category);
//                $filtered = $query->count();
//            }
            # Search title
            if(Auth::guard('admins')->user()->role == 'staff'){
                $query = $query->where('user_id', Auth::guard('admins')->user()->id);
            }
            if ('' !== $search = $request->search['value']) {
                $query = $query->where('email', 'like', '%' . $search . '%');
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
                    $post->name,
                    $post->email,
                    $post->phone,
                    $post->countries ? $post->countries->name : '',
                    $post->address,
                    $post->created_at->format('d/m/Y'),
                    "<a href='" . route('users.show', $post->id) . "' class='btn btn-success btn-xs'><i class='fa fa-fw fa-edit'></i></a>&nbsp;<a onclick='return confirmDelete();return false;' href='" . route('users.destroy', $post->id) . "' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i></a>"
                ];
            }

            return response()->json([
                'data' => $rows,
                "recordsTotal" => $total,
                'recordsFiltered' => isset($filtered) ? $filtered : $total,
            ]);
        }
        $_title = trans('admin.title.list') . ' ' . trans('admin.object.member');
        return view('admin.page.users.index', compact('_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post = new User();
        $country = Country::get();
        $_title = trans('admin.title.add') . ' ' . trans('admin.object.member');
        return view('admin.page.users.add', compact('_title', 'post', 'country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->except(['_token', 'password']);
        $name = $request->first_name . ' ' . $request->last_name;
        $password = bcrypt($request->password);
        $param += ['name' => $name];
        $param += ['password' => $password];
        $param += ['user_id' => Auth::guard('admins')->user()->id];
        $id = $this->_repository->create($param);
        Session::flash('success', trans('message.admin.create'));
        return redirect()->route('users.show', $id);
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
        $country = Country::get();
        $_title = trans('admin.title.edit') . ' ' . trans('admin.object.member');
        $data = $this->_repository->find($id);
        return view('admin.page.users.edit', compact('data', '_title', 'country'));
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
        $id = $request->id;
        $param = $request->except(['_token', 'id', 'password']);
        if (!empty($request->password)) {
            $password = bcrypt($request->password);
            $param += ['password' => $password];
        }
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
        $flag = $this->_repository->destroy($id);
        if ($flag == true) {
            Session::flash('success', trans('message.admin.delete'));
        } else {
            Session::flash('danger', trans('message.admin.delete'));
        }
        return redirect()->route('member.index');
    }

    public function checkEmail(Request $request)
    {
        $flag = $this->_repository->checkEmail($request->email);
        $msg = trans('message.success.ok');
        if ($flag == false) {
            $msg = trans('message.danger.exist');
        }
        $results = [
            'success' => $flag,
            'msg' => $msg,
        ];
        $response = response()->json($results);
        $response->header('Content-Type', 'application/json');
        $response->header('charset', 'utf-8');
        return $response;
    }

    public function downloadUsers(Request $request){
        $posts = User::orderBy('id', 'desc')->get();
        $name = 'Users_'.time();
        $data = [];
        $heading = [
            'ID',
            'Tên công ty',
            'Email công ty',
            'Người liên hệ',
            'Email người liên hệ',			
            'Website',
            'Số điện thoại',
            'Địa chỉ',
            'Quốc gia',
            'Ngày tham gia'
        ];
        array_push($data, $heading);
        if($posts){
            foreach($posts as $post){
                $data[] = [
                    $post->id,
                    $post->name,
                    $post->email,
                    $post->contact_name,
                    $post->contact_email,
                    $post->website ? $post->website : '#', 
                    $post->phone, 
                    $post->address,
                    get_country($post->country) ? get_country($post->country)->name : '',
                    Carbon::parse($post->created_at)->format('d/m/Y')
                ];
            }
        }
        return Excel::create($name, function ($excel) use ($data) {
            $excel->sheet('Users', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }
}
