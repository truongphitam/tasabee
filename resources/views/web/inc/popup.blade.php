<div class="modal fade" id="login-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center">Đăng Nhập</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<form>
					<div class="form-group">
						<input type="text" id="username" name="username" class="form-control" placeholder="Tên đăng nhập">
					</div>
					<div class="form-group">
						<input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu">
					</div>
					<div class="form-group d-flex justify-content-center">
						<a class="c_222" data-dismiss="modal" data-toggle="modal" href="#password-modal">Quên mật khẩu</a>
						<span>&nbsp; - &nbsp;</span>
						<a class="c_222" data-dismiss="modal" data-toggle="modal" href="#register-modal">Đăng ký</a>
					</div>
					<div class="form-group text-center">
						<button type="button" class="btn btn-style-1">
							Đăng nhập
						</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="register-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center">Đăng ký</h4>
				<button type="button" class="close" data-dismiss="modal" data-toggle="modal" href="#login-modal">&times;</button>
			</div>

			<div class="modal-body">
				<form>
					<div class="form-group">
						<input type="text" id="username" name="username" class="form-control" placeholder="Tên đăng nhập">
					</div>
					<div class="form-group">
						<input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu">
					</div>
					<div class="form-group">
						<input type="password" id="re-password" name="re-password" class="form-control" placeholder="Nhập lại mật khẩu">
					</div>
					<div class="form-group">
						<input type="text" id="name" name="name" class="form-control" placeholder="Họ và Tên">
					</div>
					<div class="form-group">
						<input type="email" id="email" name="email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group text-center">
						<button type="button" class="btn btn-style-1">
							Đăng ký
						</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="password-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center">Quên mật khẩu</h4>
				<button type="button" class="close" data-dismiss="modal" data-dismiss="modal" data-toggle="modal" href="#login-modal">&times;</button>
			</div>

			<div class="modal-body">
				<form>
					<div class="form-group">
						<input type="email" id="email" name="email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group text-center">
						<button type="button" class="btn btn-style-1">
							Quên mật khẩu
						</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<!--Product Detail Modal-->
<div class="modal fade" id="product-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center">Liên hệ</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<form id="frm-product">
					<div class="form-group">
						<input type="text" id="name" name="name" class="form-control" placeholder="Họ và Tên">
					</div>
					<div class="form-group">
						<input type="email" id="email" name="email" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="tel" id="tel" name="tel" class="form-control" placeholder="Số điện thoại">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="3" placeholder="Note"></textarea>
					</div>
					<div class="form-group text-center">
						<button type="button" class="btn btn-style-1">
							Gửi
						</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>