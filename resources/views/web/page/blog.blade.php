@extends('web.master')
@section('content') 

<section class="bg-top clearfix">
	<img src="/assets/web/images/bg-blog.jpg">
	<div class="container">
		<div class="top-cat-name">
			<b>
				BLOG
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
				<input type="text" class="form-control" placeholder="Tìm kiếm">
				<button>
					<img src="/assets/web/images/icon-search.png">
				</button>
			</form>
		</div>
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="blog-item">
					<a href="/blog/1">
						<p class="blog-img">
							<img src="/assets/web/images/product.jpg" class="img-responsive">
						</p>
						<div class="blog-name">
							<b>
								Neque Porro Quisquam
							</b>
						</div>
						<p class="blog-date">
							11/12/1222
						</p>
						<p class="blog-description">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</a>
					<div class="text-center">
						<a href="#!" class="btn btn-style-1">
							Chi tiết
						</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="blog-item">
					<a href="/blog/1">
						<p class="blog-img">
							<img src="/assets/web/images/product.jpg" class="img-responsive">
						</p>
						<div class="blog-name">
							<b>
								Neque Porro Quisquam
							</b>
						</div>
						<p class="blog-date">
							11/12/1222
						</p>
						<p class="blog-description">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</a>
					<div class="text-center">
						<a href="#!" class="btn btn-style-1">
							Chi tiết
						</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="blog-item">
					<a href="/blog/1">
						<p class="blog-img">
							<img src="/assets/web/images/product.jpg" class="img-responsive">
						</p>
						<div class="blog-name">
							<b>
								Neque Porro Quisquam
							</b>
						</div>
						<p class="blog-date">
							11/12/1222
						</p>
						<p class="blog-description">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</a>
					<div class="text-center">
						<a href="#!" class="btn btn-style-1">
							Chi tiết
						</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-12 col-md-4">
				<div class="blog-item">
					<a href="/blog/1">
						<p class="blog-img">
							<img src="/assets/web/images/product.jpg" class="img-responsive">
						</p>
						<div class="blog-name">
							<b>
								Neque Porro Quisquam
							</b>
						</div>
						<p class="blog-date">
							11/12/1222
						</p>
						<p class="blog-description">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</a>
					<div class="text-center">
						<a href="#!" class="btn btn-style-1">
							Chi tiết
						</a>
					</div>
				</div>
			</div>
			

		</div>


		<nav class="text-center pagination-new">
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>

				<li class="page-item active">
					<a class="page-link" href="#">1</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">2</a>
				</li>


				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>


	</div>
</section>

@endsection
@section('css')

@endsection
@section('js')

@endsection