@extends('web.master')
@section('meta_title',$settings->meta_title)
@section('meta_description',$settings->meta_description)
@section('image',$settings->image)
@section('content')
<section id="product-banner" class="clearfix">
    <img src="/assets/web/images/product-banner.jpg">
    <div class="container">
        <div class="product-cat-name">
            <b>
                #{{ $orders->auto_code }}
            </b>
        </div>
    </div>
</section>
<section id="product-list" class="clearfix padding-50">
    <img src="/assets/web/images/product-bee.png" class="hidden-xs pr-bee-left">
    <img src="/assets/web/images/product-bee-right.png" class="hidden-xs pr-bee-right">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                @include('web.page.users.left_menu')
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">Auto Code</label>: {{ $orders->auto_code }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Khách hàng</label>:
                                {{ $orders->customer ? $orders->customer->name : '' }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Nhân viên bán hàng</label>:
                                {{ $orders->staff ? $orders->staff->name : '' }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">Số hoá đơn</label>: {{ $orders->invoice_number }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Số Packing list</label>: {{ $orders->packing_list }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Số Bill</label>: {{ $orders->bill_number }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">Ngày lập hóa đơn</label>: {{ $orders->invoice_date }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Thời hạn công nợ</label>: {{ $orders->debt_term_date }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Hạn công nợ</label>: {{ $orders->debt_due_date }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">Cảng đi (Port of loading)</label>: {{ $orders->port_of_loading }}
                            </div>
                            <div class="col-md-6">
                                <label for="">Giờ đi (ETD)</label>: {{ $orders->etd }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="">Cảng đến (Port of discharge)</label>: {{ $orders->port_of_discharge }}
                            </div>
                            <div class="col-md-6">
                                <label for="">Giờ đến (ETA)</label>: {{ $orders->eta }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">Số hiệu tàu</label>: {{ $orders->train_number }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Số Container</label>: {{ $orders->number_of_containers }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Địa điểm giao hàng</label>: {{ $orders->place_of_delivery }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">Bảo hiểm</label>: {{ $orders->insurrance }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Incoterms</label>: {{ $orders->incoterms }}
                            </div>
                            <div class="col-md-4">
                                <label for="">Phương thức </label>: {{ $orders->method }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="">Trạng thái đơn hàng</label>: {{ show_title_status_orders($orders->status_orders) }}
                            </div>
                            @if($orders->method == 'LC')
                                <div class="col-md-4" id="_type_lc">
                                    <label for="">Số LC:</label>: {{ $orders->lc_number }}
                                </div>
                            @endif
                            @if($orders->method == 'TT')
                                <div class="col-md-4" id="_type_method">
                                    <label for="">Loại TT:</label>{{ $orders->type_method }}
                                </div>
                            @endif
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
                                    @if($orders && !$orders->detail->isEmpty())
                                        @foreach($orders->detail as $detail)
                                            <tr id="item_body_list_{{ $detail->products_id }}">
                                                <td>#{{ $detail->products_id }}</td>
                                                <td>{{ $detail->products ? $detail->products->title : '' }}
                                                </td>
                                                <td>{{ $detail->price }}</td>
                                                <td>
                                                    {{ $detail->quantity }}
                                                </td>
                                                <td>
                                                    {{ $detail->item_unit }}
                                                </td>
                                                <td>
                                                    {{ $detail->packing_method }}
                                                </td>
                                                <td>
                                                    <strong
                                                        id="price_temp_{{ $detail->products_id }}">{{ $detail->sub_total }}</strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label for="">Ghi chú</label>: {{ $orders->note }}
                        </div>
                        <div class="form-group clearfix">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="file_contract">Hợp đồng</label>
                                    @if($orders->file_contract)
                                        <p><a target="blank" title="{{ $orders->file_contract }}"
                                                href="/attached/contract/{{ $orders->file_contract }}"><b>{{ $orders->file_contract }}</b>
                                            </a></p>
                                    @endif
                                    <label for="">File đính kèm</label>
                                    @if($orders && !$orders->attached->isEmpty())
                                        @foreach($orders->attached as $attached)
                                            <p><a target="blank" title="{{ $attached->name }}"
                                                    href="/attached/file/{{ $attached->name }}"><b>{{ $attached->name }}</b>
                                                </a></p>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Tạm tính ({{ $orders->currency_unit }})</th>
                                                    <td class="text-right">{{ $orders->sub_total }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Thanh toán ({{ $orders->currency_unit }})</th>
                                                    <td class="text-right">{{ $orders->payment }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Giảm giá (%)</th>
                                                    <td class="text-right">{{ $orders->discount }}</td>
                                                </tr>
                                                <tr>
                                                    <th>VAT (%)</th>
                                                    <td class="text-right">{{ $orders->vat }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Công nợ ({{ $orders->currency_unit }}</th>
                                                    <td class="text-right">{{ $orders->vat }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
<style>
    label {
        font-weight: bold;
    }
</style>
@endsection
@section('js')

@endsection