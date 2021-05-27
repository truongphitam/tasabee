@extends('web.master')
@section('content')

<section class="bg-top clearfix">
    <img src="/assets/web/images/bg-blog.jpg" title="{{ $data->title }}">
    <div class="container">
        <div class="top-cat-name">
            <b>
                BLOG
            </b>
            <ul class="list-inline text-center">
                <li class="list-inline-item">
                    <a href="">
                        Home
                    </a>
                </li>
                /
                <li>
                    <a href="{!! route('blog') !!}">
                        Blog
                    </a>
                </li>
                /
                <li>
                    <a>
                        {{ $data->title }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="blog-single padding-50">
    <img src="/assets/web/images/blog-bee-left.png" class="hidden-xs blog-bee-left">
    <img src="/assets/web/images/blog-bee-right.png" class="hidden-xs blog-bee-right">

    <div class="container">
        <p class="hidden">
            <img src="{{ $data->image }}" class="img-responsive" alt="{{ $data->title }}">
        </p>
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <h1>
                    <strong>
                        {{ $data->title }}
                    </strong>
                </h1>
                <p class="c_363636">
                    <i class="fa fa-calendar"></i> {{ $data->created_at }}
                </p>
                <div class="text-justify">
                    {!! $data->description !!}
                </div>



                <!---->
                <div class="post-action">

                </div>
                <!---->
            </div>
        </div>
    </div>
</section>

@endsection
@section('css')

@endsection
@section('js')

@endsection