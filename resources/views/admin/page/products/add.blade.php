@extends('admin.master')
@section('css')
@endsection
@section('content')
    
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            @include('admin.page.products.partials.add.info')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
@endsection