<?php 

namespace App\Actions;

/**
 * Class Actions
 * Put all your functions here to be used on templates.
 *
 * @package App\Actions
 */
class Actions 
{

	public function cssUrl($file) 
	{
		return get_site_url().'/wp-content/themes/smartpadpro/assets/styles/css/'.$file;
	}

	public function jsUrl($file) 
	{
		return get_site_url().'/wp-content/themes/smartpadpro/assets/js/'.$file;
	}

	public function bowerUrl($file) 
	{
		return get_site_url().'/wp-content/themes/smartpadpro/assets/bower_components/'.$file;
	}

	public function imageUrl($file) 
	{
		return get_site_url().'/wp-content/themes/smartpadpro/assets/images/'.$file;
	}

	
}