@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'admin.messages', 'method' => 'post', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'text', 'model' => 'data', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
                    </div>
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'text', 'model' => 'data', 'attr' => 'position', 'title' => trans('admin.field.position'), 'required' => 'required'])
                    </div>
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'textarea', 'model' => 'data','class' => 'form-control ckeditor', 'attr' => 'description', 'title' => trans('admin.field.description')])
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{!! trans('admin.field.image') !!}</label>
                        <img src="{!! $data->image !!}" class="img-responsive" onclick="selectImage('image')"
                             id="img_image">
                        <input type="hidden" name="image" value="{!! $data->image !!}" id="input_image"/>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-block btn-success btn-sm">{!! trans('admin.button.update') !!}</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
@endsection