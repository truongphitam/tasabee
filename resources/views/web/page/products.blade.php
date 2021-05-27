@extends('web.master')
@section('content')

<section id="product-banner" class="clearfix">
	<img src="/assets/web/images/product-banner.jpg">
	<div class="container">
		<div class="product-cat-name">
			<b>
				sản phẩm
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
							<b>Category</b>
						</p>
						<ul class="list-unstyled product-cat-menu">
							<li class="active">
								<a href="#!">
									honey bee
								</a>

								<span class="collapsed" data-toggle="collapse" data-target="#ul_1">
									<i class="fa fa-chevron-down"></i>
								</span>
								<ul id="ul_1" class="list-unstyled collapse show">
									<li class="active">
										<a href="#!">
											SP 1
										</a>
									</li>
									<li>
										<a href="#!">
											SP 2
										</a>
									</li>
									<li>
										<a href="#!">
											SP 3
										</a>
									</li>
								</ul>

							</li>
							<li>
								<a href="#!">
									bee polen
								</a>

								<span class="collapsed" data-toggle="collapse" data-target="#ul_2">
									<i class="fa fa-chevron-down"></i>
								</span>
								<ul id="ul_2" class="list-unstyled collapse">
									<li>
										<a href="#!">
											SP 1
										</a>
									</li>
									<li>
										<a href="#!">
											SP 2
										</a>
									</li>
									<li>
										<a href="#!">
											SP 3
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>


					<div class="product-left-item">
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


					<div class="product-left-item">
						<p class="product-cat-title">
							<b>Price</b>
						</p>
						<div class="product-filter-option">
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="price">
									<span></span>
									Option 1
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label" role="button">
									<input type="radio" class="form-check-input" name="price">
									<span></span>
									Option 2
								</label>
							</div>
						</div>
					</div>


					<div class="product-left-item">
						<p class="product-cat-title">
							<b>Best sellers</b>
						</p>
						<ul class="list-unstyled">
							@if ($best_sellers)
								@foreach($best_sellers as $sellers)
									<li class="product-seller">
										<a href="#!" title="{!! $sellers->title !!}">
											<img src="{{ $sellers->image }}" alt="{!! $sellers->title !!}">
											<div class="product-seller-text">
												<p class="product-seller-name">
													<strong>
														{!! $sellers->title !!}
													</strong>
												</p>
												<hr/>
												<a class="product-seller-price" href="{!! route('detailProducts', $sellers->slug) !!}">
													<strong class="c_d1480b">Chi Tiết</strong>
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
											<a href="{!! route('detailProducts', $item->slug) !!}" title="{!! $item->title !!}">
												<p class="product-img">
													<img src="{!! $item->image !!}" alt="{!! $item->title !!}">
												</p>
												<p class="product-name">
													{!! $item->title !!}
												</p>
												<hr>
												<p class="product-price">
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