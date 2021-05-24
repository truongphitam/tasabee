@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'page.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'text', 'model' => 'post', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.slug') !!}</label>
                        {{ Form::text('slug', '', ['class'=>'form-control','id' => 'slug', 'placeholder' => '']) }}
                    </div>
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'textarea', 'model' => 'post','class' => 'form-control', 'attr' => 'expert', 'title' => trans('admin.field.expert')])
                    </div>
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'textarea', 'model' => 'post','class' => 'form-control ckeditor', 'attr' => 'description', 'title' => trans('admin.field.description')])
                    </div>
                    @include('partials.seo')
                    <div class="form-group hidden">
                        <label>Gallery</label>
                        <button type="button" class="btn btn-info" onclick="addMoreGallery()">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                    <div class="row form-group hidden" id="list_gallery">

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group hidden">
                        <label>{!! trans('admin.field.status') !!}</label>
                        <select class="form-control" name="is_published">
                            <option value="on">{!! trans('admin.field.publish') !!}</option>
                            <option value="">{!! trans('admin.field.hide') !!}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.image') !!}</label>
                        <img src="/assets/admin/1200x630.png" class="img-responsive" onclick="selectImage('image')"
                             id="img_image">
                        <input type="hidden" name="image" value="/assets/admin/1200x630.png" id="input_image"/>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-block btn-success btn-sm">{!! trans('admin.button.save') !!}</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
@endsection