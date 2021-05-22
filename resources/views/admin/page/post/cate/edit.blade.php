@extends('admin.master')
@section('css')
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => array('post.cate.update'), 'method' => 'POST', 'id' => 'form-post', 'class' => '',
        'autocomplete' => 'off']) !!}
        <input type="hidden" name="id" value="{!! $data->id !!}" />
        <input type="hidden" name="post_type" value="{!! $data->post_type !!}" />
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <blade
                        include|(%26%2339%3Bpartials.lang_input%26%2339%3B%2C%20%5B%26%2339%3Btype%26%2339%3B%20%3D%3E%20%26%2339%3Btext%26%2339%3B%2C%20%26%2339%3Bmodel%26%2339%3B%20%3D%3E%20%26%2339%3Bdata%26%2339%3B%2C%20%26%2339%3Battr%26%2339%3B%20%3D%3E%20%26%2339%3Btitle%26%2339%3B%2C%20%26%2339%3Btitle%26%2339%3B%20%3D%3E%20trans(%26%2339%3Badmin.field.title%26%2339%3B)%2C%20%26%2339%3Brequired%26%2339%3B%20%3D%3E%20%26%2339%3Brequired%26%2339%3B%5D) />
                </div>
                <div class="form-group">
                    <label>{!! trans('admin.field.slug') !!}</label>
                    {{ Form::text('slug', $data->slug, ['class'=>'form-control','id' => 'slug', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    <blade
                        include|(%26%2339%3Bpartials.lang_input%26%2339%3B%2C%20%5B%26%2339%3Btype%26%2339%3B%20%3D%3E%20%26%2339%3Btextarea%26%2339%3B%2C%20%26%2339%3Bmodel%26%2339%3B%20%3D%3E%20%26%2339%3Bdata%26%2339%3B%2C%26%2339%3Bclass%26%2339%3B%20%3D%3E%20%26%2339%3Bform-control%26%2339%3B%2C%20%26%2339%3Battr%26%2339%3B%20%3D%3E%20%26%2339%3Bexpert%26%2339%3B%2C%20%26%2339%3Btitle%26%2339%3B%20%3D%3E%20trans(%26%2339%3Badmin.field.expert%26%2339%3B)%5D) />
                </div>
                <div class="form-group">
                    <blade
                        include|(%26%2339%3Bpartials.lang_input%26%2339%3B%2C%20%5B%26%2339%3Btype%26%2339%3B%20%3D%3E%20%26%2339%3Btextarea%26%2339%3B%2C%20%26%2339%3Bmodel%26%2339%3B%20%3D%3E%20%26%2339%3Bdata%26%2339%3B%2C%26%2339%3Bclass%26%2339%3B%20%3D%3E%20%26%2339%3Bform-control%20ckeditor%26%2339%3B%2C%20%26%2339%3Battr%26%2339%3B%20%3D%3E%20%26%2339%3Bdescription%26%2339%3B%2C%20%26%2339%3Btitle%26%2339%3B%20%3D%3E%20trans(%26%2339%3Badmin.field.description%26%2339%3B)%5D) />
                </div>
                @include('partials.seo')
            </div>
            <div class="col-md-3">
                <div class="form-group hidden">
                    <label>{!! trans('admin.field.status') !!}</label>
                    <select class="form-control" name="is_published">
                        <option value="on">{!! trans('admin.field.publish') !!}</option>
                        <option value="">
                    </select>
                </div>
                <div class="form-group hidden">
                    <label>{!! trans('admin.field.categories') !!}</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">None</option>
                        {!! admin_PostCateSelect(0,"",$data->parent_id,'post') !!}
                    </select>
                </div>
                <div class="form-group">
                    <label>{!! trans('admin.field.image') !!}</label>
                    <img src="{!! $data->image !!}" class="img-responsive" onclick="selectImage('image')"
                        id="img_image">
                    <input type="hidden" name="image" value="{!! $data->image !!}" id="input_image" />
                </div>
                <div class="form-group">
                    <label>
                        {!! trans('admin.button.update') !!}
                    </label>
                    @if($data->id)
                        <p>@lang('admin.field.created_at'): {{ $data->created_at }}</p>
                        <p>@lang('admin.field.updated_at'): {{ $data->updated_at }}</p>
                    @endif
                    <hr>
                    <button type="submit" class="btn btn-block btn-success btn-sm">{!! trans('admin.button.update')
                        !!}</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('js')
@endsection