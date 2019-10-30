<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class BannerPostType extends PostType 
{

	// If the post type you want to control is page you don't need to specify these Attributes Anymore.

	// Post Type Name
	protected $label    = 'Banner';
	protected $type     = 'banner';

	// Default Not Required.
	protected $icon     = 'dashicons-images-alt2';
	protected $taxonomy = false;
	protected $exclude  = false;
	protected $supports = ['title', 'thumbnail'];
}