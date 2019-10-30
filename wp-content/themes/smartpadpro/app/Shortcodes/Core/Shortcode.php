<?php namespace App\Shortcodes\Core;

abstract class Shortcode {

	public function __construct() {
		add_shortcode($this->shortcode, [$this, 'generate']);
	}

	abstract protected function generate($atts);

}