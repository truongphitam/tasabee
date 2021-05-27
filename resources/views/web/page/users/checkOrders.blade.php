@extends('web.master')
@section('meta_title',$settings->meta_title)
@section('meta_description',$settings->meta_description)
@section('image',$settings->image)
@section('content')
<section id="product-banner" class="clearfix">
	<img src="/assets/web/images/product-banner.jpg">
	<div class="container">
		<div class="product-cat-name">
			<b>
				sản phẩm
			</b>
		</div>
	</div>
</section>
<section id="product-list" class="clearfix padding-50">
	<img src="/assets/web/images/product-bee.png" class="hidden-xs pr-bee-left">
	<img src="/assets/web/images/product-bee-right.png" class="hidden-xs pr-bee-right">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-3">
				@include('web.page.users.left_menu')
			</div>
			<div class="col-12 col-md-9">
				<div class="row">
					<div class="col-md-12">
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input type="text" name="name" class="form-control" required="" size="2">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" id="email" onkeyup="checkEmail();" required="">
                        </div>
                        <div class="hidden form-group">
                            <label>Họ</label>
                            <input type="text" name="first_name" class="form-control" size="2">
                        </div>
                        <div class="hidden form-group">
                            <label>Tên</label>
                            <input type="text" name="last_name" class="form-control" size="2">
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" size="2">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" size="2">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <textarea class="form-control" name="address" rows="7"></textarea>
                        </div>
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