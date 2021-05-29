@extends('web.master')
@section('meta_title',$settings->meta_title)
@section('meta_description',$settings->meta_description)
@section('image',$settings->image)
@section('content')
<section id="home-banner" class="clearfix">
    <div id="home-slider">
        @if($sliders)
        @foreach ($sliders as $slider)
            <div>
                <div class="home-banner-item">
                    <img src="{{ $slider->image }}" class="img-responsive" alt="{{ $slider->title }}">
                    <div class="home-banner-box">
                        <div class="container">
                            <p>
                                <b>{{ $slider->title }}</b>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img src="/assets/web/images/icon-calendar.png" height="20"> {{ $slider->event_date }}
                                </li>
                                <li class="list-inline-item">
                                    <img src="/assets/web/images/icon-location.png" height="20"> {{ $slider->address }}
                                </li>
                            </ul>
                            @if($slider->link)
                                <p class="center-xs">
                                    <a href="{{ $slider->link }}" class="btn btn-style-1 font-italic" title="{{ $slider->title }}">
                                        Chi Tiết
                                    </a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
        @endif
    </div>
</section>

<section id="home-product" class="clearfix">
    <div class="container">
        <p class="text-center">
            <img src="/assets/web/images/icon-bee.png">
        </p>
        <h2 class="home-title text-uppercase text-center">
            <b>
                Sản Phẩm <span class="c_ff7200">Nổi Bật</span>
            </b>
        </h2>
        <p class="text-center">
            quis nostrud quam est, qui dolorem ipsum 
            <br/>
            quis nostrud quam est, qui dolorem ipsum quia dolor sit amet, consecquaerat 
        </p>

        <div class="row">
            @if($products_highlight)
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="padding-25">
                        <div class="home-silder-product">
                            @foreach($products_highlight as $product)
                                <div>
                                    <div class="slide-product">
                                        <a href="{{ route('detailProducts', $product->slug )}}" title="{{ $product->title }}">
                                            <p class="slide-product-img">
                                                <img src="{{ $product->image }}" title="{{ $product->title }}">
                                            </p>
                                            <p class="slide-product-name">
                                                {{ $product->title }}
                                            </p>
                                            <hr/>
                                            <p class="slide-product-price">
                                                <span>Chi tiết</span>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <p class="text-center">
            <a href="{{ route('products')}}" class="btn btn-style-1 font-italic">
                Xem Thêm
            </a>
        </p>
    </div>
</section>

<section id="home-about" class="clearfix">
    <div class="container">
        <div class="about-box">
            <p class="text-center d-none d-sm-none">
                <img src="/assets/web/images/icon-bee.png">
            </p>
            <h2 class="home-title text-uppercase text-center">
                <b>
                    Về <span class="c_ff7200">Chúng Tôi</span>
                </b>
            </h2>
            <p class="text-center justify-xs">
                {!! trans('web.index.about_sologan') !!}
            </p>
            <p class="text-center d-none d-md-block d-lg-block">
                <img src="/assets/web/images/icon-bee.png">
            </p>
            <div class="home-about-list">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="home-about-item">
                            <img src="/assets/web/images/home-about-1.png">
                            <p class="text-uppercase">
                                <b>
                                    {!! trans('web.index.vision') !!}
                                </b>
                            </p>
                            <p class="c_777777">
                                {!! trans('web.index.vision_text') !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="home-about-item">
                            <img src="/assets/web/images/home-about-2.png">
                            <p class="text-uppercase">
                                <b>
                                    {!! trans('web.index.mission') !!}
                                </b>
                            </p>
                            <p class="c_777777">
                                {!! trans('web.index.mission_text') !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="home-about-item">
                            <img src="/assets/web/images/home-about-3.png">
                            <p class="text-uppercase">
                                <b>
                                    {!! trans('web.index.core_value') !!}
                                </b>
                            </p>
                            <p class="c_777777">
                                {!! trans('web.index.core_value_text') !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="home-about-item">
                            <img src="/assets/web/images/home-about-4.png">
                            <p class="text-uppercase">
                                <b>
                                    {!! trans('web.index.commitment') !!}
                                </b>
                            </p>
                            <p class="c_777777">
                                {!! trans('web.index.commitment_text') !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center">
                <a href="{{ route('about') }}" class="btn btn-style-1 font-italic">
                    Xem Thêm
                </a>
            </p>
        </div>
    </div>

    <img src="/assets/web/images/left-pr.png" class="home-pr-img-left">
    <img src="/assets/web/images/right-pr.png" class="home-pr-img-right">
</section>


<section id="home-work" class="clearfix padding-50">
    <div class="container">
        <h2 class="home-title text-uppercase text-center c_ff7200">
            <b>
                <small class="c_222">Hoạt Động</small>
                <br/>
                Nuôi Ong
            </b>
        </h2>
        <div class="row">
            @if($posts)
            @foreach($posts as $post)
                <div class="col-12 col-md-4">
                    <div class="home-work-item text-center">
                        <a href="{{ route('detailBlog', $post->slug) }}" title="{{ $post->title }}">
                            <p class="home-work-img">
                                <img src="{{ $post->image }}" alt="{{ $post->title }}">
                            </p>
                            <h3>
                                <b>
                                    {{ $post->title }}
                                </b>
                            </h3>
                            <p>
                                <small>
                                    {!! $post->expert !!}
                                </small>
                            </p>
                        </a>
                    </div>
                </div> 
            @endforeach
            @endif
        </div>
    </div>
</section>




<section id="home-why" class="clearfix padding-50">
    <div class="container-fluid">
        <div class="home-why-box">
            <div class="row">
                <div class="col-12 col-md-5 no-padding-lg">
                    <div class="home-why-left">
                        <h2>
                            <b>
                                <span class="c_222">Vì Sao Chọn</span>
                                <br/>
                                TASA BEE
                            </b>
                        </h2>
                        <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                        </p>
                        <ul class="list-unstyled">
                            <li>
                                Quisque volutpat mattis eros
                            </li>
                            <li>
                                Nullam malesuada erat ut turpis		
                            </li>
                            <li>
                                Suspendisse urna nibh									
                            </li>
                        </ul>
                        <p class="center-xs">
                            <a href="#!" class="btn btn-style-2 font-italic">
                                Xem Thêm
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-7 no-padding-lg">
                    <img src="/assets/web/images/home-g-r.png" class="img-responsive">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="home-why-list">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="home-why-item">
                        <img src="/assets/web/images/why-icon-1.png">
                        <div>
                            <p>
                                “Nullam dapibus blandit orci, viverra gravida dui lobortis eget. Maecenas fringilla urna eu nisl scelerisque.”
                            </p>
                            <a href="#!" class="c_ff7200">
                                <b>
                                    Xem thêm
                                </b>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="home-why-item">
                        <img src="/assets/web/images/why-icon-2.png">
                        <div>
                            <p>
                                “Nullam dapibus blandit orci, viverra gravida dui lobortis eget. Maecenas fringilla urna eu nisl scelerisque.”
                            </p>
                            <a href="#!" class="c_ff7200">
                                <b>
                                    Xem thêm
                                </b>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="home-why-item">
                        <img src="/assets/web/images/why-icon-3.png">
                        <div>
                            <p>
                                “Nullam dapibus blandit orci, viverra gravida dui lobortis eget. Maecenas fringilla urna eu nisl scelerisque.”
                            </p>
                            <a href="#!" class="c_ff7200">
                                <b>
                                    Xem thêm
                                </b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')

@endsection
@section('js')
    
@endsection