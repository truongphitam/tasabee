@extends('web.master')
@section('meta_title', $data->meta_title ? $data->meta_title : $settings->meta_title)
@section('meta_description', $data->meta_description ? $data->meta_description : $settings->meta_description)
@section('meta_keywords', $data->meta_keywords ? $data->meta_keywords : $settings->meta_keywords)
@section('image', $data->image ? $data->image : $settings->image)
@section('content')
<section id="product-banner" class="clearfix">
	<img src="/assets/web/images/product-banner.jpg">
	<div class="container">
		<div class="product-cat-name">
			<b>
				{{ trans('web.menu.products') }}
			</b>
			<ul class="list-inline text-center">
				<li class="list-inline-item">
					<a href="">
						{{ trans('web.menu.home') }}
					</a>
				</li>
				/
				<li>
					<a href="">
						{{ trans('web.menu.products') }}
					</a>
				</li>
				/
				<li>
					<a href="{{ route('detailProducts', $data->slug) }}" title="{!! $data->title !!}">
						{{ $data->title }}
					</a>
				</li>
			</ul>
		</div>
	</div>
</section>

<section id="product-detail" class="clearfix padding-50">

	<div class="container">
		<div class="product-detail-box">
			<div class="row">
				<div class="col-md-8">
					<div class="product-detail-left">
						<div class="row">
							<div class="col-3 no-padding-right">
								<div class="product-vertical-slider">
									@if ($data->gallery && !$data->gallery->isEmpty())
										@foreach ($data->gallery as $gallery)
											<div>
												<div class="product-vertical-slide">
													<img src="{!! $gallery->image !!}" class="img-responsive" alt="{!! $data->title !!}">
												</div>
											</div>
										@endforeach
									@else
										<div>
											<div class="product-vertical-slide">
												<img src="{!! $data->image !!}" class="img-responsive" alt="{!! $data->title !!}">
											</div>
										</div>	
									@endif
								</div>
							</div>
							<div class="col-9">
								<div class="product-main-slider">
									@if ($data->gallery && !$data->gallery->isEmpty())
										@foreach ($data->gallery as $gallery)
											<div>
												<div class="product-vertical-slide">
													<img src="{!! $gallery->image !!}" class="img-responsive" alt="{!! $data->title !!}">
												</div>
											</div>
										@endforeach
									@else
										<div>
											<div class="product-vertical-slide">
												<img src="{!! $data->image !!}" class="img-responsive" alt="{!! $data->title !!}">
											</div>
										</div>	
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="product-detail-right">
						<h1 class="product-detail-title text-uppercase">
							<strong>
								{!! $data->title !!}
							</strong>
						</h1>

						<p class="hidden product-detail-price">
							<strong class="c_d1480b">390.000</strong> vnđ
						</p>

						<div class="product-detail-excerpt">
							{!! $data->expert !!}
						</div>

						<hr class="product-detail-hr" />

						<p class="no-margin"><strong>Size:</strong></p>

						<ul class="product-detail-size list-inline">
							<li id="size_10" onclick="setSize(10)" class="size-products-detail">
								<a href="#!">
									10 gm
								</a>
							</li>
							<li id="size_50" onclick="setSize(50)" class="size-products-detail">
								<a href="#!">
									50 gm
								</a>
							</li>
							<li id="size_100" onclick="setSize(100)" class="size-products-detail">
								<a href="#!">
									100 gm
								</a>
							</li>
							<li id="size_200" onclick="setSize(200)" class="size-products-detail">
								<a href="#!">
									200 gm
								</a>
							</li>
							<li id="size_250" onclick="setSize(250)" class="size-products-detail">
								<a href="#!">
									250 gm
								</a>
							</li>
							<li id="size_300" onclick="setSize(300)" class="size-products-detail">
								<a href="#!">
									300 gm
								</a>
							</li>
						</ul>

						<div class="product-detail-btn">
							<div class="row align-items-center">
								<div class="col-6">
									<a role="button" onclick="showModalContactProducts()" class="btn btn-style-1 btn-100">
										<i>
											{{ trans('web.menu.contact') }}
										</i>
									</a>
								</div>
								<input type="hidden" name="" id="title_products" value="{!! $data->title !!}">
								<input type="hidden" name="" id="id_products" value="{!! $data->id !!}">
								<div class="col-6">
									<div class="d-flex align-items-center justify-content-around">
										<small class="d-flex align-items-center">{{ trans('web.field.share') }} &nbsp<img src="/assets/web/images/icon-share.png" width="15"></small> 
										<a href="http://www.facebook.com/sharer/sharer.php?u={!! url()->current() !!}&t={{ $data->title }}" title="{{ $data->title }}" class="share-popup">
											<img src="/assets/web/images/icon-fb.png" width="24">
										</a>
										<a href="http://www.twitter.com/intent/tweet?url={!! url()->current() !!}&via=TWITTER_HANDLE_HERE&text={{ $data->title }}" title="{{ $data->title }}" class="share-popup">
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


		<div class="product-detail-tab">
			<ul class="nav nav-tabs" id="product-tab-nav" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#tab-1">
						{{ trans('web.field.description') }}
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " data-toggle="tab" href="#tab-2">
						{{ trans('web.field.write_review') }}
					</a>
				</li>
			</ul>
			<div class="tab-content" id="tab-content-product">
				<div class="tab-pane fade show active" id="tab-1">
					<div class="text-justify">
						{!! $data->description !!}
					</div>
				</div>
				<div class="tab-pane fade " id="tab-2">
					<p>
						<strong>{{ trans('web.field.customer_reviews') }}</strong>
					</p>
					<div id="list_comment">
						@if($data->comment)
							@foreach($data->comment as $comment)
								<div class="clearfix">
									<p>
										<strong>{{ $comment->name }}</strong>
										<br />
										<small class="c_363636">
											<i class="fa fa-calendar"></i> {{ $comment->created_at }}
										</small>
									</p>
									{!! $comment->content !!}
								</div> 
							@endforeach
						@endif
					</div>
					<hr class="product-detail-hr">
					<p>
						<strong>
							{{ trans('web.field.leave_a_comment') }}
						</strong>
						<br/>
						{{ trans('web.field.leave_a_comment_content') }}
					</p>
					<div class="row">
						<div class="col-12">
							<div class="frm-cmt-blog">
								<div class="form-group">
									<textarea class="form-control" rows="5" placeholder="{!! trans('web.form.message') !!}" id="comment_content"></textarea>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="{{ trans('web.form.name') }}" value="{{ Auth::check() ? Auth::user()->name : '' }}" @if(Auth::check()) disabled @endif id="comment_name">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="{{ trans('web.form.email') }}" value="{{ Auth::check() ? Auth::user()->email : '' }}"  @if(Auth::check()) disabled @endif id="comment_email">
								</div>
								<div class="center-xs">
									<button class="btn btn-style-1" onclick="comment(this)">{{ trans('web.form.submit') }}</button>
									<div id="loader-t2" class="text-center">
										<i class="fa fa-spinner fa-spin fa-3x"></i>
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

<section id="orther-product" class="padding-50 clearfix">
	<div class="container">
		<h2 class="home-title text-uppercase text-center">
			<b>
				<span class="c_ff7200">{{ trans('web.field.difference_products') }}</span>
			</b>
		</h2>
		<p class="text-center">
			{!! trans('web.field.difference_products_text') !!}
		</p>
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1">
				<div class="padding-25">
					@if($related)
					<div class="home-silder-product">
						@foreach ($related as $item)
							<div>
								<div class="slide-product">
									<a href="{!! route('detailProducts', $item->slug )!!}" title="{!! $item->title !!}">
										<p class="slide-product-img">
											<img src="{!! $item->image !!}" alt="{!! $item->title !!}">
										</p>
										<p class="slide-product-name">
											{!! $item->title !!}
										</p>
										<hr/>
										<p class="slide-product-price">
											<span>{{ trans('web.field.readmore') }}</span>
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
	</div>
</section>
<input type="hidden" id="comment_post_id" value="{{ $data->id }}">
<input type="hidden" id="comment_users_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">
<input type="hidden" id="comment_type" value="products">

@endsection
@section('css')

@endsection
@section('js')

@endsection