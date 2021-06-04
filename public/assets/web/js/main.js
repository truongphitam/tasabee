var $ = jQuery.noConflict();

function gotop() {
	$("html, body").animate({ scrollTop: 0 }, "slow");
}

$(function() {
	var siteSticky = function() {
		$(".js-sticky-header").sticky({topSpacing:0});
	};
	siteSticky();

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {
			
			var counter = 0;
			$('.site-mobile-menu .has-children').each(function(){
				var $this = $(this);
				
				$this.prepend('<span class="arrow-collapse collapsed">');

				$this.find('.arrow-collapse').attr({
					'data-toggle' : 'collapse',
					'data-target' : '#collapseItem' + counter,
				});

				$this.find('> ul').attr({
					'class' : 'collapse',
					'id' : 'collapseItem' + counter,
				});

				counter++;

			});

		}, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
			var $this = $(this);
			if ( $this.closest('li').find('.collapse').hasClass('show') ) {
				$this.removeClass('active');
			} else {
				$this.addClass('active');
			}
			e.preventDefault();  
			
		});

		$(window).resize(function() {
			var $this = $(this),
			w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		$(document).mouseup(function(e) {
			var container = $(".site-mobile-menu");
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		});
	}; 
	//
	siteMenuClone();
	//
	$('#home-slider').slick({
		dots: false,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear'
	});
	//
	$('.home-silder-product').slick({
		dots: false,
		infinite: true,
		speed: 500,
		slidesToShow: 4,
		responsive: [
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		}
		]
	});
	//
	$('.product-main-slider').slick({
		dots: false,
		arrows: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		asNavFor: '.product-vertical-slider',
	});
	$('.product-vertical-slider').slick({
		dots: false,
		vertical: true,
		verticalSwiping: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.product-main-slider',
		autoplay: true,
		autoplaySpeed: 2000,
	});
	//
	$('.home-silder-product').slick({
		dots: false,
		infinite: true,
		speed: 500,
		slidesToShow: 4,
		responsive: [
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		}
		]
	});
});


function login(){
	$("#error_user_name").addClass('hidden');
	$("#error_password").addClass('hidden');
	//
	var username = $("#username").val();
	var password = $("#password").val();
	var _token = $('meta[name="csrf-token"]').attr('content');
    var formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });
    $.ajax({
        url: baseURL + "/post-login",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
			alert(data.message);
			if(data.success){
				window.location.href = baseURL;
			}else{
				if(data.error_user_name){
					$("#error_user_name").removeClass('hidden');
				}
				if(data.error_password){
					$("#error_password").removeClass('hidden');
				}
			}
        },
        error: function (xhr, textStatus, errorThrown) {
        }
    });
}

var _time_off_loading = 1000;
function comment(elm){
	var name = $("#comment_name").val();
	var email = $("#comment_email").val();
	var content = $("#comment_content").val();
	if(!name.trim()){
		alert('Vui lòng nhập Họ Tên!');
		$("#comment_name").focus();
		return false;
	}
	if(!content.trim()){
		alert('Vui lòng nhập nội dung!');
		$("#comment_content").focus();
		return false;
	}
	if(!email.trim()){
		alert('Vui lòng nhập Email!');
		$("#comment_email").focus();
		return false;
	}
	$(elm).addClass('hidden');
	$("#loader-t2").show();
    var formData = new FormData();
    formData.append("type", $("#comment_type").val());
	formData.append("users_id", $("#comment_users_id").val());
	formData.append("post_id", $("#comment_post_id").val());
    formData.append("name", name);
	formData.append("email", email);
	formData.append("content", content);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: baseURL + "/comment",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
			$("#loader-t2").hide();
			alert(data.message);
			if(data.success){
				setTimeout(function () {
					$(elm).removeClass('remove');
					$(data._html).insertBefore("#list_comment");
				}, _time_off_loading);
			}else{
				return true;
			}
        },
        error: function (xhr, textStatus, errorThrown) {
			$(elm).removeClass('remove');
			$("#loader-t2").hide();
        }
    });
}

var _size = '';
var _title_products = '';
var _id_products = '';
function setSize(size){
	if($("#size_" + size).length){
		_size = size;
		$(".size-products-detail").removeClass('active');
		$("#size_" + size).addClass('active');
	}
}

function showModalContactProducts(){
	if(!_size){
		alert('Vui lòng chọn size');
		return false;
	}
	_title_products = $("#title_products").val();
	_id_products = $("#id_products").val();
	$("#title_product_modal").html(_title_products);
	$("#product-modal").modal("show");
}

function submitFormModal(type){
	var name = $("#"+type+"_detail_name").val();
	var email = $("#"+type+"_detail_email").val();
	var phone = $("#"+type+"_detail_phone").length ? $("#"+type+"_detail_phone").val() : '';
	var note = $("#"+type+"_detail_note").val();
	if(!name.trim()){
		alert('Vui lòng nhập Họ Tên!');
		$("#products_detail_name").focus();
		return false;
	}
	if(!email.trim()){
		alert('Vui lòng nhập Email!');
		$("#products_detail_email").focus();
		return false;
	}
	if(type == 'product'){
		if(!phone.trim()){
			alert('Vui lòng nhập số điện thoại!');
			$("#products_detail_phone").focus();
			return false;
		} 
	}
	$("#loader-t").show();
    var formData = new FormData();
    formData.append("type", type);
	formData.append("products_id", $("#id_products").length ? $("#id_products").val() : 0);
	formData.append("customer_id", $("#customer_login_id").val());
	formData.append("name", name);
    formData.append("email", email);
	formData.append("phone", phone);
	formData.append("note", note);
	formData.append("size", _size);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: baseURL + "/submit-form-modal",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
			setTimeout(function () {
				alert(data.message);
				$("#loader-t").hide();
			}, _time_off_loading);
        },
        error: function (xhr, textStatus, errorThrown) {
			$("#loader-t").hide();
        }
    });
}

$(".share-popup").click(function(){
    var window_size = "width=585,height=511";
    var url = this.href;
    var domain = url.split("/")[2];
    switch(domain) {
        case "www.facebook.com":
            window_size = "width=585,height=368";
            break;
        case "www.twitter.com":
            window_size = "width=585,height=261";
            break;
        case "plus.google.com":
            window_size = "width=517,height=511";
            break;
    }
    window.open(url, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' + window_size);
    return false;
});