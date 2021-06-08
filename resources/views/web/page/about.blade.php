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
							{!! trans('web.field.story_about') !!}
						</strong>
					</p>
					<h2>
						<b>
							{!! $page->expert !!}
						</b>
					</h2>
				</div>
				<div class="col-12 col-md-6">
					<div class="text-justify c_777">
						{!! $page->description !!}
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
								{!! trans('web.about.vision_1_title') !!}
							</strong>
						</p>
						<hr>
					</div>
					<div class="about-content">
						<p class="text-uppercase">
							<strong>
								{!! trans('web.about.vision_1_title') !!}
							</strong>
						</p>
						{!! trans('web.about.vision_1_desciption') !!} 

					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="about-item">
					<img src="/assets/web/images/news.png">
					<div class="about-title">
						<p>
							<strong>
								{!! trans('web.about.vision_2_title') !!}
							</strong>
						</p>
						<hr>
					</div>
					<div class="about-content">
						<p class="text-uppercase">
							<strong>
								{!! trans('web.about.vision_2_title') !!}
							</strong>
						</p>
						{!! trans('web.about.vision_2_desciption') !!}

					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="about-item">
					<img src="/assets/web/images/news.png">
					<div class="about-title">
						<p>
							<strong>
								{!! trans('web.about.vision_3_title') !!}
							</strong>
						</p>
						<hr>
					</div>
					<div class="about-content">
						<p class="text-uppercase">
							<strong>
								{!! trans('web.about.vision_3_title') !!}
							</strong>
						</p>
						{!! trans('web.about.vision_3_desciption') !!}
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
							{!! trans('web.about.commitment') !!} <span class="c_ff7200">{!! trans('web.about.our') !!}</span>
						</b>
					</h2>
					<p class="c_777">
						{!! trans('web.about.commitment_description') !!}
					</p>
					<div id="accordion-about">

						<div class="card">
							<a class="card-link" data-toggle="collapse" href="#collapseOne">
								<div class="card-header">
									<strong>{!! trans('web.about.commitment_1_title') !!}</strong>
								</div>
							</a>
							<div id="collapseOne" class="collapse show" data-parent="#accordion-about">
								<div class="card-body">
									{!! trans('web.about.commitment_1_description') !!}
								</div>
							</div>
						</div>

						<div class="card">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
								<div class="card-header">
									<strong>{!! trans('web.about.commitment_2_title') !!}</strong>
								</div>
							</a>
							<div id="collapseTwo" class="collapse" data-parent="#accordion-about">
								<div class="card-body">
									{!! trans('web.about.commitment_2_description') !!}
								</div>
							</div>
						</div>
						<div class="card">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
								<div class="card-header">
									<strong>{!! trans('web.about.commitment_3_title') !!}</strong>
								</div>
							</a>
							<div id="collapseThree" class="collapse" data-parent="#accordion-about">
								<div class="card-body">
									{!! trans('web.about.commitment_3_description') !!}
								</div>
							</div>
						</div>
						<div class="card">
							<a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
								<div class="card-header">
									<strong>{!! trans('web.about.commitment_4_title') !!}</strong>
								</div>
							</a>
							<div id="collapseFour" class="collapse" data-parent="#accordion-about">
								<div class="card-body">
									{!! trans('web.about.commitment_4_description') !!}
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
				{!! trans('web.about.team')!!} <span class="c_ff7200">{!! trans('web.about.tasabee')!!}</span>
			</b>
		</h2>
		<p class="text-center">
			{!! trans('web.about.team_description')!!}
		</p>


		<div class="padding-25">
			@if($team)
				<div class="home-silder-product about-slider">
					@foreach ($team as $item)
						<div>
							<div class="about-slide">
								<img src="{{ $item->image }}" alt="{{ $item->name }}">
								<div class="about-slide-info">
									<div>
										<p>
											{{ $item->name }}
										</p>
										@if($item->position)
											<p>
												{{ $item->position }}
											</p>
										@endif
										<ul class="list-inline">
											<li class="list-inline-item">
												<a href="{!! $item->facebook !!}" title="{{ $item->name }}">
													<img src="/assets/web/images/icon-fb-about.png">
												</a>
											</li>
											<li class="list-inline-item">
												<a href="{!! $item->google !!}" title="{{ $item->name }}">
													<img src="/assets/web/images/icon-gg-about.png">
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					@endforeach
	
				</div>
			@endif
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