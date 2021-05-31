@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $orders }}</h3>

                    <p>Tổng đơn hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $customers }}</h3>

                    <p>Tổng khách hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $staff }}</h3>

                    <p>Tổng thành viên</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Doanh thu theo khoảng</h3>
                    <div class="box-tools pull-right d-flex">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="hidden" id="_date_start" value="{!! date('01/m/Y') !!}" />
                            <input type="hidden" id="_date_end" value="{!! date('t/m/Y') !!}" />
                            <input type="text" class="form-control pull-right date-range-services" id="date_range_by_days"
                                name="date_range_by_days">
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart_money"></div>
                    <br>
                    <div id="chart_status_order"></div>
                    <br>
                    <div class="clearfix">
                        <table class="table table-bordered">
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
                            </tr>
                            </thead>
                            <tbody id="boy_list_orders">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="overlay hidden" id="loading_days">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="current_url" value="{!! route('admin.dashboard') !!}" />
@endsection
@section('js')
<script>
    $(document).ready(function () {
        //var year = $("#list_year").val();
        var days = $("#date_range_by_days").val();
        //var list = $("#date_range_list").val();
        //
        //getData('year', year);
        getData('days', days);
        //getData('summary', list);
        //renderTable(list);
    })
    //
    $('#date_range_by_days').on('apply.daterangepicker', function (ev, picker) {
        var days = $("#date_range_by_days").val();
        getData('days', days)
    });
    function getData(block, param) {
        showLoading('loading_' + block);
        var url = $("#current_url").val();
        url = url + "?block=" + block + "&days=" + param ;
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                $("#boy_list_orders").html(data.data.body_table);
                offLoading('loading_' + block);
                renderChart(data.data, 'chart_money');
                renderChart(data.data, 'chart_status_order');
            },
            error: function () {
                offLoading('loading_' + block);
                console.log('error: ', data);
            }
        });
    }
    function renderChart(data, div) {
        var _series = [
                {
                    name: data.status_orders_0.title,
                    data: data.status_orders_0.value,
                },
                {
                    name: data.status_orders_1.title,
                    data: data.status_orders_1.value,
                },
                {
                    name: data.status_orders_2.title,
                    data: data.status_orders_2.value,
                },
                {
                    name: data.status_orders_3.title,
                    data: data.status_orders_3.value,
                },
                {
                    name: data.status_orders_4.title,
                    data: data.status_orders_4.value,
                }
            ];
        if(div == 'chart_money'){
            _series = [
                {
                    name: data.sub_total.title,
                    data: data.sub_total.value,
                },
                {
                    name: data.payment.title,
                    data: data.payment.value,
                },
                {
                    name: data.discount.title,
                    data: data.discount.value,
                },
                {
                    name: data.vat.title,
                    data: data.vat.value,
                },
                {
                    name: data.deposit.title,
                    data: data.deposit.value,
                }
            ];
        }
        console.log('div: ', div);
        console.log('_series: ', _series);
        console.log('===========');
        var _data = {
            xAxis: data.date,
            series: _series
        };
        showChartColumn(div, data.title, _data);
    }
</script>
@endsection