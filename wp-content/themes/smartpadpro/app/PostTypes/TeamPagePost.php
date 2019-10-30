<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class TeamPagePost extends PostType 
{

	// If the post type you want to control is page you don't need to specify these Attributes Anymore.

	// Post Type Name
	protected $label    = 'Team';
	protected $type     = 'team';

	// Default Not Required.
	protected $icon     = 'dashicons-groups';
	protected $taxonomy = false;
	protected $exclude  = false;
	protected $supports = ['title', 'thumbnail', 'editor'];


	protected $metabox = [
		'Extra Fields' => [
			'id'         => 'extra_fields',
			'title'      => 'Extra Fields',
			'pages'      => ['team'],
			'show_names' => true,
			'template'   => '',
			'fields'     => [
				[ 'name' => 'Position', 'id' => 'position', 'type' => 'text' ],
				[ 'name' => 'Location', 'id' => 'location', 'type' => 'select', 'options' => ['Australia' => 'Australia', 'Philippines' => 'Philippines', 'Malaysia' => 'Malaysia'] ],
				[ 'name' => 'Facebook Link', 'id' => 'facebook', 'type' => 'text' ],
				[ 'name' => 'Twitter Link', 'id' => 'twitter', 'type' => 'text' ],
				[ 'name' => 'Email', 'id' => 'email', 'type' => 'text' ],
				[ 'name' => 'Linkedin Link', 'id' => 'linkedin', 'type' => 'text' ],
			]
		]
	];

}