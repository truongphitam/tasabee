@extends('admin.master')
@section('css')
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => 'post.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete'
        => 'off']) !!}
        {{ Form::hidden('post_type', $post_type, ['class'=>'form-control','id' => 'post_type', 'placeholder' => '']) }}
        {{ Form::hidden('id', isset($post) ? $post->id : '', ['class'=>'form-control','id' => 'id', 'placeholder' => '']) }}
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    @include('partials.lang_input', ['type' => 'text', 'model' => 'post', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
                </div>
                <div class="form-group">
                    <label>{!! trans('admin.field.slug') !!}</label>
                    {{ Form::text('slug', isset($post) ? $post->slug : '', ['class'=>'form-control','id' => 'slug', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    @include('partials.lang_input', ['type' => 'textarea', 'model' => 'post','class' => 'form-control', 'attr' => 'expert', 'title' => trans('admin.field.expert')])
                </div>
                <div class="form-group">
                    @include('partials.lang_input', ['type' => 'textarea', 'model' => 'post','class' => 'form-control ckeditor', 'attr' => 'description', 'title' => trans('admin.field.description')])
                </div>
                @include('partials.seo')
            </div>
            <div class="col-md-3">
                <div class="hidden form-group">
                    <label>Giữ</label>
                    <select class="form-control" name="stick">
                        <option value="0" selected>No</option>
                        <option value="1" @if($post->stick ==  1) selected @endif>Yes</option>
                    </select>
                </div>
                <div class="hidden {!! hidden_categories_by_type($post_type) !!} form-group">
                    <label>{!! trans('admin.field.categories') !!}</label>
                    <select class="form-control" name="categories_id">
                        {!! showCategories($post_type, isset($post) && $post->categories_id ? $post->categories_id : '') !!}
                    </select>
                </div>
                <div class="form-group">
                    <label>{!! trans('admin.field.image') !!}</label>
                    <img src="{!! $post->image ? $post->image : '/assets/admin/1200x630.png' !!}" class="img-responsive" onclick="selectImage('image')"
                        id="img_image">
                    <input type="hidden" name="image" value="{!! $post->image ? $post->image : '/assets/admin/1200x630.png' !!}" id="input_image" />
                </div>
                @if (isset($post) && $post->id)
                    <p>@lang('admin.field.created_at'): {{ $post->created_at }}</p>
                    <p>@lang('admin.field.updated_at'): {{ $post->updated_at }}</p>
                    <hr>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success btn-sm">
                        {!! isset($post->id) ? trans('admin.button.update') : trans('admin.button.save') !!}
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