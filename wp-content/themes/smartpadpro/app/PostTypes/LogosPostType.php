<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class LogosPostType extends PostType 
{

	// If the post type you want to control is page you don't need to specify these Attributes Anymore.

	// Post Type Name
	protected $label    = 'Logo';
	protected $type     = 'logo';

	// Default Not Required.
	protected $icon     = 'dashicons-format-image';
	protected $taxonomy = true;
	protected $exclude  = false;
	protected $supports = ['title', 'thumbnail'];
}