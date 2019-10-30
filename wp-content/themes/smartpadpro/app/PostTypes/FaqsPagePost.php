<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class FaqsPagePost extends PostType 
{

	// If the post type you want to control is page you don't need to specify these Attributes Anymore.

	// Post Type Name
	protected $label    = 'Faq';
	protected $type     = 'faq';

	// Default Not Required.
	protected $icon     = 'dashicons-editor-help';
	protected $taxonomy = false;
	protected $exclude  = false;
	protected $supports = ['title', 'editor'];

}