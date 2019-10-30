<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class FeaturesPostType extends PostType 
{

	// If the post type you want to control is page you don't need to specify these Attributes Anymore.

	// Post Type Name
	protected $label    = 'Feature';
	protected $type     = 'feature';

	// Default Not Required.
	protected $icon     = 'dashicons-lightbulb';
	protected $taxonomy = true;
	protected $exclude  = false;
	protected $supports = ['title', 'thumbnail', 'editor', 'page-attributes'];


	protected $metabox = [
		'Icons' => [
			'id'         => 'icons',
			'title'      => 'Icons (70x70)',
			'pages'      => ['feature'],
			'show_names' => true,
			'fields'     => [
				[ 'name' => 'Title Display', 'id' => 'title_display', 'type' => 'text', 'sanitization_cb' => false ],
				[ 'name' => 'Short Content', 'id' => 'short_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Original', 'id' => 'original', 'type' => 'file' ],
				[ 'name' => 'Hover', 'id' => 'hover', 'type' => 'file' ],
			]
		],
	];
}