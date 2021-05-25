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
use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Repository\StatedRepository;
use App\Repository\SponsorRepository;

use App\Models\Slider;
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
        return view('web.page.index', compact('sliders'));
    }
    

    public function about(){
        return view('web.page.about');
    }

    public function products(){
        $data = Products::orderBy('id', 'desc')->paginate(9);
        $best_sellers = Products::orderBy('sold', 'desc')->take(5)->get();
        return view('web.page.products', compact('data', 'best_sellers'));
    }

    public function detailProducts($slug){
        $data = Products::with('gallery')->where('slug', $slug)->first();
        $related = Products::orderBy('id', 'desc')->get();
        return view('web.page.detailProducts', compact('data', 'related'));
    }

    public function blog(){
        return view('web.page.blog');
    }

    public function detailBlog(){
        return view('web.page.detailBlog');
    }

    public function event(){
        return view('web.page.event');
    }

    public function contact(){
        return view('web.page.contact');
    }

}
