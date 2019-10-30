<?php namespace App\Shortcodes;

class SampleShortcode extends \App\Shortcodes\Core\Shortcode {

	protected $shortcode = 'sample';

	public function generate($atts) {
		return 'Hello World';
	}

}