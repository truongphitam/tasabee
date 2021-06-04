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
                    <a href="{!! route('team.create') !!}" class="hidden btn btn-info">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>
                </div>
                <div class="col-md-12" style="margin-top: 20px">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th class="no-sort">ID</th>
                            <th class="no-sort">Họ và Tên</th>
                            @if($type == 'product')
                                <th class="no-sort">Số điện thoại</th>
                            @endif
                            <th class="no-sort">Email</th>
                            @if($type == 'product')
                                <th class="no-sort">Sản phẩm</th>
                            @endif
                            <th class="no-sort">Ghi chú</th>
                            <th class="no-sort text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="" id="type" value="{{ $type }}">
@endsection
@section('js')
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: '{{ action('Admin\ContactController@index') }}',
                    data: function (d) {
                        d.type = $('#type').val();
                    }
                },
                "columnDefs": [
                    {orderable: false, targets: 'no-sort'},
                    {className: 'select-checkbox', targets: 0}
                ],
                "initComplete": function () {
                    var $searchInput = $('.dataTables_filter > label > input');
                    $searchInput.unbind();
                    $searchInput.bind('keyup', function (e) {
                        if (e.keyCode === 13 || this.value === '') {
                            table.search(this.value).draw();
                        }
                    });
                }
            });
            $('.category-filter').change(function () {
                table.ajax.reload();
            });
        });
    </script>
@endsection