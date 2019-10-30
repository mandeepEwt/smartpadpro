jQuery(document).ready(function($)
{
	var Features = 
	{
		initialize: function()
		{
			this.events();

			this.toggleIconState($('.feature-icon').eq(0), true);
			$('.feature-icon').eq(0).addClass('active');
			this.setValues($('.feature-icon').eq(0));
		},

		events: function()
		{
			var _this = this;

			$('.feature-icon').click(function()
			{
				var currentIcon = $(this);

				$.each($('.feature-icon'), function()
				{
					currentIcon.find('.feature-icon-title').text() != $(this).find('.feature-icon-title').text() 
						? _this.toggleIconState($(this), false) : '';
				})

				currentIcon.addClass('active');
				_this.setValues(currentIcon);
			});

			$('.feature-icon').mouseenter(function()
			{
				!$(this).hasClass('active') ? _this.toggleIconState($(this), true) : '';
			});

			$('.feature-icon').mouseleave(function()
			{
				!$(this).hasClass('active') ? _this.toggleIconState($(this), false) : '';
			});

			$('.feature-previous').click(function()
			{
				var index = $('.feature-icon.active').index();
				index = index != 0 ? (index - 1) : ($('.feature-icon').length - 1);

				var icon = $('.feature-icon').eq(index);
				icon.click();
				 _this.toggleIconState(icon, true)
			});

			$('.feature-next').click(function()
			{
				var index = $('.feature-icon.active').index();
				index = index != $('.feature-icon').length - 1 ? (index + 1) : 0;

				var icon = $('.feature-icon').eq(index);
				icon.click();
				 _this.toggleIconState(icon, true)
			});

			$('.feature-dropdown .dropdown-item').click(function()
			{
				$('.feature-icon-image').attr('src', $(this).find('img').attr('src'));
				
				_this.setValues($(this));
			});
		},

		/**
		 * Toggle Icon States
		 * 
		 * @param  element
		 * @param  active
		 */
		toggleIconState: function(element, active)
		{
			element.removeClass(!active ? 'active' : '');

			// Fix Background States
			var background = element.find('.feature-icon-image').css('background-image');
			background = active && !background.match('hover') ? background.replace('.png', '-hover.png') : background.replace('-hover', '');
			background = background.match('webkit-cross-fade') ? background.match(/url\(".+?(\))/)[0] : background;

			element.find('.feature-icon-image').css({
				backgroundImage: background,
			});

			element.find('.feature-icon-title').css({
				fontWeight: active ? 'bold' : 'normal'
			});
		},

		setValues: function(element)
		{
			$('.feature-image, .feature-title, .feature-text').css({ opacity: 0 });

			$('.feature-image').find('img').attr('src', element.find('.feature-image-value').text());
			$('.feature-title').html(element.find('.feature-title-value').html());
			$('.feature-text').html(element.find('.feature-content-value').html());
			$('.feature-icon-image').attr('src', element.find('.feature-icon-value').html());
			
			$('.feature-image, .feature-title, .feature-text').animate({ opacity: 1 }, 500);
		}
	};

	Features.initialize();
});