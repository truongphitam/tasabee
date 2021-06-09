@extends('web.master')
@section('meta_title',$settings->meta_title)
@section('meta_description',$settings->meta_description)
@section('image',$settings->image)
@section('content')
@include('web.inc.sliders')

<section id="home-product" class="clearfix">
    <div class="container">
        <p class="text-center">
            <img src="/assets/web/images/icon-bee.png">
        </p>
        <h2 class="home-title text-uppercase text-center">
            <b>
                <span class="c_ff7200">{{ trans('web.field.products_highlight') }}</span>
            </b>
        </h2>
        <p class="text-center">
            {!! trans('web.field.expert_products') !!}
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
                                                <span>{{ trans('web.field.detail') }}</span>
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
                {{ trans('web.field.readmore') }}
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
                    {{ trans('web.field.ve') }} <span class="c_ff7200">{{ trans('web.field.us') }}</span>
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
                    {{ trans('web.field.readmore') }}
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
                <small class="c_222">{{ trans('web.field.hd') }}</small>
                <br/>
                {{ trans('web.field.nuoi_ong') }}
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
                                <span class="c_222">{{ trans('web.field.why') }}</span>
                                <br/>
                                TASABEE
                            </b>
                        </h2>
                        <p class="text-justify">
                            {!! trans('web.field.slogan_why') !!}
                        </p>
                        <ul class="list-unstyled">
                            <li>
                                {!! trans('web.field.why_1') !!}
                            </li>
                            <li>
                                {!! trans('web.field.why_2') !!}
                            </li>
                            <li>
                                {!! trans('web.field.why_3') !!}					
                            </li>
                        </ul>
                        <p class="center-xs">
                            <a href="#!" class="btn btn-style-2 font-italic">
                                {{ trans('web.field.readmore') }}
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
                                {!! trans('web.field.why_post_1') !!}
                            </p>
                            <a href="{!! trans('web.field.link_post_1') !!}" class="c_ff7200">
                                <b>
                                    {{ trans('web.field.detail') }}
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
                                {!! trans('web.field.why_post_2') !!}
                            </p>
                            <a href="{!! trans('web.field.link_post_2') !!}" class="c_ff7200">
                                <b>
                                    {{ trans('web.field.detail') }}
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
                                {!! trans('web.field.why_post_3') !!}
                            </p>
                            <a href="{!! trans('web.field.link_post_3') !!}" class="c_ff7200">
                                <b>
                                    {{ trans('web.field.detail') }}
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