@extends('admin.master')
@section('css')
    <link rel="stylesheet" href="/assets/plugins/datatables/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8 text-right">
                    <a href="{!! route('coporations.create') !!}" class="btn btn-info">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>
                </div>
                <div class="col-md-12" style="margin-top: 20px">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th class="no-sort" style="width: 50px">ID</th>
                            <th>@lang('admin.field.title')</th>
                            <th>@lang('admin.field.date')</th>
                            <th class="no-sort text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $item)
                                <tr>
                                    <td>{!! $item->id !!}</td>
                                    <td>{!! $item->title !!}</td>
                                    <td>{!! $item->created_at !!}</td>
                                    <td class="text-center"><a href="{!! route('coporations.show',$item->id) !!}"
                                                               class="btn btn-success btn-xs"><i
                                                    class="fa fa-fw fa-edit"></i></a>&nbsp;
                                        <a onclick="return confirmDelete();return false;"
                                           href="{!! route('coporations.destroy',$item->id) !!}"
                                           class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
@endsection