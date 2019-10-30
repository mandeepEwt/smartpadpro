<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class TechnologyPagePostType extends PostType
{
	protected $metabox = [
		'Other Fields' => [
			'id'         => 'other_fields',
			'title'      => 'other_fields',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 141],
			'fields'     => [
				[ 'name' => 'Content', 'id' => 'other_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
			]
		]
	];
}