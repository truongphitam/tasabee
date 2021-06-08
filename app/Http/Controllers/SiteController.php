<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Contact;
use App\Repository\SliderRepository;
use App\Repository\PostRepository;
use App\Repository\ProductsRepository;
use App\Repository\AchievementsRepository;
use App\Repository\PageRepository;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Page;
use App\Models\Post;
use App\Models\Products;
use App\Models\ProductsCate;
use Illuminate\Support\Facades\Route;
use App\Repository\StatedRepository;
use App\Repository\SponsorRepository;

use App\Models\Slider;
use App\Models\Team;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
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

    public function email(){
        return view('mail.orders_new', compact(''));
    }
    public function index()
    {
        $sliders = Slider::where('show', 'index')->where('is_published', 'on')->orderBy('id', 'desc')->get();
        $products_highlight = Products::where('type', 1)->orderBy('id', 'desc')->take(6)->get();
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        return view('web.page.index', compact('sliders', 'products_highlight', 'posts'));
    }
    

    public function about(){
        $sliders = Slider::where('show', 'about')->where('is_published', 'on')->orderBy('id', 'desc')->get();
        $page = Page::find(2);
        $team = Team::orderBy('id', 'desc')->get();
        return view('web.page.about', compact('sliders', 'page', 'team'));
    }

    public function products(Request $request){
        $category = $request->category ? $request->category : '';
        $price = $request->price ? $request->price : '';
        $page = Page::find(3);
        $data = Products::orderBy('id', 'desc')->paginate(9);
        $data = DB::table('products_to_cate');
        $data = $data->join('products_cates', 'products_cates.id', '=', 'products_to_cate.cate_id');
        $data = $data->join('products', 'products_to_cate.products_id', '=', 'products.id');
        if($category){
            $data = $data->where('products_to_cate.cate_id', $category);
        }
        $data = $data->select('products.*')->orderBy('id', 'desc')->paginate(9);
        $best_sellers = Products::orderBy('sold', 'desc')->take(5)->get();
        $cate_products = ProductsCate::where('parent_id', 0)->orderBy('id', 'desc')->get();
        if($cate_products){
            foreach($cate_products as $cate){
                $products = DB::table('products_to_cate');
                $products = $products->join('products_cates', 'products_cates.id', '=', 'products_to_cate.cate_id');
                $products = $products->join('products', 'products_to_cate.products_id', '=', 'products.id');
                $products = $products->where('products_to_cate.cate_id', $cate->id);
                $products = $products->select('products.*')->orderBy('id', 'desc')->take(3)->get(); 
                $cate->products = $products ? $products : [];
            }
        }
        return view('web.page.products', compact('data', 'best_sellers', 'page', 'cate_products'));
    }

    public function detailProducts($slug){
        $data = Products::with('gallery')->where('slug', $slug)->first();
        $related = Products::orderBy('id', 'desc')->get();
        return view('web.page.detailProducts', compact('data', 'related'));
    }

    public function blog(Request $request){
        $keyword = $request->keyword && !empty($request->keyword) ? $request->keyword : '';
        $page = Page::find(4);
        $posts = Post::where('post_type', 'posts');
        if($keyword){
            $posts = $posts->where('title', 'like', '%' . $keyword . '%');
        }
        $posts = $posts->orderBy('id', 'desc')->paginate(9);
        //dd($posts);
        return view('web.page.blog', compact('posts', 'page', 'keyword'));
    }

    public function detailBlog($slug){
        $data = Post::where('slug', $slug)->first();
        $comment = Comment::where('type', 'post')->where('post_id', $data->id)->orderBy('id', 'desc')->get();
        $data->comment = $comment ? $comment : [];
        $next = Post::where('post_type', $data->post_type)->where('id', '>', $data->id)->orderBy('id', 'asc')->first();
        $prev = Post::where('post_type', $data->post_type)->where('id', '<', $data->id)->orderBy('id', 'desc')->first();
        return view('web.page.detailBlog', compact('data', 'next', 'prev'));
    }

    public function detailEvent($slug){
        $data = Post::where('slug', $slug)->first();
        $comment = Comment::where('type', 'post')->where('post_id', $data->id)->orderBy('id', 'desc')->get();
        $data->comment = $comment ? $comment : [];
        $next = Post::where('post_type', $data->post_type)->where('id', '>', $data->id)->orderBy('id', 'asc')->first();
        $prev = Post::where('post_type', $data->post_type)->where('id', '<', $data->id)->orderBy('id', 'desc')->first();
        return view('web.page.detailEvent', compact('data', 'next', 'prev'));
    }
    
    public function event(Request $request){
        $sliders = Slider::where('show', 'event')->where('is_published', 'on')->orderBy('id', 'desc')->get();
        $keyword = $request->keyword && !empty($request->keyword) ? $request->keyword : '';
        $page = Page::find(5);
        $posts_top = Post::where('post_type', 'event');
        if($keyword){
            $posts_top = $posts_top->where('title', 'like', '%' . $keyword . '%');
        }
        $posts_top = $posts_top->orderBy('id', 'desc')->take(4)->get();
        $posts_bottom = Post::where('post_type', 'event')->orderBy('id', 'desc')->skip(4)->take(99999)->get();
        return view('web.page.event', compact('posts_top', 'page', 'keyword', 'sliders', 'posts_bottom'));
    }

    public function contact(){
        $page = Page::find(4);
        return view('web.page.contact', compact('page'));
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

    //
    public function postComment(Request $request){
        $param = $request->all();
        $param += [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $comment = Comment::insert($param);
        if($comment){
            $returnHTML = view('web.render.comment')->with('comment', $param)->render();
            $results = [
                'success' => true,
                '_html' => $returnHTML,
                'message' => 'Bình luận thành công !'
            ];
            $response = response()->json($results);
            $response->header('Content-Type', 'application/json');
            $response->header('charset', 'utf-8');
            return $response;
        }
    }

    public function postSubmitFormModal(Request $request){
        $param = $request->all();
        $param += [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        //
        $contact = Contact::insert($param);
        $results = [
            'success' => true,
            'message' => 'Cám ơn quý khách đã liên hệ. Chúng tôi sẽ liên hệ lại bạn khi có thể. Thanks you'
        ];
        $response = response()->json($results);
        $response->header('Content-Type', 'application/json');
        $response->header('charset', 'utf-8');
        return $response;
    }
}
