@extends('admin.master')
@section('css')
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-body">
        {!! Form::open(['route' => 'orders.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete'
        => 'off', 'files' => true]) !!}
        {{ Form::hidden('id', $post && $post->id  ? $post->id : '', ['class'=>'form-control','id' => 'id', 'placeholder' => '']) }}
        <div class="row">
            <div class="col-md-9" style="border-right: 1px solid #ccc">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Auto Code</label>
                        <input type="text" disabled class="form-control" name="auto_code" id="auto_code" value="{{ $post && $post->auto_code ? $post->auto_code : '' }}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Khách hàng</label>
                        <select name="customer_id" id="" class="form-control" required>
                            <option value="">-- Chọn khách hàng</option>
                            @if($customer)
                                @foreach ($customer as $item)
                                    <option value="{{ $item->id }}" @if($post->customer_id == $item->id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Nhân viên bán hàng</label>
                        <select name="staff_id" id="" class="form-control">
                            <option value="">-- Chọn nhân viên</option>
                            @if($staff)
                                @foreach ($staff as $item)
                                    <option value="{{ $item->id }}" @if($post->staff_id == $item->id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Số hoá đơn</label>
                        {{ Form::text('invoice_number', $post && $post->id ? $post->invoice_number : '', ['class'=>'form-control','id' => 'invoice_number', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Số Packing list</label>
                        {{ Form::text('packing_list', $post && $post->id ? $post->packing_list : '', ['class'=>'form-control','id' => 'packing_list', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Số Bill</label>
                        {{ Form::text('bill_number', $post && $post->id ? $post->bill_number : '', ['class'=>'form-control','id' => 'bill_number', 'placeholder' => '']) }}
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
                            <input class="form-control pull-right" value="{{ $post && $post->invoice_date ? $post->invoice_date : '' }}" onchange="change_invoice_date(this)" id="invoice_date" placeholder="" name="invoice_date" type="text">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Thời hạn công nợ</label>
                        <input class="form-control" value="{{ $post && $post->debt_term_date ? $post->debt_term_date : 0 }}" onchange="change_debt_term_date(this)" id="debt_term_date" placeholder="" name="debt_term_date" type="number">
                    </div>
                    <div class="col-md-4">
                        <label for="">Hạn công nợ</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::hidden('_debt_due_date', $post->id && $post->debt_due_date ? $post->debt_due_date :date('d/m/Y') , ['class'=>'form-control','id' => '_debt_due_date', 'placeholder' => '']) }}
                            {{ Form::text('debt_due_date', $post && $post->id ? $post->debt_due_date : '', ['class'=>'form-control pull-right', 'id' => 'debt_due_date', 'placeholder' => '', 'disabled' => 'disabled']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="">Cảng đi (Port of loading)</label>
                        {{ Form::text('port_of_loading', $post && $post->id  ? $post->port_of_loading : '', ['class'=>'form-control pull-right', 'id' => 'port_of_loading', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-6">
                        <label for="">Giờ đi (ETD)</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::hidden('_etd', $post->id && $post->etd ? $post->etd :date('d/m/Y H:i:s') , ['class'=>'form-control','id' => '_etd', 'placeholder' => '']) }}
                            {{ Form::text('etd', $post && $post->id  ? $post->etd : '', ['class'=>'form-control pull-right', 'id' => 'etd', 'placeholder' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="">Cảng đến (Port of discharge)</label>
                        {{ Form::text('port_of_discharge', $post && $post->id  ? $post->port_of_discharge : '', ['class'=>'form-control pull-right', 'id' => 'port_of_discharge', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-6">
                        <label for="">Giờ đến (ETA)</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::hidden('_eta', $post->id && $post->eta ? $post->eta :date('d/m/Y H:i:s') , ['class'=>'form-control','id' => '_eta', 'placeholder' => '']) }}
                            {{ Form::text('eta', $post && $post->id  ? $post->eta : '', ['class'=>'form-control pull-right', 'id' => 'eta', 'placeholder' => '']) }}
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Số hiệu tàu</label>
                        {{ Form::text('train_number', $post && $post->id  ? $post->train_number : '', ['class'=>'form-control pull-right', 'id' => 'train_number', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Số Container</label>
                        {{ Form::text('number_of_containers', $post && $post->id  ? $post->number_of_containers : '', ['class'=>'form-control pull-right', 'id' => 'number_of_containers', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Địa điểm giao hàng</label>
                        {{ Form::text('place_of_delivery', $post && $post->id  ? $post->place_of_delivery : '', ['class'=>'form-control pull-right', 'id' => 'place_of_delivery', 'placeholder' => '']) }}
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Bảo hiểm</label>
                        {{ Form::text('insurrance', $post && $post->id  ? $post->insurrance : '', ['class'=>'form-control pull-right', 'id' => 'insurrance', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Incoterms</label>
                        {{-- {{ Form::text('incoterms', $post && $post->id  ? $post->incoterms : '', ['class'=>'form-control pull-right', 'id' => 'incoterms', 'placeholder' => '']) }} --}}
                        <select name="incoterms" id="incoterms" class="form-control" required>
                            {!! show_incoterms($post ? $post->incoterms : '') !!}
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Phương thức </label>
                        <select name="method" id="method" class="form-control" required onchange="change_method(this)">
                            {!! show_method($post ? $post->method : '') !!}
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="">Trạng thái đơn hàng</label>
                        <select name="status_orders" id="status_orders" class="form-control">
                            {!! status_orders($post ? $post->status_orders : '') !!}
                        </select>
                    </div> 
                    <div class="col-md-4 hidden" id="_type_lc">
                        <label for="">Số LC:</label>
                        {{ Form::text('lc_number', $post && $post->id  ? $post->lc_number : '', ['class'=>'form-control pull-right', 'id' => 'lc_number', 'placeholder' => '']) }}
                    </div>
                    <div class="col-md-4 hidden" id="_type_method">
                        <label for="">Loại TT:</label>
                        {{ Form::text('type_method', $post && $post->id  ? $post->type_method : '', ['class'=>'form-control pull-right', 'id' => 'type_method', 'placeholder' => '']) }}
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
                <div class="row form-inline form-group clearfix">
                    <div class="col-md-12 text-right">
                        <label for="currency_unit">Đơn vị tiền tệ (USD/EUR/.....):</label>
                        <input name="currency_unit" value="{{ $post && $post->currency_unit ? $post->currency_unit : '' }}" type="text" class="form-control" id="currency_unit" style="width: 20%" onchange="change_currency_unit(this)">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background: #3d8dbc">
                                <th style="width: 10px">#</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Đơn vị hàng (có thể là kg, lit, pcs,...)</th>
                                <th>Phương thức đóng gói</th>
                                <th>Trị giá</th>
                            </tr>
                        </thead>
                        <tbody id="body_list_products">
                            @if ($post && !$post->detail->isEmpty())
                                @foreach ($post->detail as $detail)
                                    <tr id="item_body_list_{{ $detail->products_id }}">
                                        <td>#{{ $detail->products_id }}</td>
                                        <td>{{ $detail->products ? $detail->products->title : ''}}</td>
                                        <td>{{ $detail->price }}</td>
                                        <td>
                                            <input id="quantity_{{ $detail->products_id }}" name="quantity[]" onchange="change_quantity(this)" value="{{ $detail->quantity }}" type="number" class="form-control" data-id="{{ $detail->products_id }}">
                                            <input id="products_{{ $detail->products_id }}" name="products[]" value="{{ $detail->products_id }}" type="hidden" class="form-control">
                                            <input id="price_{{ $detail->products_id }}" name="price[]" value="{{ $detail->price }}" type="hidden" class="form-control">
                                        </td>
                                        <td>
                                            <input id="item_unit_{{ $detail->products_id }}" name="item_unit[]" value="{{ $detail->item_unit }}" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input id="packing_method_{{ $detail->products_id }}" name="packing_method[]" value="{{ $detail->packing_method }}" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <strong id="price_temp_{{ $detail->products_id }}">{{ $detail->sub_total }}</strong>
                                        </td>
                                    </tr> 
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <label for="">Ghi chú</label>
                    {{ Form::textarea('note', $post && $post->id  ? $post->note : '', ['class'=>'form-control','id' => 'note', 'placeholder' => '', 'rows' => 5]) }}
                </div>
                <div class="form-group clearfix">
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="file_contract">Hợp đồng</label>
                        <input type="file" id="_file_contract" name="_file_contract" accept="application/pdf, application/PDX">
                        @if ($post->file_contract)
                            <p><a target="blank" title="{{ $post->file_contract }}" href="/attached/contract/{{ $post->file_contract }}"><b>{{ $post->file_contract }}</b> </a></p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="">File đính kèm</label>
                        <input type="file" id="_attached_file" name="_attached_file[]" accept="application/pdf, application/PDX" multiple>
                        @if ($post && !$post->attached->isEmpty())
                            @foreach ($post->attached as $attached)
                            <p><a target="blank" title="{{ $attached->name }}" href="/attached/file/{{ $attached->name }}"><b>{{ $attached->name }}</b> </a></p>
                            @endforeach
                        @endif
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Hoa hồng nhân viên(%)</label>
                    <input type="text" name="commission" id="commission" class="form-control" value="{{ $post->id ? $post->commission : 0 }}">
                </div>
                <div class="form-group">
                    <label>Tạm tính <span id="type_currency_unit"></span></label>
                    {{ Form::hidden('sub_total', $post && $post->id  ? $post->sub_total : 0, ['class'=>'form-control','id' => 'sub_total', 'placeholder' => '']) }}
                    {{ Form::text('_sub_total', $post && $post->id  ? $post->sub_total : 0, ['class'=>'form-control','id' => '_sub_total', 'placeholder' => '', 'disabled' => 'disabled']) }}
                </div>  
                <div class="form-group">
                    <label>Thanh toán <span id="type_currency_unit"></span></label>
                    <input type="number" onchange="update_payment(this, 'payment')" class="form-control" name="payment" id="payment" value="{{ $post->payment ? $post->payment : 0 }}">
                </div>
                <div class="form-group">
                    <label>Giảm giá (%)</label>
                    <input type="number" onchange="update_payment(this, 'discount')" class="form-control" name="discount" id="discount" value="{{ $post->payment ? $post->discount : 0 }}">
                </div>
                <div class="form-group">
                    <label>VAT (%)</label>
                    <input type="number" onchange="update_payment(this, 'vat')" class="form-control" name="vat" id="vat" value="{{ $post->payment ? $post->vat : 0 }}">
                </div>  
                <div class="form-group">
                    <label>Công nợ <span id="type_currency_unit"></span></label>
                    {{ Form::number('_deposit', $post && $post->id ? $post->deposit : 0, ['class'=>'form-control','id' => '_deposit', 'placeholder' => '', 'disabled' => 'disabled']) }}
                    {{ Form::hidden('deposit', $post && $post->id ? $post->deposit : 0, ['class'=>'form-control','id' => 'deposit', 'placeholder' => '']) }}
                </div>
                <hr>
                <div class="form-group">
                    @if ($post && $post->id)
                        <button type="button" class="btn btn-info" id="btn_confirm_status" onclick="confirm_payment()">Xác nhận đơn hàng</button>
                    @endif
                    <button type="submit" class="btn btn-warning">Lưu hoá đơn</button>
                </div>
            </div>
        </div>
        <input type="hidden" id="products_id" value="{{ $products_id }}">
        <input type="hidden" id="status_orders_old" value="{{ $post->status_orders ? $post->status_orders : 0 }}">
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        var id = $("#id").val();
        if(id){
            // edit stock
            var currency_unit = $("#currency_unit").val();
            if(currency_unit){
                $("#type_currency_unit").html('(' + currency_unit + ')');
            }
            var _method = $("#method").val();
            if(_method == 'TT'){
                $("#_type_method").removeClass('hidden');
            }
            if(_method == 'LC'){
                $("#_type_lc").removeClass('hidden');
            }
            var _products_id = JSON.parse($("#products_id").val());
            $('#select_products').val(_products_id).trigger("change");
        }
    });

    function confirm_payment(){
        var status_orders_old = $("#status_orders_old").val();
        var status_orders = $("#status_orders").val();
        var formData = new FormData();
        formData.append("status_orders", status_orders);
        formData.append("orders_id", $("#id").val());
        if(status_orders != status_orders_old){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: baseURL + "/admin/orders/confirm-status-orders",
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function (data) {
                    alert('Xác nhận trạng thái đơn hàng thành công !');
                    return false;
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert('Đã có lỗi xảy ra. Vui lòng thử lại sau !');
                    return false;
                }
            });
        }else{
            alert('Trạng thái đơn hàng phải khác trạng thái cũ !');
        }

        return false;
    };
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
                        _html += '<input id="quantity_'+data.id+'" name="quantity[]" onchange="change_quantity(this)" value="1"  type="number" class="form-control" data-id="'+data.id+'">';
                        _html += '<input id="products_'+data.id+'" name="products[]" value="'+data.id+'" type="hidden" class="form-control">';
                        _html += '<input id="price_'+data.id+'" name="price[]" value="'+data.price+'" type="hidden" class="form-control">';
                        _html += '</td>';
                        _html += '<td>';
                        _html += '<input id="item_unit_'+data.id+'" name="item_unit[]" value="" type="text" class="form-control">';
                        _html += '</td>';
                        _html += '<td>';
                        _html += '<input id="packing_method_'+data.id+'" name="packing_method[]" value="" type="text" class="form-control">';
                        _html += '</td>';
                        _html += '<td>';
                        _html += '<strong id="price_temp_'+data.id+'">'+data.price+'</strong>';
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
        if($("#item_body_list_"+remove.id).length){
            $("#item_body_list_"+remove.id).remove();
        }
    });

    function change_quantity(element){
        var product_id = $(element).data('id');
        var price = $("#price_" + product_id).val();
        var _price_temp = $(element).val() * price;
        $("#price_temp_" + product_id).html(_price_temp);
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
                var _temp_in_row = value * _price[key];
                _temp += parseInt(_temp_in_row);
            });
        }
        //$("#_sub_total").val(formatVND(_temp));
        $("#_sub_total").val(_temp);
        $("#sub_total").val(_temp);
    }

    function update_payment(e, type){
        var sub_total = parseInt($("#sub_total").val());
        var payment = parseInt($("#payment").val());
        var discount = parseInt($("#discount").val());
        var vat = parseInt($("#vat").val());
        
        var _discount = (discount * sub_total) / 100;
        var _vat = (vat * sub_total) / 100;
        //var _deposit = (sub_total + _vat) - discount; 
        var _deposit = (sub_total + _vat) - (_discount + payment); 
        $("#deposit").val(_deposit);
        $("#_deposit").val(_deposit);
    }
</script>
@endsection