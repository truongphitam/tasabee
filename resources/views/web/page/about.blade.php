@extends('web.master')
@section('meta_title', $page && $page->meta_title ? $page->meta_title : $settings->meta_title)
@section('meta_description', $page && $page->meta_description ? $page->meta_description : $settings->meta_description)
@section('image', $page && $page->image ? $page->image : $settings->image)
@section('content')

@include('web.inc.sliders')

<section id="about" class="clearfix padding-50">
	<img src="/assets/web/images/product-bee-right.png" class="hidden-xs pr-bee-left">
	<img src="/assets/web/images/icon-bee.png" class="hidden-xs pr-bee-right" style="max-width: 50px">
	<div class="container">
		<div class="about-section-1">
			<div class="row">
				<div class="col-12 col-md-6">
					<hr/>
					<p>
						{!! trans('web.field.story_about') !!}
					</p>
					<h2>
						<b>
							{!! $page->expert !!}
						</b>
					</h2>
				</div>
				<div class="col-12 col-md-6">
					<div class="text-justify">
						{!! $page->description !!}
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