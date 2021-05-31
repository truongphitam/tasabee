var _data;
function handleData() {
    console.log('handleData');
    return _data;
}

function block(_block, type_display, date_range_money){
    var formData = new FormData();
    formData.append("block", _block);
    formData.append("type_display", type_display);
    formData.append("date_range_money", date_range_money);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: baseURL + "/admin/reports/block",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
            switch(_block){
                case 'income':
                case 'debt':
                    showChartMoney(data);
                    break;
                case 'services':
                    showChartOrders(data);
                    break;
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert('error');
        }
    });
}

function showChartOrders(response){
    var options = {
        title: response.data.title,
        subtitle: '',
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
    };
    var data = {
        xAxis: response.data.date,
        series: [
            {
                name: response.data.total.title,
                data: response.data.total.value,
            },
            {
                name: response.data.commissions.title,
                data: response.data.commissions.value,
            },
            {
                name: response.data.other_cost.title,
                data: response.data.other_cost.value,
            }
        ]
    };

    buidColumnChart("chart_services", options, data)
};

function showChartMoney(response){
    $("#total_apt_status_1").html(formatVND(response.data.apt_status_1.total));
    $("#title_apt_status_1").html(response.data.apt_status_1.title);

    $("#total_apt_status_2").html(formatVND(response.data.apt_status_2.total));
    $("#title_apt_status_2").html(response.data.apt_status_2.title);

    var options = {
        title: response.data.title,
        subtitle: '',
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
    };
    var data = {
        xAxis: response.data.date,
        series: [
            {
                name: response.data.apt_status_1.title,
                data: response.data.apt_status_1.value,

            },
            {
                name: response.data.apt_status_2.title,
                data: response.data.apt_status_2.value,

            }
        ]
    };

    buidColumnChart("chart_money", options, data)
};

function showChartColumn(div, title, data){
    var options = {
        title: title,
        subtitle: '',
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
    };

    buidColumnChart(div, options, data)
};

function buidLineChart(divID, options, data){

}

function buidColumnChart(divID, options, data){
    var chart = {
        chart: {
            type: 'column'
        },
        title: {
            text: options.title ? options.title : ''
        },
        subtitle: {
            text: options.subtitle ? options.subtitle : ''
        },
        xAxis: {
            categories: data.xAxis,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                //text: 'Rainfall (mm)'
            }
        },
        tooltip: options.tooltip ? options.tooltip : '',
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: data.series
    };

    Highcharts.chart(divID, chart);
}
