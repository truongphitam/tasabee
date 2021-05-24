@extends('web.master')
@section('meta_title',isset($page->meta_title) ? $page->meta_title : '404 - '.$settings->meta_title)
@section('meta_description',isset($page->meta_description) ? $page->meta_description : '404 - '.$settings->meta_description)
@section('meta_keywords',isset($page->meta_keywords) ? $page->meta_keywords : $settings->meta_keywords)
@section('image',isset($page->image) ? url('/').$page->image : $settings->image)
@section('content')
    <div id="company" class="wrapper-company">
        <div class="container">
            <div class="row">
                <div class="content-company">
                     <img src="/assets/web/images/404.png" class="img-responsive" style="margin: 0 auto">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>

    </style>
@endsection
@section('js')
@endsection