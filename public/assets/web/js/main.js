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