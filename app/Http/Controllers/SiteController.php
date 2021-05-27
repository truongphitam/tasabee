<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Categories;
use App\Repository\SliderRepository;
use App\Repository\PostRepository;
use App\Repository\ProductsRepository;
use App\Repository\AchievementsRepository;
use App\Repository\PageRepository;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Post;
use App\Models\Products;
use App\Models\ProductsCate;
use Illuminate\Support\Facades\Route;
use App\Repository\StatedRepository;
use App\Repository\SponsorRepository;

use App\Models\Slider;
use App\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    //
    protected $sliderRepository, $postRepository,
        $productsRepository, $achievementsRepository,
        $pageRepository, $statedRepository, $sponsorRepository;

    public function __construct(
        SliderRepository $sliderRepository,
        PostRepository $postRepository,
        ProductsRepository $productsRepository,
        AchievementsRepository $achievementsRepository,
        PageRepository $pageRepository,
        StatedRepository $statedRepository,
        SponsorRepository $sponsorRepository
    ) {
        $this->sliderRepository = $sliderRepository;
        $this->postRepository = $postRepository;
        $this->productsRepository = $productsRepository;
        $this->achievementsRepository = $achievementsRepository;
        $this->pageRepository = $pageRepository;
        $this->statedRepository = $statedRepository;
        $this->sponsorRepository = $sponsorRepository;
    }

    public function index()
    {
        $sliders = Slider::where('is_published', 'on')->orderBy('id', 'desc')->get();
        $products_highlight = Products::where('type', 1)->orderBy('id', 'desc')->take(6)->get();
        return view('web.page.index', compact('sliders', 'products_highlight'));
    }
    

    public function about(){
        return view('web.page.about');
    }

    public function products(){
        $data = Products::orderBy('id', 'desc')->paginate(9);
        $best_sellers = Products::orderBy('sold', 'desc')->take(5)->get();
        $cate_products = ProductsCate::where('parent_id', 0)->orderBy('id', 'desc')->get();
        // if($cate_products){
        //     foreach($cate_products as $cate){
        //         $products = Products::where()->orderBy('id', 'desc')->take()->get(); 
        //     }
        // }
        return view('web.page.products', compact('data', 'best_sellers'));
    }

    public function detailProducts($slug){
        $data = Products::with('gallery')->where('slug', $slug)->first();
        $related = Products::orderBy('id', 'desc')->get();
        return view('web.page.detailProducts', compact('data', 'related'));
    }

    public function blog(){
        $posts = Post::where('post_type', 'posts')->orderBy('id', 'desc')->paginate(9);
        //dd($posts);
        return view('web.page.blog', compact('posts'));
    }

    public function detailBlog($slug){
        $data = Post::where('slug', $slug)->first();
        return view('web.page.detailBlog', compact('data'));
    }

    public function event(){
        $posts = Post::where('post_type', 'event')->orderBy('id', 'desc')->paginate(9);
        return view('web.page.event', compact('posts'));
    }

    public function contact(){
        return view('web.page.contact');
    }

    public function postLogin(Request $request){
        $error_user_name = '';
        $error_password = '';
        $success = true;

        $username = $request->username ? $request->username : ''; 
        $password = $request->password ? $request->password : '';

        $user = User::where('email', $username)->first();
        if(empty($user)){
            $error_user_name = 'Tên đăng nhập không tồn tại';
            return response([
                'message' => $error_user_name,
                'success' => false,
                'error_user_name' => $error_user_name,
                'error_password' => $error_password
                ]);
        }
        $credentials = [
            'email' => $username,
            'password' => $password
        ];
        if (Auth::attempt($credentials)) {      
            return response([
                'message' => 'Đăng nhập thành công !',
                'success' => true,
                'error_user_name' => $error_user_name,
                'error_password' => $error_password
                ]);
        }else{
            $error_password = 'Mật khẩu không chính xác. ';
            return response([
                'message' => $error_password,
                'success' => false,
                'error_user_name' => $error_user_name,
                'error_password' => $error_password
                ]);
        }
    }
}
