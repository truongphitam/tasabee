@extends('web.master')
@section('meta_title', $page && $page->meta_title ? $page->meta_title : $settings->meta_title)
@section('meta_description', $page && $page->meta_description ? $page->meta_description : $settings->meta_description)
@section('image', $page && $page->image ? $page->image : $settings->image)
@section('content')

@include('web.inc.sliders')

<section id="about" class="clearfix padding-50">
	<img src="/assets/web/images/product-bee-right.png" class="hidden-xs pr-bee-left" style="max-width: 100px">
	<img src="/assets/web/images/icon-bee.png" class="hidden-xs pr-bee-right" style="max-width: 50px">
	<div class="container">
		<div class="about-section-1">
			<div class="row">
				<div class="col-12 col-md-6">
					<hr/>
					<p class="c_777">
						<strong>
							CÂU CHUYỆN CỦA CHÚNG TÔI
						</strong>
					</p>
					<h2>
						<b>
							Với 25 năm kinh nghiệm trong ngành ong ở Việt Nam.
						</b>
					</h2>
				</div>
				<div class="col-12 col-md-6">
					<div class="text-justify c_777">
						<p>
							Tasa bee thành lập với mong muốn đưa các sản phẩm ong nguyên chất ra nước ngoài bằng con đường trực diện hơn. 
						</p>
						<p>
							Ưu tiên của chúng tôi là cung cấp những sản phẩm ong chất lượng cao, đồng thời giúp khách hàng biết và tận dụng nguồn lợi ích không ngờ mà mật ong và các sản phẩm ong mang đến cho sức khỏe con người.
						</p>
						<p>
							Hơn thế nữa, Tasabee còn hướng tới việc thúc đẩy phát triển ngành nông nghiệp bền vững nhằm góp phần xây dựng thương hiệu cho ngành nuôi ong Việt Nam nói chung. 
						</p>
						<p>
							Bởi vì Tasabee tin rằng đó sẽ là con đường dẫn tới cuộc sống khỏe mạnh cho người tiêu dùng cũng như đóng góp những giá trị và lợi ích tích cực cho cộng đồng.
						</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

<section class="padding-50">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="about-item">
					<img src="/assets/web/images/news.png">
					<div class="about-title">
						<p>
							<strong>
								tầm nhìn
							</strong>
						</p>
						<hr>
					</div>
					<div class="about-content">
						<p class="text-uppercase">
							<strong>
								Tầm Nhìn
							</strong>
						</p>
						<p>
							Đảm bảo sản phẩm đạt chất lượng và an toàn thực phẩm, coi trọng sức khoẻ con người.
						</p>
						<p>
							Phát triển mạng lưới cung ứng và tiêu thụ chuyên nghiệp, đặt chất lượng làm tiêu điểm.
						</p>
						<p>
							Đảm bảo môi trường sản xuất hợp quy chuẩn, quan tâm vấn đề an toàn vệ sinh.
						</p>
						<p>
							Tạo dựng môi trường làm việc, lấy sự trung thực làm nền tảng.
						</p>
						Lan tỏa những giá trị nhân văn, xem sẻ chia là mạch sống

					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="about-item">
					<img src="/assets/web/images/news.png">
					<div class="about-title">
						<p>
							<strong>
								tầm nhìn
							</strong>
						</p>
						<hr>
					</div>
					<div class="about-content">
						<p class="text-uppercase">
							<strong>
								Tầm Nhìn
							</strong>
						</p>
						<p>
							Đảm bảo sản phẩm đạt chất lượng và an toàn thực phẩm, coi trọng sức khoẻ con người.
						</p>
						<p>
							Phát triển mạng lưới cung ứng và tiêu thụ chuyên nghiệp, đặt chất lượng làm tiêu điểm.
						</p>
						<p>
							Đảm bảo môi trường sản xuất hợp quy chuẩn, quan tâm vấn đề an toàn vệ sinh.
						</p>
						<p>
							Tạo dựng môi trường làm việc, lấy sự trung thực làm nền tảng.
						</p>
						Lan tỏa những giá trị nhân văn, xem sẻ chia là mạch sống

					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="about-item">
					<img src="/assets/web/images/news.png">
					<div class="about-title">
						<p>
							<strong>
								tầm nhìn
							</strong>
						</p>
						<hr>
					</div>
					<div class="about-content">
						<p class="text-uppercase">
							<strong>
								Tầm Nhìn
							</strong>
						</p>
						<p>
							Đảm bảo sản phẩm đạt chất lượng và an toàn thực phẩm, coi trọng sức khoẻ con người.
						</p>
						<p>
							Phát triển mạng lưới cung ứng và tiêu thụ chuyên nghiệp, đặt chất lượng làm tiêu điểm.
						</p>
						<p>
							Đảm bảo môi trường sản xuất hợp quy chuẩn, quan tâm vấn đề an toàn vệ sinh.
						</p>
						<p>
							Tạo dựng môi trường làm việc, lấy sự trung thực làm nền tảng.
						</p>
						Lan tỏa những giá trị nhân văn, xem sẻ chia là mạch sống

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="padding-50 about-arcodion">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<p class="text-center">
					<img src="/assets/web/images/about-ar-1.jpg">
				</p>
			</div>
			<div class="col-12 col-md-6">
				<div class="clearfix">
					<h2 class="home-title text-uppercase center-xs">
						<b>
							cam kết <span class="c_ff7200">của chúng tôi</span>
						</b>
					</h2>
					<p class="c_777">
						Tasa bee thành lập với mong muốn đưa các sản phẩm ong nguyên chất ra nước ngoài bằng con đường trực diện hơn. 
					</p>
					<div id="accordion-about">

						<div class="card">
							<a class="card-link" data-toggle="collapse" href="#collapseOne">
								<div class="card-header">
									<strong>Collapsible Group Item #1</strong>
								</div>
							</a>
							<div id="collapseOne" class="collapse show" data-parent="#accordion-about">
								<div class="card-body">
									Lorem ipsum..
								</div>
							</div>
						</div>

						<div class="card">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
								<div class="card-header">
									<strong>Collapsible Group Item #2</strong>
								</div>
							</a>
							<div id="collapseTwo" class="collapse" data-parent="#accordion-about">
								<div class="card-body">
									Lorem ipsum..
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="padding-50 about-team">
	<div class="container">
		<h2 class="home-title text-uppercase text-center">
			<b>
				team <span class="c_ff7200">tasabee</span>
			</b>
		</h2>
		<p class="text-center">
			quis nostrud quam est, qui dolorem ipsum 
			<br/>
			quis nostrud quam est, qui dolorem ipsum quia dolor sit amet, consecquaerat 
		</p>


		<div class="padding-25">
			<div class="home-silder-product about-slider">
				<div>
					<div class="about-slide">
						<img src="/assets/web/images/about-g.png">
						<div class="about-slide-info">
							<div>
								<p>
									ANNE HATHAWAY
								</p>
								<p>

								</p>
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-fb-about.png">
										</a>
									</li>
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-gg-about.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div>
					<div class="about-slide">
						<img src="/assets/web/images/about-g.png">
						<div class="about-slide-info">
							<div>
								<p>
									ANNE HATHAWAY
								</p>
								<p>

								</p>
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-fb-about.png">
										</a>
									</li>
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-gg-about.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div>
					<div class="about-slide">
						<img src="/assets/web/images/about-g.png">
						<div class="about-slide-info">
							<div>
								<p>
									ANNE HATHAWAY
								</p>
								<p>

								</p>
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-fb-about.png">
										</a>
									</li>
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-gg-about.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div>
					<div class="about-slide">
						<img src="/assets/web/images/about-g.png">
						<div class="about-slide-info">
							<div>
								<p>
									ANNE HATHAWAY
								</p>
								<p>

								</p>
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-fb-about.png">
										</a>
									</li>
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-gg-about.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div>
					<div class="about-slide">
						<img src="/assets/web/images/about-g.png">
						<div class="about-slide-info">
							<div>
								<p>
									ANNE HATHAWAY
								</p>
								<p>

								</p>
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-fb-about.png">
										</a>
									</li>
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-gg-about.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div>
					<div class="about-slide">
						<img src="/assets/web/images/about-g.png">
						<div class="about-slide-info">
							<div>
								<p>
									ANNE HATHAWAY
								</p>
								<p>

								</p>
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-fb-about.png">
										</a>
									</li>
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-gg-about.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div>
					<div class="about-slide">
						<img src="/assets/web/images/about-g.png">
						<div class="about-slide-info">
							<div>
								<p>
									ANNE HATHAWAY
								</p>
								<p>

								</p>
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-fb-about.png">
										</a>
									</li>
									<li class="list-inline-item">
										<a href="">
											<img src="/assets/web/images/icon-gg-about.png">
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="padding-25">
	<div class="about-banner-box">
		<img src="/assets/web/images/about-banner-2.jpg">
		<div class="about-banner-text">
			<div>
				<h3 class="text-uppercase">
					<strong>
						memories from event 2020
					</strong>
				</h3>
				<p>
					Check our amazing last year moments
				</p>
			</div>
		</div>
	</div>
</section>


@endsection
@section('css')
@endsection
@section('js')
@endsection