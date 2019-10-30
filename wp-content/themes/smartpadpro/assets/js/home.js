jQuery(document).ready(function($)
{

    var Home = {

    	features: {
    		data: [],
    		page: 0,
    		interval: false,
    		intervalValue: 7000,
    	},

    	initialize: function()
    	{
    		this.featureIcons();
    		this.testimonials();
    		this.getFeatures();
    	},

    	featureIcons: function()
    	{
    		$('.feature-icons').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				nav: false,
				smartSpeed: 500,
				responsive: {
					0: {
						items: 1,
						loop: false,
						margin: 10,
						nav: false,
						dots: false
					},
					1000: {
						items: 1,
						loop: false,
						margin: 10,
						nav: false,
						dots: false
					}
				}
			});
    	},

    	testimonials: function()
    	{
    		$('.testimonials').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				nav: false,
				smartSpeed: 500,
				responsive: {
					0: {
						items: 1,
						nav: false,
					},
					1000: {
						items: 2,
						loop: false,
						margin: 80,
						nav: false,
					}
				}
			});
    	},

    	getFeatures: function()
    	{
    		$.ajax({
		        url: ajaxurl,
		        type: 'GET',
		        dataType: 'json',
		        data: {
		            action: 'features'
		        },
		        success: function(data) 
		        {
		            this.features.data = data;
		            this.generateFeatureNavigation();
		            this.setFeature();

    				this.refreshFeatureInterval();
		        }.bind(this),
		    });
    	},

    	generateFeatureNavigation: function()
    	{
    		var html = '';

    		_.forEach(this.features.data, function()
    		{
    			html += '<div class="dot mright-10"></div>';
    		});

    		$('.feature-home-dots').html(html);

    		var _this = this;
    		$('.feature-home-dots').find('.dot').click(function()
    		{
    			_this.features.page = $(this).index();
    			_this.setFeature();
    			_this.refreshFeatureInterval();
    		});
    	},

    	refreshFeatureInterval: function()
    	{
    		clearInterval(this.features.interval);

    		this.features.interval = setInterval(function()
    		{
				this.features.page++;
    			if(this.features.page == this.features.data.length)
    			{
    				this.features.page = 0;
    			}
    			
    			this.setFeature();
    		}.bind(this), this.features.intervalValue);
    	},

    	setFeature: function()
    	{
    		var feature = this.features.data[this.features.page];

    		$('.feature-home-fade').css({ opacity: 0 });

    		$('.feature-home-title').html(feature.title);
    		$('.feature-home-content').html(feature.content);
    		$('.feature-home-image').attr('src', feature.image);

    		$('.feature-home-fade').animate({ opacity: 1 }, 1000);

    		$('.feature-home-dots').find('.dot').removeClass('active');
    		$('.feature-home-dots').find('.dot').eq(this.features.page).addClass('active');
    	},

    };

    Home.initialize();
});