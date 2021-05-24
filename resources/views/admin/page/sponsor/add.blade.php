@extends('admin.master')
@section('css')
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => 'sponsor.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '',
        'autocomplete' => 'off']) !!}
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    @include('partials.lang_input', ['type' => 'text', 'model' => 'post', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
                    <input type="hidden" class="form-control" name="id"
                        value="{!! $post && $post->id ? $post->id : '' !!}" />
                </div>
                <div class="form-group">
                    <label>Thứ tự</label>
                    <input type="number" class="form-control" name="priority"
                        value="{!! $post->priority ? $post->priority : 0 !!}" />
                </div>
                <div class="form-group">
                    <label>Gallery</label>
                    <button type="button" class="btn btn-info" onclick="addMoreGallery()">
                        <i class="fa fa-fw fa-plus"></i>
                    </button>
                </div>
                <div class="row form-group" id="list_gallery">
                    @if($gallery)
                        @foreach($gallery as $id => $item)
                            <div class="col-md-3 item_gallery" id="item_gallery_{!! $id !!}">
                                <div class="form-group"><label>Image</label>
                                    <img src="{!! $item !!}" class="img-responsive" onclick="selectImage('image_{!! $id !!}')" id="img_image_{!! $id !!}">
                                        <input type="hidden" name="gallery[]" value="{!! $item !!}" id="input_image_{!! $id !!}">
                                    </div>
                                <div class="col-md-6 text-right p-r0"><button onclick="selectImage('image_{!! $id !!}')"
                                        type="button" class="btn btn-info btn-sm"><i
                                            class="fa fa-fw fa-edit"></i></button></div>
                                <div class="col-md-6 text-left p-l0"><button onclick="deleteItemGallary('{!! $id !!}')"
                                        type="button" class="btn btn-danger btn-sm"><i
                                            class="fa fa-fw fa-trash"></i></button></div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>{!! trans('admin.field.status') !!}</label>
                    <select class="form-control" name="is_published">
                        <option value="on">{!! trans('admin.field.publish') !!}</option>
                        <option value="" @if($post && $post->is_published = '') selected @endif>{!!
                            trans('admin.field.hide') !!}</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success btn-sm">{!! trans('admin.button.save')
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