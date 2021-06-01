@extends('web.master')
@section('meta_title', $data->meta_title ? $data->meta_title : $settings->meta_title)
@section('meta_description', $data->meta_description ? $data->meta_description : $settings->meta_description)
@section('meta_keywords', $data->meta_keywords ? $data->meta_keywords : $settings->meta_keywords)
@section('image', $data->image ? $data->image : $settings->image)
@section('content')
<section id="product-banner" class="clearfix">
	<img src="/assets/web/images/product-banner.jpg">
	<div class="container">
		<div class="product-cat-name">
			<b>
				{{ trans('web.menu.products') }}
			</b>
			<ul class="list-inline text-center">
				<li class="list-inline-item">
					<a href="">
						{{ trans('web.menu.home') }}
					</a>
				</li>
				/
				<li>
					<a href="">
						{{ trans('web.menu.products') }}
					</a>
				</li>
				/
				<li>
					<a href="{{ route('detailProducts', $data->slug) }}" title="{!! $data->title !!}">
						{{ $data->title }}
					</a>
				</li>
			</ul>
		</div>
	</div>
</section>

<section id="product-detail" class="clearfix padding-50">

	<div class="container">
		<div class="product-detail-box">
			<div class="row">
				<div class="col-md-8">
					<div class="product-detail-left">
						<div class="row">
							<div class="col-3 no-padding-right">
								<div class="product-vertical-slider">
									@if ($data->gallery && !$data->gallery->isEmpty())
										@foreach ($data->gallery as $gallery)
											<div>
												<div class="product-vertical-slide">
													<img src="{!! $gallery->image !!}" class="img-responsive" alt="{!! $data->title !!}">
												</div>
											</div>
										@endforeach
									@else
										<div>
											<div class="product-vertical-slide">
												<img src="{!! $data->image !!}" class="img-responsive" alt="{!! $data->title !!}">
											</div>
										</div>	
									@endif
								</div>
							</div>
							<div class="col-9">
								<div class="product-main-slider">
									@if ($data->gallery && !$data->gallery->isEmpty())
										@foreach ($data->gallery as $gallery)
											<div>
												<div class="product-vertical-slide">
													<img src="{!! $gallery->image !!}" class="img-responsive" alt="{!! $data->title !!}">
												</div>
											</div>
										@endforeach
									@else
										<div>
											<div class="product-vertical-slide">
												<img src="{!! $data->image !!}" class="img-responsive" alt="{!! $data->title !!}">
											</div>
										</div>	
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="product-detail-right">
						<h1 class="product-detail-title text-uppercase">
							<strong>
								{!! $data->title !!}
							</strong>
						</h1>

						<p class="hidden product-detail-price">
							<strong class="c_d1480b">390.000</strong> vnđ
						</p>

						<div class="product-detail-excerpt">
							{!! $data->expert !!}
						</div>

						<hr class="product-detail-hr" />

						<p class="no-margin"><strong>Size:</strong></p>

						<ul class="product-detail-size list-inline">
							<li class="active">
								<a href="#!">
									10 gm
								</a>
							</li>
							<li>
								<a href="#!">
									50 gm
								</a>
							</li>
							<li>
								<a href="#!">
									100 gm
								</a>
							</li>
							<li>
								<a href="#!">
									200 gm
								</a>
							</li>
							<li>
								<a href="#!">
									250 gm
								</a>
							</li>
							<li>
								<a href="#!">
									300 gm
								</a>
							</li>
						</ul>

						<div class="product-detail-btn">
							<div class="row align-items-center">
								<div class="col-6">
									<a role="button" href="#product-modal" data-toggle="modal" class="btn btn-style-1 btn-100">
										<i>
											{{ trans('web.menu.contact') }}
										</i>
									</a>
								</div>
								<div class="col-6">
									<div class="d-flex align-items-center justify-content-around">
										<small class="d-flex align-items-center">CHIA SẺ &nbsp<img src="/assets/web/images/icon-share.png" width="15"></small> 
										<a href="">
											<img src="/assets/web/images/icon-fb.png" width="24">
										</a>
										<a href="">
											<img src="/assets/web/images/icon-twiter.png" width="24">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="product-detail-tab">
			<ul class="nav nav-tabs" id="product-tab-nav" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#tab-1">
						Description
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " data-toggle="tab" href="#tab-2">
						Write review
					</a>
				</li>
			</ul>
			<div class="tab-content" id="tab-content-product">
				<div class="tab-pane fade show active" id="tab-1">
					<div class="text-justify">
						{!! $data->description !!}
					</div>
				</div>
				<div class="tab-pane fade " id="tab-2">
					<p>
						<strong>Customer Reviews</strong>
					</p>
					<p>
						<strong>SANDRA RUIZ</strong>
						<br/>
						May 10, 2021
					</p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
					<hr class="product-detail-hr">
					<p>
						<strong>
							Leave a comment:
						</strong>
						<br/>
						Your email address will not be published. Required fields are marked *
					</p>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="frm-cmt">
								<div class="form-group">
									<textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Name">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Your Email">
								</div>
								<div class="center-xs">
									<button class="btn btn-style-1">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</section>

<section id="orther-product" class="padding-50 clearfix">
	<div class="container">
		<h2 class="home-title text-uppercase text-center">
			<b>
				Sản Phẩm <span class="c_ff7200">Khác</span>
			</b>
		</h2>
		<p class="text-center">
			quis nostrud quam est, qui dolorem ipsum 
			<br>
			quis nostrud quam est, qui dolorem ipsum quia dolor sit amet, consecquaerat 
		</p>
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1">
				<div class="padding-25">
					@if($related)
					<div class="home-silder-product">
						@foreach ($related as $item)
							<div>
								<div class="slide-product">
									<a href="{!! route('detailProducts', $item->slug )!!}" title="{!! $item->title !!}">
										<p class="slide-product-img">
											<img src="{!! $item->image !!}" alt="{!! $item->title !!}">
										</p>
										<p class="slide-product-name">
											{!! $item->title !!}
										</p>
										<hr/>
										<p class="slide-product-price">
											<span>Chi tiết</span>
										</p>
									</a>
								</div>
							</div> 
						@endforeach
					</div>
					@endif
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