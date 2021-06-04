@extends('web.master')
@section('meta_title', $page && $page->meta_title ? $page->meta_title : $settings->meta_title)
@section('meta_description', $page && $page->meta_description ? $page->meta_description : $settings->meta_description)
@section('image', $page && $page->image ? $page->image : $settings->image)
@section('content')

@include('web.inc.sliders')

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
					@if($posts_top)
						@foreach ($posts_top as $post)
							@if($post->youtube_link && !empty($post->youtube_link))
								<div class="col-12 col-md-6">
									<div class="event-video">
										<a data-fancybox href="{{ $post->youtube_link }}">
											<img src="{{ $post->image }}" class="img-responsive">
										</a>
									</div>
								</div>
							@else
								<div class="col-12 col-md-6">
									<div class="event-item">
										<div class="row">
											<div class="col-12 col-md-5">
												<p class="event-img">
													<img src="{{ $post->image }}" alt="{{ $post->title }}">
												</p>
											</div>
											<div class="col-12 col-md-7">
												<hr>
												<h3>
													<a href="{{ route('detailEvent', $post->slug) }}" title="{{ $post->title }}" class="c_222">
														<strong>
															{{ $post->title }}
														</strong>
													</a>
												</h3>
												<ul class="list-inline">
													<li class="list-inline-item">
														<img src="/assets/web/images/event-icon-1.png" height="20"> {{ $post->created_at }}
													</li>
													<li class="list-inline-item">
														<img src="/assets/web/images/event-icon-2.png" height="20"> {{ $post->address }}
													</li>
												</ul>
												<p class="text-justify">
													{!! $post->expert !!}
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
							@endif		
						@endforeach
					@endif 
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
		@if ($posts_bottom)
			@foreach($posts_bottom as $bottom)
				<div class="col-6 col-md-4 no-padding">
					<div class="gallery-item">
						<a href="{{ route('detailEvent', $bottom->slug) }}" title="{{ $bottom->title }}">
							<img src="{{ $bottom->image }}" class="img-responsive" alt="{{ $bottom->title }}">
							<div class="gallery-box">
								<div class="text-center">
									<p>
										{{ $bottom->title }}
									</p>
									<hr>
									<img src="/assets/web/images/icon-plug.png" width="25">
								</div>
							</div>
						</a>
					</div>
				</div> 
			@endforeach
		@endif

		<div class="clearfix"></div>
	</div>
</section>

@endsection
@section('css')

@endsection
@section('js')

@endsection