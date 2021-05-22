@extends('web.master')
@section('content')

<section id="first-post" class="detail-content">
    <div class="container">
        <h4>{!! $page->title !!}</h4>
        <div class="clear-fix">

        </div>
        <div class="clear-fix">
            {!! $page->description !!}
        </div>
    </div>
</section>

@endsection
@section('css')

@endsection
@section('js')

@endsection