jQuery(document).ready(function($)
{

	var Tutorials =
	{
		el: {
			modal: $('#tutorials-modal'),
			wrapper: $('.tutorials')
		},

		initialize: function()
		{
			this.events();
		},

		events: function()
		{
			var _this = this;
			this.el.wrapper.find('.image-wrapper').click(function()
			{
				_this.updateModalContent($(this));
			});

			this.el.modal.on('hidden.bs.modal', function() 
			{
				var modal = _this.el.modal;
				modal.find('iframe').attr('src', '');
			});
		},

		updateModalContent: function(el)
		{
			var title = el.attr('data-title');
			var link  = el.attr('data-link');
			var modal = this.el.modal;

			modal.find('.modal-title').html(title);
			modal.find('iframe').attr('src', link);
			// modal.find('iframe').reload();
			modal.modal('show');
		}
	};

	Tutorials.initialize();

});