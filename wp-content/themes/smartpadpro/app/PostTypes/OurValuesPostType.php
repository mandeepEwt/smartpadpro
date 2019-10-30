<?php namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class OurValuesPostType extends PostType 
{

	// If the post type you want to control is page you don't need to specify these Attributes Anymore.

	// Post Type Name
	protected $label    = 'Our Value';
	protected $type     = 'our-value';

	// Default Not Required.
	protected $icon     = 'dashicons-universal-access-alt';
	protected $taxonomy = false;
	protected $exclude  = false;
	protected $supports = ['title', 'thumbnail'];

}