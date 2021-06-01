@extends('admin.master')
@section('css')
    <link rel="stylesheet" href="/assets/plugins/datatables/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Khách hàng</label>
                    <select name="customer_id" id="customer_id" class="form-control" required>
                        <option value="">-- Chọn khách hàng</option>
                        @if($customer)
                            @foreach ($customer as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Nhân viên bán hàng</label>
                    <select name="staff_id" id="staff_id" class="form-control">
                        <option value="">-- Chọn nhân viên</option>
                        @if($staff)
                            @foreach ($staff as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Hoá đơn</label>
                    <input type="text" name="invoice_number" id="invoice_number" value="" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Hoá đơn</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="hidden" id="_date_start" value="{!! date('01/m/Y') !!}" />
                        <input type="hidden" id="_date_end" value="{!! date('t/m/Y') !!}" />
                        <input type="text" class="form-control pull-right date-range-services" id="date_range_by_days"
                            name="date_range_by_days">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-md-4">

                </div>
                <div class="col-md-8 text-right">
                    <a href="#" class="btn btn-success" role="button" onclick="renderTable()">
                        <i class="fa fa-fw fa-plus"></i> Tìm kiếm
                    </a>
                    <a href="#" class="btn btn-warning" role="button" onclick="downloadExcel()">
                        <i class="fa fa-fw fa-plus"></i> Dowload Excel
                    </a>
                    <a href="{!! route('orders.create') !!}" class="btn btn-info">
                        <i class="fa fa-fw fa-plus"></i> Thêm mới
                    </a>
                </div>
                <div class="col-md-12" style="margin-top: 20px">
                    <table class="table table-bordered" id="list_table">
                        <thead>
                        <tr>
                            <th class="no-sort">ID</th>
                            <th class="no-sort">Khách hàng</th>
                            <th class="no-sort">Nhân viên</th>
                            <th class="no-sort">Số hoá đơn</th>
                            <th class="no-sort">Số Packing list</th>
                            <th class="no-sort">Số Bill</th>
                            <th class="no-sort">Ngày lập hóa đơn</th>
                            <th class="no-sort">Thời hạn công nợ</th>
                            <th class="no-sort">Hạn công nợ</th>
                            <th class="no-sort">Trạng thái đơn hàng</th>
                            <th></th>
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
            renderTable();
        });

        function renderTable(){
            if ($.fn.DataTable.isDataTable("#list_table")) {
                $('#list_table').DataTable().clear().destroy();
            }
            $('#list_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: '{{ action('Admin\OrdersController@index') }}',
                    data: function (d) {
                        d.customer_id = $('#customer_id').val();
                        d.staff_id = $('#staff_id').val();
                        d.invoice_number = $('#invoice_number').val();
                        d.date_range_by_days = $('#date_range_by_days').val();
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
        }

        function downloadExcel(){
            var customer_id = $('#customer_id').val();
            var staff_id = $('#staff_id').val();
            var invoice_number = $('#invoice_number').val();
            var date_range_by_days = $('#date_range_by_days').val();

            var URL = baseURL + "/admin/orders/export-excel?customer_id="+customer_id+"&staff_id="+staff_id+"&invoice_number="+invoice_number+"&date_range_by_days="+date_range_by_days;
            window.location = URL;
        }
    </script>
@endsection