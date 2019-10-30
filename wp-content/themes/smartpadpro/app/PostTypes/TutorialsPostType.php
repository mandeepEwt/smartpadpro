<?php namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class TutorialsPostType extends PostType 
{

	// If the post type you want to control is page you don't need to specify these Attributes Anymore.

	// Post Type Name
	protected $label    = 'Tutorial';
	protected $type     = 'tutorial';

	// Default Not Required.
	protected $icon     = 'dashicons-edit';
	protected $taxonomy = true;
	protected $exclude  = false;
	protected $supports = ['title', 'thumbnail', 'page-attributes'];


	protected $metabox = [
		'Banner Contents' => [
			'id'         => 'fields',
			'title'      => 'Fields',
			'pages'      => ['tutorial'],
			'show_names' => true,
			'fields'     => [
				[ 'name' => 'Youtube Link', 'id' => 'link', 'type' => 'text' ],
			]
		],
	];
}