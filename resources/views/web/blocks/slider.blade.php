@if($slider)
<section id="slider" class="hidden-xs">
	<div id="slider-home">
		@foreach ($slider as $item)
			<div class="slider-items">
				<img src="{!! $item->image !!}" class="img-responsive" alt="{!! $item->title !!}"/>
			</div> 
		@endforeach
	</div>
</section>
<section id="slider" class="visible-xs">
	<div id="slider-home-mobile">
		@foreach ($slider_mobile as $item)
			<div class="slider-items">
				<img src="{!! $item->image !!}" class="img-responsive" alt="{!! $item->title !!}"/>
			</div> 
		@endforeach
	</div>
</section>
@endif