jQuery(document).ready(function($)
{

	var Site =
	{
		initialize: function()
		{
			this.navWithDropdown();
			$('[name=has_banner]').val() == 1 ? this.stickyNav() : false;
			this.accordion();
			this.banner();
		},

		navWithDropdown: function()
		{
			$('.menu-item-has-children > a').attr('href', 'javascript:void(0)');
		},

		stickyNav: function()
		{
			$(document).scroll(function()
			{
				if($(this).scrollTop() > 100)
				{	$('.sticky-header .navbar').find('.btn').addClass('btn-transparent-blue');
					$('.sticky-header .navbar').find('.btn').css({ 'margin-top': '-7px' });
					$('.sticky-header .navbar').css({ top: 0 });
				}
				else
				{	$('.sticky-header .navbar .btn').addClass('btn-transparent-white');
					$('.sticky-header .navbar .btn').css({'margin-top': '0px' });
					$('.sticky-header .navbar').css({ top: '-400px' });
				}
			});
		},

		accordion: function()
		{
			$('.accordion .card-header').click(function()
			{
				$(this).parents('.accordion').find('.card').removeClass('active');
				$(this).parents('.card').addClass('active');
			});
		},

		banner: function()
		{
			var rotate, timeline;
			rotate = function() {
				// return $('.card:last-child').fadeOut(400, 'swing', function() {
				//   return $('.card:last-child').prependTo('.container').hide();
				// }).fadeIn(400, 'swing');

				return $('.card-container .card:first-child').fadeOut(400, 'linear', function() {
					return $('.card-container .card:first-child').appendTo('.container').hide();
				}).fadeIn(400, 'linear');
			};

			timeline = setInterval(rotate, 3500);

			$('.card-container').mouseenter(function() {
				return clearInterval(timeline);
			});

			$('.card-container').mouseleave(function() {
				timeline = setInterval(rotate, 3500);
			});

			$('.card-container').find('.card').click(function() {
				return rotate();
			});
		}
	}

	Site.initialize();

	MacBookImage = {
		page: 0,
		interval: false,
		totalImages: $('.mac-book-image').length - 1,

		initialize: function()
		{
			var _this = this;

			$(window).resize(function()
			{
				this.fixMacHomeImage();
			}.bind(this));

			this.fixMacHomeImage();

			$('.mac-book-image-pager .fa-circle').eq(0).css('opacity', 1);
			$('.mac-book-image-pager .fa-circle').click(function()
			{
				_this.page = $(this).index();
				_this.navigate();
			});

			this.navigate();
		},

		createInterval: function()
		{
			clearInterval(this.interval);
			this.interval = setInterval(function()
			{
				this.page++;
				this.page = this.page > this.totalImages ? 0 : this.page;
				this.navigate();
			}.bind(this), 5000);

		},

		navigate: function()
		{
			$('.mac-book-image-pager .fa-circle').css('opacity', .5);
			$('.mac-book-image-pager .fa-circle').eq(this.page).css('opacity', 1);

			$('.mac-book-image').fadeOut(500);
			$('.mac-book-image').eq(this.page).fadeIn(500);

			this.createInterval();
		},

		fixMacHomeImage: function()
		{
			var width = window.outerWidth - 10;
			var top, padding;
			var navBottom = '80px';

			if(width > 1199)
			{
				top     = '44px';
				padding = '0 176px';
			}
			else if(width > 991 && width < 1200)
			{
				top        = '37px';
				padding    = '0 150px';
				navBottom  = '70px'
			}
			else if(width > 767 && width < 992)
			{
				top        = '25px';
				padding    = '0 113px';
				navBottom  = '50px'
			}
			else if(width < 768)
			{
				top        = '20px';
				padding    = '0 89px';
				navBottom  = '40px'
			}

			$('.mac-book-image').css({
				top: top,
				padding: padding
			});

			$('.mac-book-image-pager').css({
				bottom: navBottom
			});
		},
	};
	MacBookImage.initialize();
});