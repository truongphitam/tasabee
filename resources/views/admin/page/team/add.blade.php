@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'team.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            {{ Form::hidden('id', isset($post) ? $post->id : '', ['class'=>'form-control','id' => 'id', 'placeholder' => '']) }}
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Họ & Tên</label>
                        {{ Form::text('name', $post->id ? $post->name : '', ['class'=>'form-control','id' => 'name', 'placeholder' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="">Vị trí</label>
                        {{ Form::text('position', $post->id ? $post->position : '', ['class'=>'form-control','id' => 'position', 'placeholder' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="">Link Facebook</label>
                        {{ Form::text('facebook', $post->id ? $post->facebook : '#', ['class'=>'form-control','id' => 'facebook', 'placeholder' => '']) }}
                    </div>
                    <div class="form-group">
                        <label for="">Link google</label>
                        {{ Form::text('google', $post->id ? $post->google : '#', ['class'=>'form-control','id' => 'google', 'placeholder' => '']) }}
                    </div>
                </div>
                <div class="col-md-3"> 
                    <div class="form-group">
                        <label>{!! trans('admin.field.image') !!}</label>
                        <img src="{{ $post && $post->image ? $post->image : '/assets/admin/1200x630.png' }}" class="img-responsive" onclick="selectImage('image')"
                            id="img_image">
                        <input type="hidden" name="image" value="{{ $post && $post->image ? $post->image : '/assets/admin/1200x630.png' }}" id="input_image"/>
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