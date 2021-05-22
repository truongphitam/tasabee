@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'slider.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            {{ Form::hidden('id', isset($post) ? $post->id : '', ['class'=>'form-control','id' => 'id', 'placeholder' => '']) }}
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'text', 'model' => 'post', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
                    </div>
                    <div class="form-group hidden">
                        <label>{!! trans('admin.field.slug') !!}</label>
                        {{ Form::text('slug', '', ['class'=>'form-control','id' => 'slug', 'placeholder' => '']) }}
                    </div> 
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>{!! trans('admin.field.event_date') !!}</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="hidden" id="_datepicker"
                                    value="{{ $post ? $post->event_date : date('d/m/Y') }}" />
                                <input type="text" class="form-control pull-right" id="datepicker" name="event_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>{!! trans('admin.field.address') !!}</label>
                            {{ Form::text('address', $post ? $post->address : '', ['class'=>'form-control','id' => 'address', 'placeholder' => '']) }}
                        </div>
                    </div> 
                    <div class="form-group">
                        <label>{!! trans('admin.field.link') !!}</label>
                        {{ Form::text('link', $post ? $post->link : '', ['class'=>'form-control','id' => 'link', 'placeholder' => '']) }}
                    </div> 
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{!! trans('admin.field.status') !!}</label>
                        <select class="form-control" name="is_published">
                            <option value="on">{!! trans('admin.field.publish') !!}</option>
                            <option value="">{!! trans('admin.field.hide') !!}</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>{!! trans('admin.field.image') !!}</label>
                        <img src="{{ $post ? $post->image : '/assets/admin/1200x630.png' }}" class="img-responsive" onclick="selectImage('image')"
                            id="img_image">
                        <input type="hidden" name="image" value="{{ $post ? $post->image : '/assets/admin/1200x630.png' }}" id="input_image"/>
                    </div>
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