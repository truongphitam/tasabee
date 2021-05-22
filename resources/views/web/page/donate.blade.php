@extends('web.master')
@include('web.blocks.meta')
@section('content')
    <section id="donate">
        <div class="container">
            <img src="/assets/web/images/donate.png" alt="" class="img-responsive">
        </div>
    </section>
    @include('web.inc.sponsors')
@endsection
@section('css')
    
@endsection