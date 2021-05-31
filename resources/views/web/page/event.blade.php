@extends('web.master')
@section('meta_title', $page && $page->meta_title ? $page->meta_title : $settings->meta_title)
@section('meta_description', $page && $page->meta_description ? $page->meta_description : $settings->meta_description)
@section('image', $page && $page->image ? $page->image : $settings->image)
@section('content') 

<section class="bg-top clearfix">
	<img src="/assets/web/images/bg-blog.jpg">
	<div class="container">
		<div class="top-cat-name">
			<b>
				{{ trans('web.menu.event') }}
			</b>
		</div>
	</div>
</section>

<section class="blog-box padding-50">
	<img src="/assets/web/images/blog-bee-left.png" class="hidden-xs blog-bee-left">
	<img src="/assets/web/images/blog-bee-right.png" class="hidden-xs blog-bee-right">

	<div class="container">
		<div class="blog-search-frm">
			<form method="get">
				<input type="text" class="form-control" placeholder="{{ trans('web.field.search') }}" name="keyword" required value="{{ $keyword }}">
				<button>
					<img src="/assets/web/images/icon-search.png">
				</button>
			</form>
		</div>
		<div class="row">
			@if ($posts)
				@foreach ($posts as $post)
					<div class="col-12 col-md-4">
						<div class="blog-item">
							<a href="{!! route('detailBlog', $post->slug) !!}" title="{{ $post->title }}">
								<p class="blog-img">
									<img src="{!! $post->image !!}" class="img-responsive" alt="{!! $post->title !!}">
								</p>
								<div class="blog-name">
									<b>
										{!! $post->title !!}
									</b>
								</div>
								<p class="blog-date">
									{!! $post->created_at !!}
								</p>
								<p class="blog-description">
									{!! $post->expert !!}
								</p>
							</a>
							<div class="text-center">
								<a href="{!! route('detailBlog', $post->slug) !!}" class="btn btn-style-1" title="{{ $post->title }}">
									Chi tiết
								</a>
							</div>
						</div>
					</div> 	
				@endforeach
			@endif
		</div>
		@if($posts->items() && !empty($posts->items()))
			<nav class="text-center pagination-new">
				<ul class="pagination justify-content-center">
					@if ($posts->currentPage() > 1)
						<li class="page-item">
							<a class="page-link" href="{!! url()->current() !!}?page={!! $posts->currentPage() - 1 !!}" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
					@endif
					@for( $i=1;$i <= $posts->lastPage(); $i++)
						<li class="page-item {{ $i == $posts->currentPage() ? 'active' : '' }}">
							<a class="page-link" href="{!! url()->current() !!}?page={!! $i !!}">{!! $i !!}</a>
						</li> 
					@endfor
					@if ($posts->currentPage() < $posts->lastPage())
						<li class="page-item">
							<a class="page-link" href="{!! url()->current() !!}?page={!! $posts->currentPage() + 1 !!}" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					@endif
				</ul>
			</nav>
		@endif

	</div>
</section>

@endsection
@section('css')

@endsection
@section('js')

@endsection