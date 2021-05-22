@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'products.update', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            <input type="hidden" value="{!! $data->id !!}" name="id"/>
            @include('admin.page.products.partials.edit.info')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
@endsection