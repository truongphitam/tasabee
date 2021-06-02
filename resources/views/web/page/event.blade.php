@extends('web.master')
@section('meta_title', $page && $page->meta_title ? $page->meta_title : $settings->meta_title)
@section('meta_description', $page && $page->meta_description ? $page->meta_description : $settings->meta_description)
@section('image', $page && $page->image ? $page->image : $settings->image)
@section('content')

<section id="home-banner" class="clearfix">
	<div id="home-slider">

		<div>
			<div class="home-banner-item">
				<img src="/uploads/images/banner-1.jpg" class="img-responsive" alt="">
				<div class="home-banner-box">
					<div class="container">
						<p>
							<b>{{ trans('web.menu.event') }}</b>
						</p>
						<ul class="list-inline">
							<li class="list-inline-item">
								<img src="/assets/web/images/icon-calendar.png" height="20"> May 10, 2021
							</li>
							<li class="list-inline-item">
								<img src="/assets/web/images/icon-location.png" height="20"> Bảo Lộc
							</li>
						</ul>

						<p class="center-xs">
							<a href="" class="btn btn-style-1 font-italic" title="">
								Xem thêm
							</a>
						</p>

					</div>
				</div>
			</div>
		</div> 

	</div>
</section>

<section id="event" class="padding-25">
	<div class="container">
		<p class="text-center">
			<img src="/assets/web/images/icon-bee.png" width="45">
		</p>
		<h2 class="home-title text-uppercase text-center c_ff7200">
			<b>
				<span class="c_222">event -</span> sự kiện nổi bật
			</b>
		</h2>
		<div class="list-events">
			<div class="event-1">
				<div class="row">

					<div class="col-12 col-md-6">

						<div class="event-item">
							<div class="row">
								<div class="col-12 col-md-5">
									<p class="event-img">
										<img src="/assets/web/images/news.png">
									</p>
								</div>
								<div class="col-12 col-md-7">
									<hr>
									<h3>
										<a href="#!" class="c_222">
											<strong>
												Neque Porro Quisquam
											</strong>
										</a>
									</h3>
									<ul class="list-inline">
										<li class="list-inline-item">
											<img src="/assets/web/images/event-icon-1.png" height="20"> 2021-05-05
										</li>
										<li class="list-inline-item">
											<img src="/assets/web/images/event-icon-2.png" height="20"> Bao Loc lam dong aa
										</li>
									</ul>
									<p class="text-justify">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
									</p>
									<div class="text-right center-xs">
										<div class="d-flex align-items-center justify-flex-end">
											<small class="d-flex align-items-center">CHIA SẺ &nbsp;<img src="/assets/web/images/icon-share.png" width="15"></small> 
											<span style="margin: 0 5px;">&nbsp;</span>
											<a href="">
												<img src="/assets/web/images/icon-fb.png" width="24">
											</a>
											<span style="margin: 0 5px;">&nbsp;</span>
											<a href="">
												<img src="/assets/web/images/icon-twiter.png" width="24">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>


					<div class="col-12 col-md-6">
						<div class="event-video">
							<a data-fancybox href="#!">
								<img src="/assets/web/images/news.png" class="img-responsive">
							</a>
						</div>
					</div>


					<div class="col-12 col-md-6">

						<div class="event-item">
							<div class="row">
								<div class="col-12 col-md-5">
									<p class="event-img">
										<img src="/assets/web/images/news.png">
									</p>
								</div>
								<div class="col-12 col-md-7">
									<hr>
									<h3>
										<a href="#!" class="c_222">
											<strong>
												Neque Porro Quisquam
											</strong>
										</a>
									</h3>
									<ul class="list-inline">
										<li class="list-inline-item">
											<img src="/assets/web/images/event-icon-1.png" height="20"> 2021-05-05
										</li>
										<li class="list-inline-item">
											<img src="/assets/web/images/event-icon-2.png" height="20"> Bao Loc lam dong aa
										</li>
									</ul>
									<p class="text-justify">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
									</p>
									<div class="text-right center-xs">
										<div class="d-flex align-items-center justify-flex-end">
											<small class="d-flex align-items-center">CHIA SẺ &nbsp;<img src="/assets/web/images/icon-share.png" width="15"></small> 
											<span style="margin: 0 5px;">&nbsp;</span>
											<a href="">
												<img src="/assets/web/images/icon-fb.png" width="24">
											</a>
											<span style="margin: 0 5px;">&nbsp;</span>
											<a href="">
												<img src="/assets/web/images/icon-twiter.png" width="24">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>



					<div class="col-12 col-md-6">

						<div class="event-item">
							<div class="row">
								<div class="col-12 col-md-5">
									<p class="event-img">
										<img src="/assets/web/images/news.png">
									</p>
								</div>
								<div class="col-12 col-md-7">
									<hr>
									<h3>
										<a href="#!" class="c_222">
											<strong>
												Neque Porro Quisquam
											</strong>
										</a>
									</h3>
									<ul class="list-inline">
										<li class="list-inline-item">
											<img src="/assets/web/images/event-icon-1.png" height="20"> 2021-05-05
										</li>
										<li class="list-inline-item">
											<img src="/assets/web/images/event-icon-2.png" height="20"> Bao Loc lam dong aa
										</li>
									</ul>
									<p class="text-justify">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
									</p>
									<div class="text-right center-xs">
										<div class="d-flex align-items-center justify-flex-end">
											<small class="d-flex align-items-center">CHIA SẺ &nbsp;<img src="/assets/web/images/icon-share.png" width="15"></small> 
											<span style="margin: 0 5px;">&nbsp;</span>
											<a href="">
												<img src="/assets/web/images/icon-fb.png" width="24">
											</a>
											<span style="margin: 0 5px;">&nbsp;</span>
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
		</div>
	</div>
</section>

<section class="about-banner-box">
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
</section>

<section class="container-fluid">
	<div class="row">
		<div class="col-6 col-md-4 no-padding">
			<div class="gallery-item">
				<a href="#!">
					<img src="/assets/web/images/gallery.png" class="img-responsive">
					<div class="gallery-box">
						<div class="text-center">
							<p>
								EVENT SỰ KIỆN 1
							</p>
							<hr>
							<img src="/assets/web/images/icon-plug.png" width="25">
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-6 col-md-4 no-padding">
			<div class="gallery-item">
				<a href="#!">
					<img src="/assets/web/images/gallery.png" class="img-responsive">
					<div class="gallery-box">
						<div class="text-center">
							<p>
								EVENT SỰ KIỆN 1
							</p>
							<hr>
							<img src="/assets/web/images/icon-plug.png" width="25">
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-6 col-md-4 no-padding">
			<div class="gallery-item">
				<a href="#!">
					<img src="/assets/web/images/gallery.png" class="img-responsive">
					<div class="gallery-box">
						<div class="text-center">
							<p>
								EVENT SỰ KIỆN 1
							</p>
							<hr>
							<img src="/assets/web/images/icon-plug.png" width="25">
						</div>
					</div>
				</a>
			</div>
		</div>


		<div class="clearfix"></div>
		
		<div class="col-6 col-md-4 no-padding">
			<div class="gallery-item">
				<a href="#!">
					<img src="/assets/web/images/gallery.png" class="img-responsive">
					<div class="gallery-box">
						<div class="text-center">
							<p>
								EVENT SỰ KIỆN 1
							</p>
							<hr>
							<img src="/assets/web/images/icon-plug.png" width="25">
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-6 col-md-4 no-padding">
			<div class="gallery-item">
				<a href="#!">
					<img src="/assets/web/images/gallery.png" class="img-responsive">
					<div class="gallery-box">
						<div class="text-center">
							<p>
								EVENT SỰ KIỆN 1
							</p>
							<hr>
							<img src="/assets/web/images/icon-plug.png" width="25">
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-6 col-md-4 no-padding">
			<div class="gallery-item">
				<a href="#!">
					<img src="/assets/web/images/gallery.png" class="img-responsive">
					<div class="gallery-box">
						<div class="text-center">
							<p>
								EVENT SỰ KIỆN 1
							</p>
							<hr>
							<img src="/assets/web/images/icon-plug.png" width="25">
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="clearfix"></div>
	</div>
</section>

@endsection
@section('css')

@endsection
@section('js')

@endsection