@extends('web.master')
@section('content')

<section class="bg-top clearfix">
    <img src="/assets/web/images/bg-blog.jpg" title="{{ $data->title }}">
    <div class="container">
        <div class="top-cat-name">
            <b>
                {{ trans('web.menu.news') }}
            </b>
            <ul class="list-inline text-center">
                <li class="list-inline-item">
                    <a href="{{ route('index') }}">
                        {{ trans('web.menu.home') }}
                    </a>
                </li>
                /
                <li>
                    <a href="{!! route('blog') !!}">
                        {{ trans('web.menu.news') }}
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
                <div class="post-action">
                    <div class="row">
                        <div class="col-8 col-md-9">
                            <div class="row align-items-center justify-content-right">
                                <ul class="list-inline">
                                    @if($prev)
                                        <li class="list-inline-item">
                                            <a href="{{ route('detailBlog', $prev->slug) }}" title="{{ $prev->title }}">
                                                <i class="fa fa-chevron-left"></i> {{ trans('web.field.older_post') }}
                                            </a>
                                        </li>
                                    @endif
                                    @if($next)
                                        <li class="list-inline-item">
                                            <a href="{{ route('detailBlog', $next->slug) }}" title="{{ $next->title }}">
                                                {{ trans('web.field.new_post') }} <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="d-flex align-items-center justify-content-around">
                                <small class="d-flex align-items-center">{{ trans('web.field.share') }} &nbsp;<img
                                        src="/assets/web/images/icon-share.png" width="15"></small>
                                <a href="http://www.facebook.com/sharer/sharer.php?u={!! url()->current() !!}&t={{ $data->title }}" title="{{ $data->title }}" class="share-popup">
                                    <img src="/assets/web/images/icon-fb.png" width="24">
                                </a>
                                <a href="http://www.twitter.com/intent/tweet?url={!! url()->current() !!}&via=TWITTER_HANDLE_HERE&text={{ $data->title }}" title="{{ $data->title }}" class="share-popup">
                                    <img src="/assets/web/images/icon-twiter.png" width="24">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
<input type="hidden" id="comment_post_id" value="{{ $data->id }}">
<input type="hidden" id="comment_users_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">
<input type="hidden" id="comment_type" value="post">
<section class="blog-comment padding-25">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <p class="blog-comment-title">
                    <strong>
                        {{ trans('web.field.a_comment') }}
                    </strong>
                </p>
                <div id="list_comment">
                    @if($data->comment)
                        @foreach($data->comment as $comment)
                            <div class="clearfix">
                                <p>
                                    <strong>{{ $comment->name }}</strong>
                                    <br />
                                    <small class="c_363636">
                                        <i class="fa fa-calendar"></i> {{ $comment->created_at }}
                                    </small>
                                </p>
                                {!! $comment->content !!}
                            </div> 
                        @endforeach
                    @endif
                </div>
                <hr class="product-detail-hr">
                <p>
                    <strong>
                        {{ trans('web.field.leave_a_comment') }}
                    </strong>
                    <br />
                    {{ trans('web.field.leave_a_comment_content') }}
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="frm-cmt-blog">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="{!! trans('web.form.message') !!}" id="comment_content"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="{!! trans('web.form.name') !!}" value="{{ Auth::check() ? Auth::user()->name : '' }}" @if(Auth::check()) disabled @endif id="comment_name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="{!! trans('web.form.email') !!}" value="{{ Auth::check() ? Auth::user()->email : '' }}"  @if(Auth::check()) disabled @endif id="comment_email">
                            </div>
                            <div class="center-xs">
                                <button class="btn btn-style-1" onclick="comment(this)">{!! trans('web.form.submit') !!}</button>
                                <div id="loader-t2" class="text-center">
                                    <i class="fa fa-spinner fa-spin fa-3x"></i>
                                </div>
                            </div>
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