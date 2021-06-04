@extends('web.master')
@section('meta_title', $page && $page->meta_title ? $page->meta_title : $settings->meta_title)
@section('meta_description', $page && $page->meta_description ? $page->meta_description : $settings->meta_description)
@section('image', $page && $page->image ? $page->image : $settings->image)
@section('content')

<section id="product-banner" class="clearfix">
	<img src="/assets/web/images/product-banner.jpg">
	<div class="container">
		<div class="product-cat-name">
			<b>
				{{ trans('web.menu.products') }}
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
				<div class="product-list-left">

					<div class="product-left-item">
						<p class="product-cat-title">
							<b>{{ trans('web.field.category') }}</b>
						</p>
						<ul class="list-unstyled product-cat-menu">
							@if($cate_products)
								@foreach ($cate_products as $index => $cate)
									<li class="{{ $index == 0 ? 'active' : '' }}">
										<a href="#!">
											{!! $cate->title !!}
										</a>
										@if($cate->products)
											<span class="collapsed" data-toggle="collapse" data-target="#cate_products_{{ $index }}">
												<i class="fa fa-chevron-down"></i>
											</span>
											<ul id="cate_products_{{ $index }}" class="list-unstyled collapse show">
												@foreach ($cate->products as $products)
													<li class="active">
														<a href="{!! route('detailProducts', $products->slug) !!}" title="{{ getLocaleValue($products->title) }}">
															{{ getLocaleValue($products->title) }}
														</a>
													</li> 
												@endforeach
											</ul>
										@endif
									</li>
								@endforeach
							@endif
						</ul>
					</div>
					<div class="hidden product-left-item">
						<p class="product-cat-title">
							<b>Weight</b>
						</p>
						<div class="product-filter-option">
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="weight">
									<span></span>
									Option 1
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="weight">
									<span></span>
									Option 2
								</label>
							</div>
						</div>
					</div>
					<div class="hidden product-left-item">
						<p class="product-cat-title">
							<b><b>{{ trans('web.field.price') }}</b></b>
						</p>
						<div class="product-filter-option">
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="price">
									<span></span>
									< 100
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="price">
									<span></span>
									100-200
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="price">
									<span></span>
									200-300
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="price">
									<span></span>
									300-400
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="price">
									<span></span>
									400-500
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="price">
									<span></span>
									> 500
								</label>
							</div>
						</div>
					</div>
					<div class="product-left-item">
						<p class="product-cat-title">
							<b><b>{{ trans('web.field.best_sellers') }}</b></b>
						</p>
						<ul class="list-unstyled">
							@if ($best_sellers)
								@foreach($best_sellers as $sellers)
									<li class="product-seller">
										<a href="{!! route('detailProducts', $sellers->slug) !!}" title="{!! $sellers->title !!}">
											<img src="{{ $sellers->image }}" alt="{!! $sellers->title !!}">
											<div class="product-seller-text">
												<p class="product-seller-name">
													<strong>
														{!! $sellers->title !!}
													</strong>
												</p>
												<hr/>
												<a class="product-seller-price" href="{!! route('detailProducts', $sellers->slug) !!}">
													<strong class="c_d1480b">{{ trans('web.field.detail') }}</strong>
												</a>
											</div>
										</a>
									</li>
								@endforeach
							@endif
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-9">
				<div class="row">
					<div class="col-12 col-md-10 offset-md-1">
						<div class="product-list-right">
							@if ($data)
							<div class="row">
								@foreach ($data as $item)
									<div class="col-md-4">
										<div class="product-item">
											@if($item->type == 2)
												<span class="product-sale">
													sale
												</span>
											@endif
											<a href="{!! route('detailProducts', $item->slug) !!}" title="{!! getLocaleValue($item->title) !!}">
												<p class="product-img">
													<img src="{!! $item->image !!}" alt="{!! getLocaleValue($item->title) !!}">
												</p>
												<p class="product-name">
													{!! getLocaleValue($item->title) !!}
												</p>
												<hr>
												<p class="product-price">
													<span>{{ trans('web.field.detail') }}</span>
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
				@if($data->items() && !empty($data->items()))
					<nav class="text-center pagination-new">
						<ul class="pagination justify-content-center">
							@if ($data->currentPage() > 1)
								<li class="page-item">
									<a class="page-link" href="{!! url()->current() !!}?page={!! $data->currentPage() - 1 !!}" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
							@endif
							@for( $i=1;$i <= $data->lastPage(); $i++)
								<li class="page-item {{ $i == $data->currentPage() ? 'active' : '' }}">
									<a class="page-link" href="{!! url()->current() !!}?page={!! $i !!}">{!! $i !!}</a>
								</li> 
							@endfor
							@if ($data->currentPage() < $data->lastPage())
								<li class="page-item">
									<a class="page-link" href="{!! url()->current() !!}?page={!! $data->currentPage() + 1 !!}" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							@endif
						</ul>
					</nav>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection
@section('css')

@endsection
@section('js')

@endsection