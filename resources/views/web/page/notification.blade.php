@extends('web.master')
@section('meta_title',isset($page->meta_title) ? $page->meta_title : $settings->meta_title)
@section('meta_description',isset($page->meta_description) ? $page->meta_description : $settings->meta_description)
@section('meta_keywords',isset($page->meta_keywords) ? $page->meta_keywords : $settings->meta_keywords)
@section('image',isset($page->image) ? url('/').$page->image : $settings->image)
@section('content')
    @include('web.blocks.slider')
    <div class=" header-notification">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="br-row">
                        <div class="br-col-middle br-col-12 padding-right-0">
                            <div class="text-center">
                                <div class="wrapper-img-notification">
                                    <img class="img-responsive img-notification"
                                         src="/assets/web/images/page/notification.png" alt="notification"/>
                                </div>
                                <p class="title-notification">{!! trans('web.field.notification') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($post))
        <div id="notification" class="">
            <div class="container">
                @foreach($post as $item)
                    <div class="br-row notification-row">
                        <div class="content-notification">
                            <div class="br-col-middle br-col-4">
                                <img class="img-responsive" src="{!! $item->image !!}" alt="{!! $item->title !!}"/>
                            </div>
                            <div class="br-col-middle br-col-8">
                                <h3 class="title-notification">{!! $item->title !!}</h3>
                                <p>{!! $item->expert !!}</p>
                                <div class="footer-notification">
                                    <div class="br-col br-col-6 text-left">
                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span><span
                                                class="text-grey">{!! $item->created_at !!}</span>
                                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span><span
                                                class="text-grey">{!! isset($item->categories->title)? $item->categories->title:'' !!}</span>
                                    </div>
                                    <div class="br-col br-col-6 text-right">
                                        <span class="readmore"><a
                                                    href="{!! route('detailNotification',$item->slug) !!}">{!! trans('web.readmore') !!}</a><span
                                                    class="glyphicon glyphicon-menu-right"
                                                    aria-hidden="true"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if( $post->lastPage() > 1)
                    <div class="br-row notification-row">
                        <div class="text-right">
                            <div class="pagination-wrapper">
                                <a href="{!! route('notification') !!}">
                                    <div class="to-first" aria-hidden="true">
                                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                                    </div>
                                </a>
                                @if($post->currentPage() > 1)
                                    <a href="{!! route('notification') !!}?page={!! $post->currentPage()-1 !!}">
                                        <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                                    </a>
                                @endif
                                @for($i=1 ; $i<= $post->lastPage(); $i++)
                                    <span class="paginate-number @if($post->currentPage() == $i) active @endif"><a
                                                href="{!! route('notification') !!}?page={!! $i !!}">{!! $i !!}</a></span>
                                @endfor
                                @if($post   ->currentPage() < $post->lastPage())
                                    <a href="{!! route('notification') !!}?page={!! $post->currentPage()+1 !!}">
                                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                    </a>
                                @endif
                                <a href="{!! route('notification') !!}?page={!! $post->lastPage() !!}">
                                    <div class="to-end" aria-hidden="true">
                                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                        <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection