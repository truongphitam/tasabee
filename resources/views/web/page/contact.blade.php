@extends('web.master')
@section('content') 

<section class="bg-top clearfix">
	<img src="/assets/web/images/bg-contact.jpg">
	<div class="container">
		<div class="top-cat-name">
			<b>
				CONTACT
			</b>
		</div>
	</div>
</section>

<section class="bg-contact">
	<img src="/assets/web/images/contact-bee-left.png" class="contact-bee-left hidden-xs">
	<img src="/assets/web/images/contact-bee.png" class="contact-bee-right hidden-xs">
	<div class="padding-50">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<div class="show-room">
						<p class="text-center">
							<img src="/assets/web/images/icon-map.png">
							<br/>
							<strong class="showroom-name">
								Showrom 1:
							</strong>
						</p>
						<p class="text-center">
							Đường 1/5, Tp.Bảo Lộc, Lâm Đồng
							<br/>
							<strong>Hotline:</strong> 0981.477.642
						</p>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="show-room">
						<p class="text-center">
							<img src="/assets/web/images/icon-map.png">
							<br/>
							<strong class="showroom-name">
								Showrom 2:
							</strong>
						</p>
						<p class="text-center">
							30B Trần Bình Trọng, Tp. Nha Trang
							<br/>
							<strong>Hotline:</strong> 0905.391.333
						</p>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="show-room">
						<p class="text-center">
							<img src="/assets/web/images/icon-map.png">
							<br/>
							<strong class="showroom-name">
								Showrom 3:
							</strong>
						</p>
						<p class="text-center">
							153G Lũy Bán Bích, Tân Thới Hòa, Tân Phú, Tp.HCM
							<br/>
							<strong>Hotline:</strong> 0981.470917.778.96
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.08290490825!2d109.18608421481453!3d12.242665691337065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170677e1f602beb%3A0xcad3ce8e6cded300!2zMzAgVHLhuqduIELDrG5oIFRy4buNbmcsIFBoxrDhu5tjIFRp4bq_biwgVGjDoG5oIHBo4buRIE5oYSBUcmFuZywgS2jDoW5oIEjDsmEgNjUwMDAw!5e0!3m2!1sen!2s!4v1622109766022!5m2!1sen!2s" style="border:0;width: 100%;height: 45vh;outline: 0;box-shadow: none;display: block;" allowfullscreen="" loading="lazy"></iframe>

	<section class="frmContact padding-50">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 offset-md-3">
					<div class="frm-contact">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<input type="text" name="" class="form-control" placeholder="Tên">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<input type="text" name="" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class="col-12 col-md-12">
								<div class="form-group">
									<textarea class="form-control" rows="5" placeholder="Nội dung"></textarea>
								</div>
							</div>
						</div>
						<div class="text-center">
							<button class="btn btn-style-1" href="#!">
								Gửi
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</section>
@endsection
@section('css')

@endsection
@section('js')

@endsection