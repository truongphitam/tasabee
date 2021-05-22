@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    {!! Form::open(['route' => 'products.attributes.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'text', 'model' => 'post_cate', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
                        <p class="help">{!! trans('admin.help.title') !!}</p>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.slug') !!}</label>
                        {{ Form::text('slug', '', ['class'=>'form-control','id' => 'slug', 'placeholder' => '']) }}
                        <p class="help">{!! trans('admin.help.slug') !!}</p>
                    </div> 
                    <div class="form-group">
                        <label>{!! trans('admin.field.categories') !!}</label>
                        <select class="form-control" name="parent_id">
                            <option value="0"> None</option>
                            {!! cate_attributes(0, "", 0) !!}
                        </select>
                        <p class="help">{!! trans('admin.help.categories') !!}</p>
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            {!! trans('admin.button.save') !!}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-8" style="margin-top: 20px">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>@lang('admin.field.title')</th>
                            <th class="no-sort">@lang('admin.field.slug')</th>
                            <th>@lang('admin.field.date')</th>
                            <th class="no-sort text-center"></th>
                        </tr>
                        </thead>
                        @if(isset($data))
                            <tbody>
                                @foreach ($data as $item)
                                    <tr style="background: #3c8dbc">
                                        <td colspan="3">{{ $item->title }}</td>
                                        <td class="w-100 text-center">
                                            <a href="{{ route('products.attributes.show', $item->id) }}" class="btn btn-success btn-xs">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @if($item->child)
                                        @foreach ($item->child as $child)
                                            <tr>
                                                <td>{{ $child->title }}</td>
                                                <td>{{ $child->slug }}</td>
                                                <td>{{ $child->created_at }}</td>
                                                <td class="w-100 text-center">
                                                    <a href="{{ route('products.attributes.show', $child->id) }}" class="btn btn-success btn-xs">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                    </a>&nbsp;
                                                    <a onclick="return confirmDelete();return false;" href="{{ route('products.attributes.destroy', $child->id) }}" class="btn btn-danger btn-xs">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection