jQuery(document).ready(function($)
{

	var Pricing = 
	{
		initialize: function()
		{
			this.events();
			this.fixSingleStorePlanHeights();
			this.fixMultiStorePlanMarginsAndHeights();
		},

		events: function()
		{
			var _this = this;

			$(window).resize(function()
			{
				_this.fixSingleStorePlanHeights();
				_this.fixMultiStorePlanMarginsAndHeights();
			});
		},

		fixSingleStorePlanHeights: function()
		{
			
			var height = 0;

			$('.single-store-plan-box').height('auto');
			$.each($('.single-store-plan-box'), function()
			{
				height = height < $(this).height() ? $(this).height() : height;
			});

			$('.single-store-plan-box').height(height);
		},

		fixMultiStorePlanMarginsAndHeights: function()
		{
			/*var elements = [];

			$('.multi-store-plan-box').height('auto');
			$.each($('.multi-store-plan-box'), function()
			{
				elements.push({ el: $(this), height: $(this).height() });
			});

			elements = _.orderBy(elements, 'height', 'asc');
			elements[0].el.height(elements[1].height);

			var marginTop = $(window).width() > 767 ? (elements[2].el.height() / 2) - (elements[0].el.height() / 2) : 0;
			elements[0].el.css({ marginTop: marginTop });
			elements[1].el.css({ marginTop: marginTop });*/
		}
	};

	Pricing.initialize();
	
		
});
	

	