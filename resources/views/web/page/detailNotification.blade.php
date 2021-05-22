@extends('web.master')
@section('meta_title',isset($post->meta_title) ? $post->meta_title : $settings->meta_title)
@section('meta_description',isset($post->meta_description) ? $post->meta_description : $settings->meta_description)
@section('meta_keywords',isset($post->meta_keywords) ? $post->meta_keywords : $settings->meta_keywords)
@section('image',isset($post->image) ? url('/').$post->image : $settings->image)
@section('content')
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
                                <div class="title-notification">{!! $post->title !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="notification" class="">
        <div class="container">
            <div class="br-row notification-row">
                <div class="content-notification">
                    {!! $post->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .thong-bao-page .header-notification {
            padding-top: 40px !important;
        }

        #notification {
            min-height: 70vh;
        }
        @media (max-width: 768px){
            img{
                width: 100% !important;
                height: auto !important;
            }
        }
    </style>
@endsection