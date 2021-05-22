@extends('web.master')
@include('web.blocks.meta')
@section('content')
    @include('web.inc.purpose')
    <section id="about">
        <div class="container-fluid">
            <h4 class="title">
                {!! $page->title !!}
            </h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="img-about text-center">
                        <img src="{!! $page->image !!}" alt="{!! $page->title !!}" class="img-responisve" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content-about">
                        {!! $page->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.inc.sponsors')
@endsection
@section('css')
    
@endsection