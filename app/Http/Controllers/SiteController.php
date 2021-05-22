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
        $page = $this->pageRepository->find(6);
        $purpose = $this->postRepository->paginate_with_post_type(type_purpose(), '', 3);
        return view('web.page.about', compact('page', 'purpose'));
    }

    public function donate(){
        $page = $this->pageRepository->find(7);
        return view('web.page.donate', compact('page'));
    }

    public function post(){
        $post_type = type_posts();
        $page_id = '';
        switch(Route::currentRouteName()){
            case 'news';
                $page_id = 1;
                $post_type = type_posts();
                $link = route('news');
                break;
            case 'achievements';
                $page_id = 2;
                $post_type = type_achievements();
                $link = route('achievements');
                break;
            case 'event';
                $page_id = 3;
                $post_type = type_event();
                $link = route('event');
                break;
            
        }
        $page = $this->pageRepository->find($page_id);
        $data = $this->postRepository->paginate_with_post_type($post_type, '', 9);
        $sponsor = $this->sponsorRepository->getPublish();
        $stick = $this->postRepository->get_stick($post_type);

        return view('web.page.news', compact('data', 'page', 'link', 'sponsor', 'stick'));
    }

    public function detailPost($slug){
        $page = $this->postRepository->findSlug($slug);
        return view('web.page.detailNews', compact('page'));
    } 

    public function categoryEvent($slugCate){
        $category = Categories::where('slug', $slugCate)->first();
        $data = $this->postRepository->paginate_with_post_type('event', $category->id, 9);
        $link = route('event');
        $page = $this->pageRepository->find(3);
        $stick = $this->postRepository->get_stick('event', $category->id);
        $sponsor = $this->sponsorRepository->getPublish();

        return view('web.page.news', compact('data', 'page', 'link', 'stick', 'sponsor'));
    }
}
