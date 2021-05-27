<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no" />
	<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
	<title>@yield('meta_title')</title>
	<link rel="icon" href="/assets/web/images/icon-bee.png" />
	<link rel="apple-touch-icon" href="/assets/web/images/icon-bee.png" />
	<meta name="msapplication-TileImage" content="/assets/web/images/icon-bee.png" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="Tasabee">
	<meta name="description" content="@yield('meta_description')">
	<meta name="keywords" content="@yield('meta_keywords')">
	<link rel="canonical" href="{!! url()->current() !!}">
	<meta property="og:title" content="@yield('meta_title')">
	<meta property="og:description" content="@yield('meta_description')">
	<meta property="og:image" content="{{ url('/')}}@yield('image')"/>
	<meta property="og:url" content="{!! url()->current() !!}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link href="/assets/web/css/fonts/Nunito-Regular/fonts.css" rel="stylesheet" type="text/css" />
	<link href="/assets/web/css/fonts/Nunito-Bold/fonts.css" rel="stylesheet" type="text/css" />
	<link href="/assets/web/css/style.css" rel="stylesheet" type="text/css" />
	<script>
        var baseURL = '{{url('/')}}';
    </script>
	@yield('css')
</head>
<body>
	
	<header id="header">
		<div class="site-mobile-menu site-navbar-target">
			<div class="site-mobile-menu-body"></div>
		</div>
		<div class="site-navbar-wrap">
			<nav id="nav-header" class="clearfix">
				<div class="container">
					<div class="row">
						<div class="col-4 col-md-9">
							<div class="nav-header-left">
								<ul class="list-inline">
									<li class="list-inline-item">
										0917778968
									</li>
									<li class="list-inline-item hidden-xs">
										info@tasabe.com
									</li>
									<li class="list-inline-item hidden-xs">
										Thôn 13, Xã DamBri, Bảo Lộc, Lâm Đồng
									</li>
								</ul>
							</div>
						</div>
						<div class="col-8 col-md-3">
							<div class="nav-header-right">
								<ul class="list-inline text-right">
									<li class="list-inline-item active">
										<a href="#">
											Eng
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#">
											Vie
										</a>
									</li>
									<li class="list-inline-item">
										@if(Auth::check())
											<a href="{{ route('users-fe.index', Auth::user()->id) }}" title="{{ Auth::user()->name }}">
												{{ Auth::user()->name }}
											</a>
										@else
											<a href="#login-modal" data-toggle="modal">
												Đăng nhập
											</a>
										@endif
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
			<div class="site-navbar site-navbar-target js-sticky-header">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-4 col-md-3">
							<h1 class="my-0 site-logo">
								<a href="{{ route('index') }}">
									<img src="/assets/web/images/logo.png">
								</a>
							</h1>
						</div>
						<div class="col-8 col-md-9">
							<nav class="site-navigation text-right" role="navigation">
								<div class="clearfix">
									<div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"> <a href="#" class="site-menu-toggle js-menu-toggle"> <span class="fa fa-bars fa-2x"></span> </a></div>
									<ul class="site-menu main-menu js-clone-nav d-none d-sm-block d-md-block d-flex justify-content-around">
										<li>
											<a href="{{ route('index') }}" class="nav-link {{ areActiveRoutes(['index']) }}">
												{!! trans('web.menu.home') !!}
											</a>
										</li>
										<li>
											<a href="{{ route('about') }}" class="nav-link {{ areActiveRoutes(['about']) }}">
												{!! trans('web.menu.about') !!}
											</a>
										</li>
										<li>
											<a href="{{ route('products') }}" class="nav-link {{ areActiveRoutes(['products', 'detailProducts']) }}">
												{!! trans('web.menu.products') !!}
											</a>
										</li>
										<li>
											<a href="{{ route('blog') }}" class="nav-link {{ areActiveRoutes(['blog', 'detailBlog']) }}">
												{!! trans('web.menu.news') !!}
											</a>
										</li>
										<li>
											<a href="{{ route('event') }}" class="nav-link {{ areActiveRoutes(['event']) }}">
												{!! trans('web.menu.event') !!}
											</a>
										</li>
										<li>
											<a href="{{ route('contact') }}" class="nav-link {{ areActiveRoutes(['contact']) }}">
												{!! trans('web.menu.contact') !!}
											</a>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--Header-->


	@yield('content')
	<!--Footer-->
	<section id="footer-contact" class="clearfix padding-25">
		<div class="container">
			<p class="text-center">
				<img src="/assets/web/images/icon-bee.png" width="45">
			</p>
			<h2 class="home-title text-uppercase text-center c_ff7200">
				<b>
					<span class="c_222">Liên Hệ Với</span> Chúng Tôi
				</b>
			</h2>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-4 no-padding">
					<p class="footer-contact-img">
						<img src="/assets/web/images/b-pr.jpg">
					</p>
				</div>
				<div class="col-12 col-md-6">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="footer-contact-left">
								<div class="contact-left-item">
									<span>
										Showrom 1:
									</span>
									<br/>
									Đường 1/5, Tp.Bảo Lộc, Lâm Đồng
									<br/>
									<b>Hotline:</b> 0981.477.642
								</div>
								<div class="contact-left-item">
									<span>
										Showrom 2:
									</span>
									<br/>
									30B Trần Bình Trọng, Tp. Nha Trang
									<br/>
									<b>Hotline:</b> 0905.391.333
								</div>
								<div class="contact-left-item">
									<span>
										Showrom 3:
									</span>
									<br/>
									153G Lũy Bán Bích, Tân Thới Hòa,
									Tân Phú, Tp.HCM
									<br/>
									<b>Hotline:</b> 0917.778.96
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="footer-contact-right">
								<p class="text-justify">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
								</p>
								<p>
									<b>
										CÔNG TY TNHH XUẤT NHẬP KHẨU TASABEE
									</b>
								</p>
								<ul class="list-unstyled contact-address">
									<li>
										<span>A</span>	Thôn 13, Xã DamBri, Bảo Lộc, Lâm Đồng
									</li>
									<li>
										<span>T</span>	0917778968
									</li>
									<li>
										<span>E</span>	info@tasabe.com
									</li>
								</ul>
								<ul class="list-inline center-xs contact-links">
									<li class="list-inline-item">
										<a href="#!">
											f
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#!">
											t
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#!">
											g
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer" class="clearfix">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-md-6">
					&copy; 2021 TASABEE. All rights reserved.
				</div>
				<div class="col-12 col-md-6 text-right">
					<a href="#!"><img src="/assets/web/images/icon-scroll.png" width="20"></a>
				</div>
			</div>
		</div>
	</footer>

	@include('web.inc.popup')
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"></script>
	<script type="text/javascript" src="/assets/web/js/main.js"></script>
	@yield('js')
</body>
</html>