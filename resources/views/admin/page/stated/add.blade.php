@extends('admin.master')
@section('css')
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => 'stated.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete'
        => 'off']) !!}
        {{ Form::hidden('id', isset($data) ? $data->id : '', ['class'=>'form-control','id' => 'id', 'placeholder' => '']) }}
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            @include('partials.lang_input', ['type' => 'text', 'model' => 'data', 'attr' => 'title', 'title' => 'Title', 'required' => 'required'])
                        </div>
                        <div class="col-md-6">
                            @include('partials.lang_input', ['type' => 'text', 'model' => 'data', 'attr' => 'sub_title', 'title' => 'Sub Title', 'required' => 'required'])
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    @include('partials.lang_input', ['type' => 'textarea', 'model' => 'data','class' => 'form-control', 'attr' => 'expert', 'title' => trans('admin.field.expert')])
                </div>
                <div class="form-group">
                    @include('partials.lang_input', ['type' => 'textarea', 'model' => 'data','class' => 'form-control ckeditor', 'attr' => 'description', 'title' => trans('admin.field.description')])
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="form-group">
                    <label>Avatar</label>
                    <img src="{!! isset($data) ? $data->avatar : '/assets/admin/1200x630.png' !!}" class="img-responsive" onclick="selectImage('avatar')"
                        id="img_avatar">
                    <input type="hidden" name="avatar" value="{!! isset($data) ? $data->avatar : '/assets/admin/1200x630.png' !!}" id="input_avatar" />
                </div>
                <div class="form-group">
                    <label>{!! trans('admin.field.image') !!}</label>
                    <img src="{!! isset($data) ? $data->image : '/assets/admin/1200x630.png' !!}" class="img-responsive" onclick="selectImage('image')"
                        id="img_image">
                    <input type="hidden" name="image" value="{!! isset($data) ? $data->image : '/assets/admin/1200x630.png' !!}" id="input_image" />
                </div>
                @if (isset($data) && $data->id)
                    <p>@lang('admin.field.created_at'): {{ $data->created_at }}</p>
                    <p>@lang('admin.field.updated_at'): {{ $data->updated_at }}</p>
                    <hr>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success btn-sm">
                        {!! isset($data) ? trans('admin.button.update') : trans('admin.button.save') !!}
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('js')
@endsection