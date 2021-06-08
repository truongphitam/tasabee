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
                    <a href="{{ route('users.downloadUsers') }}" class="btn btn-warning" role="button">
                        <i class="fa fa-fw fa-plus"></i> Dowload Excel
                    </a>
                    <a href="{!! route('users.create') !!}" class="btn btn-info">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>
                </div>
                <div class="col-md-12" style="margin-top: 20px">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th class="no-sort" style="width: 50px">Image</th> 
                            <th class="no-sort">Tên</th>
                            <th class="no-sort">Email</th>
                            <th class="no-sort">Số điện thoại</th>
                            <th class="no-sort">Quốc gia</th>
                            <th class="no-sort">Địa chỉ</th>
                            <th class="no-sort">Ngày tham gia</th>
                            <th class="no-sort"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: '{{ action('Admin\UsersController@index') }}',
                    data: function (d) {
                        d.category = $('.category-filter').val();
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

        function downloadExcelForUsers(){
            var URL = baseURL + "/admin/orders/export-excel?customer_id="+customer_id+"&staff_id="+staff_id+"&invoice_number="+invoice_number+"&date_range_by_days="+date_range_by_days;
            window.location = URL;
        }
    </script>
@endsection