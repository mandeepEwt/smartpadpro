<?php 

namespace App\PostTypes;

class TestimonialsPostType extends \App\PostTypes\Core\PostType 
{

	// Post Type Name
	protected $label    = 'Testimonial';
	protected $type     = 'testimonial';

	// Default Not Required.
	protected $icon     = 'dashicons-format-chat';
	protected $taxonomy = false;
	protected $exclude  = false;
	protected $supports = ['title', 'editor'];

	protected $metabox = [
		'Extra Fields' => [
			'id'         => 'extra_fields',
			'title'      => 'Extra Fields',
			'pages'      => ['testimonial'],
			'show_names' => true,
			'template'   => '',
			'fields'     => [
				[ 'name' => 'Author', 'id' => 'author', 'type' => 'text' ],
				[ 'name' => 'Rating', 'id' => 'rating', 'type' => 'text' ],
			]
		]
	];

}