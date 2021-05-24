@extends('web.master')
@section('content')


<section id="home-banner" class="clearfix">
	<div id="home-slider">
		<div>
			<div class="home-banner-item">
				<img src="/assets/web/images/about.jpg" class="img-responsive">
				<div class="home-banner-box">
					<div class="container">
						<p>
							<b>
								ORGANIC FRESH 
								<br/>
								HONEY ONLY
							</b>
						</p>
						<ul class="list-inline">
							<li class="list-inline-item">
								<img src="/assets/web/images/icon-calendar.png" height="20"> 
								May 10, 2021
							</li>
							<li class="list-inline-item">
								<img src="/assets/web/images/icon-location.png" height="20"> 
								Bảo Lộc, Lâm Đồng
							</li>
						</ul>
						<p class="center-xs">
							<a href="#" class="btn btn-style-1 font-italic">
								Chi Tiết
							</a>
						</p>
					</div>
				</div>
			</div>
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
							<li class="product-seller">
								<a href="#!">
									<img src="/assets/web/images/product.jpg">
									<div class="product-seller-text">
										<p class="product-seller-name">
											<strong>
												Mật ong TASEBE 500G
											</strong>
										</p>
										<hr/>
										<p class="product-seller-price">
											<strong class="c_d1480b">390.000</strong> vnđ
										</p>
									</div>
								</a>
							</li>

							<li class="product-seller">
								<a href="#!">
									<img src="/assets/web/images/product.jpg">
									<div class="product-seller-text">
										<p class="product-seller-name">
											<strong>
												Mật ong TASEBE 500G
											</strong>
										</p>
										<hr/>
										<p class="product-seller-price">
											<strong class="c_d1480b">390.000</strong> vnđ
										</p>
									</div>
								</a>
							</li>
						</ul>
					</div>



				</div>
			</div>
			<div class="col-12 col-md-9">
				<div class="row">
					<div class="col-12 col-md-10 offset-md-1">
						<div class="product-list-right">
							<div class="row">
								<div class="col-md-4">
									<div class="product-item">

										<span class="product-sale">
											sale
										</span>

										<a href="product-detail.html">
											<p class="product-img">
												<img src="/assets/web/images/product.jpg">
											</p>
											<p class="product-name">
												Mật ong
												TASABE 500G
											</p>
											<hr>
											<p class="product-price">
												<span>390.000</span> vnđ
											</p>
										</a>
									</div>
								</div>

								<div class="col-md-4">
									<div class="product-item">

										<span class="product-sale">
											sale
										</span>

										<a href="product-detail.html">
											<p class="product-img">
												<img src="/assets/web/images/product.jpg">
											</p>
											<p class="product-name">
												Mật ong
												TASABE 500G
											</p>
											<hr>
											<p class="product-price">
												<span>390.000</span> vnđ
											</p>
										</a>
									</div>
								</div>

								<div class="col-md-4">
									<div class="product-item">

										<span class="product-sale">
											sale
										</span>

										<a href="product-detail.html">
											<p class="product-img">
												<img src="/assets/web/images/product.jpg">
											</p>
											<p class="product-name">
												Mật ong
												TASABE 500G
											</p>
											<hr>
											<p class="product-price">
												<span>390.000</span> vnđ
											</p>
										</a>
									</div>
								</div>

								<div class="clearfix"></div>

								<div class="col-md-4">
									<div class="product-item">

										<a href="product-detail.html">
											<p class="product-img">
												<img src="/assets/web/images/product.jpg">
											</p>
											<p class="product-name">
												Mật ong
												TASABE 500G
											</p>
											<hr>
											<p class="product-price">
												<span>390.000</span> vnđ
											</p>
										</a>
									</div>
								</div>

							</div>
							<div class="text-center">
								<a href="#!" class="btn btn-style-1">
									<i>Xem thêm</i>
								</a>
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

@endsection
@section('js')

@endsection