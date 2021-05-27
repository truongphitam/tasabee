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
				{{ Auth::check() ? Auth::user()->name : '' }}
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
					<table class="table table-bordered">
						<thead>
							<th>ID</th>
							<th>Nhân viên </th>
							<th>Số hoá đơn</th>
							<th>Số Packing list </th>
							<th>Số Bill </th>
							<th>Ngày lập hóa đơn </th>
							<th>Thời hạn công nợ</th>
							<th>Hạn công nợ</th>
							<th>Trạng thái đơn hàng</th>
						</thead>
						<tbody>
							@if($orders)
								@foreach ($orders as $order)
									<tr>
										<td>
											<a href="{{ route('users-fe.detailOrders', ['id' => $order->customer_id, 'ordersID' => $order->id]) }}" title="">
												<b>{{ $order->auto_code }}</b>
											</a>
										</td>
										<td>{{ $order->staff ? $order->staff->name : ''}}</td>
										<td>{{ $order->invoice_number }}</td>
										<td>{{ $order->packing_list }}</td>
										<td>{{ $order->bill_number }}</td>
										<td>{{ convertToDMY($order->invoice_date) }}</td>
										<td>{{ $order->debt_term_date }}</td>
										<td>{{ convertToDMY($order->debt_due_date) }}</td>
										<td>{{ show_title_status_orders($order->status_orders) }}</td>
									</tr>	
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('css')

@endsection
@section('js')

@endsection