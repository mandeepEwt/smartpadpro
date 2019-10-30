jQuery(document).ready(function($)
{
	$('[name=plan_radio]').change(function()
	{
		$('[name=plan]').val($(this).val()).change();
	});
});