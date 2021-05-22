@extends('admin.master')
@section('css')
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => 'orders.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete'
        => 'off']) !!}
        {{ Form::hidden('id', isset($post) ? $post->id : '', ['class'=>'form-control','id' => 'id', 'placeholder' => '']) }}
        <div class="row">
            <div class="col-md-9" style="border-right: 1px solid #ccc">
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="">Khách hàng</label>
                        <select name="customer_id" id="" class="form-control">
                            <option value="">NV 1</option>
                            <option value="">NV 1</option>
                            <option value="">NV 1</option>
                            <option value="">NV 1</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Nhân viên bán hàng</label>
                        <select name="staff_id" id="" class="form-control">
                            <option value="">NV 1</option>
                            <option value="">NV 1</option>
                            <option value="">NV 1</option>
                            <option value="">NV 1</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Số hoá đơn</label>
                        {{ Form::text('invoice_number', isset($post) ? $post->invoice_number : '', ['class'=>'form-control','id' => 'invoice_number', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Số Packing list</label>
                        {{ Form::text('packing_list', isset($post) ? $post->packing_list : '', ['class'=>'form-control','id' => 'packing_list', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Số Bill</label>
                        {{ Form::text('bill_number', isset($post) ? $post->bill_number : '', ['class'=>'form-control','id' => 'bill_number', 'placeholder' => '']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Ngày lập hóa đơn</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::hidden('_invoice_date', $post->id && $post->invoice_date ? $post->invoice_date :date('d/m/Y') , ['class'=>'form-control','id' => '_invoice_date', 'placeholder' => '']) }}
                            {{ Form::text('invoice_date', isset($post) ? $post->bill_number : '', ['class'=>'form-control pull-right', 'id' => 'invoice_date', 'placeholder' => '']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Thời hạn công nợ</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::hidden('_debt_term', $post->id && $post->debt_term ? $post->debt_term :date('d/m/Y') , ['class'=>'form-control','id' => '_debt_term', 'placeholder' => '']) }}
                            {{ Form::text('debt_term_date', isset($post) ? $post->debt_term_date : '', ['class'=>'form-control pull-right', 'id' => 'debt_term_date', 'placeholder' => '']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Hạn công nợ</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::hidden('_debt_due_date', $post->id && $post->debt_due_date ? $post->debt_due_date :date('d/m/Y') , ['class'=>'form-control','id' => '_debt_due_date', 'placeholder' => '']) }}
                            {{ Form::text('debt_due_date', isset($post) ? $post->debt_due_date : '', ['class'=>'form-control pull-right', 'id' => 'debt_due_date', 'placeholder' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="">Cảng đi (Port of loading)</label>
                        {{ Form::text('port_of_loading', isset($post) ? $post->port_of_loading : '', ['class'=>'form-control pull-right', 'id' => 'port_of_loading', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-6">
                        <label for="">Giờ đi (ETD)</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::hidden('_etd', $post->id && $post->debt_due_date ? $post->debt_due_date :date('d/m/Y H:i:s') , ['class'=>'form-control','id' => '_etd', 'placeholder' => '']) }}
                            {{ Form::text('etd', isset($post) ? $post->debt_due_date : '', ['class'=>'form-control pull-right', 'id' => 'etd', 'placeholder' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="">Cảng đến (Port of discharge)</label>
                        {{ Form::text('port_of_discharge', isset($post) ? $post->port_of_discharge : '', ['class'=>'form-control pull-right', 'id' => 'port_of_discharge', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-6">
                        <label for="">Giờ đến (ETA)</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::hidden('_eta', $post->id && $post->debt_due_date ? $post->debt_due_date :date('d/m/Y H:i:s') , ['class'=>'form-control','id' => '_eta', 'placeholder' => '']) }}
                            {{ Form::text('eta', isset($post) ? $post->eta : '', ['class'=>'form-control pull-right', 'id' => 'eta', 'placeholder' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Số hiệu tàu</label>
                        {{ Form::text('train_number', isset($post) ? $post->train_number : '', ['class'=>'form-control pull-right', 'id' => 'train_number', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Số Container</label>
                        {{ Form::text('number_of_containers', isset($post) ? $post->number_of_containers : '', ['class'=>'form-control pull-right', 'id' => 'number_of_containers', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Địa điểm giao hàng</label>
                        {{ Form::text('place_of_delivery', isset($post) ? $post->place_of_delivery : '', ['class'=>'form-control pull-right', 'id' => 'place_of_delivery', 'placeholder' => '']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Bảo hiểm</label>
                        {{ Form::text('insurrance', isset($post) ? $post->insurrance : '', ['class'=>'form-control pull-right', 'id' => 'insurrance', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Incoterms</label>
                        {{-- {{ Form::text('incoterms', isset($post) ? $post->incoterms : '', ['class'=>'form-control pull-right', 'id' => 'incoterms', 'placeholder' => '']) }} --}}
                        <select name="incoterms" id="incoterms" class="form-control" required>
                            {!! show_incoterms($post ? $post->incoterms : '') !!}
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Phương thức </label>
                        <select name="method" id="method" class="form-control" required>
                            {!! show_method($post ? $post->method : '') !!}
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Số LC:</label>
                        {{ Form::text('lc_number', isset($post) ? $post->lc_number : '', ['class'=>'form-control pull-right', 'id' => 'lc_number', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Trạng thái đơn hàng</label>
                        <select name="" id="" class="form-control">
                            <option value="">11</option>
                            <option value="">11</option>
                            <option value="">11</option>
                        </select>
                    </div> 
                </div>
                <div class="form-group clearfix">
                    <hr>
                    <label for="">Sản phẩm</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Chọn sản phẩm"
                        style="width: 100%;" id="select_products">
                        @if($products)
                            @foreach ($products as $product)
                                <option value='{!! $product->id !!}'>{!! $product->title !!}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group clearfix">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background: #3d8dbc">
                                <th style="width: 10px">#</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Đơn vị tiền tệ (USD/EUR/.....)</th>
                                <th>Số lượng</th>
                                <th>Đơn vị hàng (có thể là kg, lit, pcs,...)</th>
                                <th>Phương thức đóng gói</th>
                                <th>Trị giá</th>
                            </tr>
                        </thead>
                        <tbody id="body_list_products">
                            
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <label for="">Ghi chú</label>
                    {{ Form::textarea('note', isset($post) ? $post->note : '', ['class'=>'form-control','id' => 'note', 'placeholder' => '', 'rows' => 5]) }}
                </div>
                <div class="form-group clearfix">
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="file_contract">Hợp đồng</label>
                        <input type="file" id="file_contract" name="file_contract" accept="application/pdf, application/PDX">
                    </div>
                    <div class="col-md-6">
                        <label for="">File đính kèm</label>
                        <input type="file" id="attached_file" name="attached_file" accept="application/pdf, application/PDX" multiple>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tạm tính (VNĐ)</label>
                    {{ Form::hidden('sub_total', isset($post) ? $post->sub_total : '', ['class'=>'form-control','id' => 'sub_total', 'placeholder' => '', 'disabled' => 'disabled']) }}
                    {{ Form::text('_sub_total', 0, ['class'=>'form-control','id' => '_sub_total', 'placeholder' => '', 'disabled' => 'disabled']) }}
                </div>  
                <div class="form-group">
                    <label>Thanh toán (VNĐ)</label>
                    {{ Form::number('payment', isset($post) ? $post->payment : 0, ['class'=>'form-control','id' => 'payment', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    <label>Giảm giá (%)</label>
                    {{ Form::number('discount', isset($post) ? $post->discount : 0, ['class'=>'form-control','id' => 'discount', 'placeholder' => '']) }}
                </div>
                <div class="form-group">
                    <label>VAT (%)</label>
                    {{ Form::number('vat', isset($post) ? $post->vat : 0, ['class'=>'form-control','id' => 'vat', 'placeholder' => '']) }}
                </div>  
                <div class="form-group">
                    <label>Công nợ (VNĐ)</label>
                    {{ Form::number('deposit', isset($post) ? $post->deposit : 0, ['class'=>'form-control','id' => 'deposit', 'placeholder' => '', 'disabled' => 'disabled']) }}
                </div>
                <hr>
                <div class="form-group">
                    <button class="btn btn-info">Xác nhận đơn hàng</button>
                    <button class="btn btn-warning">Lưu hoá đơn</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('js')
<script>
    $('#select_products').on('select2:select', function (e) {
        var data = e.params.data;
        var id = data.id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: baseURL + "/admin/products/edit/"+id,
            type: 'get',
            contentType: false,
            processData: false,
            cache: false,
            success: function (data) {
                console.log('data: ', data);
                if(data && data.id){
                    var id = "item_body_list_"+data.id;
                    var _html = "<tr id='" + id + "'>";
                        _html += '<td>#'+data.id+'</td>';
                        _html += '<td>'+data.title+'</td>';
                        _html += '<td>'+data.price+'</td>';
                        _html += '<td>';
                        _html += '<input id="currency_unit_'+data.id+'" name="currency_unit[]" value="" type="text" class="form-control">';
                        _html += '<input id="products_'+data.id+'" name="products[]" value="'+data.id+'" type="hidden" class="form-control">';
                        _html += '<input id="price_'+data.id+'" name="price[]" value="'+data.price+'" type="hidden" class="form-control">';
                        _html += '</td>';
                        _html += '<td>';
                        _html += '<input id="quantity_'+data.id+'" name="quantity[]" onchange="change_quantity(this)" value="1"  type="number" class="form-control">';
                        _html += '</td>';
                        _html += '<td>';
                        _html += '<input id="item_unit_'+data.id+'" name="item_unit[]" value="" type="text" class="form-control">';
                        _html += '</td>';
                        _html += '<td>';
                        _html += '<input id="packing_method_'+data.id+'" name="packing_method[]" value="" type="text" class="form-control">';
                        _html += '</td>';
                        _html += '<td>';
                        _html += '<strong id="sub_total_'+data.id+'">'+data.price+'</strong>';
                        _html += '</td>';
                        _html += '</tr>';
                    $("#body_list_products").append(_html);
                }
            },
            error: function (xhr, textStatus, errorThrown) {

            }
        });
    });
    $('#select_products').on('select2:unselect', function (e) {
        var remove = e.params.data;
        console.log('remove: ', remove);
        if($("#item_body_list_"+remove.id).length){
            $("#item_body_list_"+remove.id).remove();
        }
    });

    function getVal(element){
        var product_id = $(element).data('id');
        var price = $("#price_" + product_id).val();
        var _price_temp = $(element).val() * price;
        $("#price_temp_" + product_id).html(formatVND(_price_temp));
        calculator_temp();
    }

    function check_and_apend_products(){
    }

    function calculator_temp(){
        var _quantity = [];
        var _price = [];
        var _products = [];
        $('input[name^="quantity"]').each(function(k, v) {
            _quantity.push($(v).val());
        });
        $('input[name^="price"]').each(function(k, v) {
            _price.push($(v).val());
        });
        $('input[name^="products"]').each(function(k, v) {
            _products.push($(v).val());
        });
        var _temp = 0;
        if(_products){
            _.forEach(_quantity, function (value, key){
                console.log(value);
                var _temp_in_row = value * _price[key];
                _temp += parseInt(_temp_in_row);
            });
        }
        $("#_sub_total").val(formatVND(_temp));
    }
</script>
@endsection