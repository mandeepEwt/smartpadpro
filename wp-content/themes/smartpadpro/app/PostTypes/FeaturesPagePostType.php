<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class FeaturesPagePostType extends PostType
{
	protected $metabox = [
		'Other Fields' => [
			'id'         => 'other_fields',
			'title'      => 'Other Fields',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 13],
			'fields'     => [
				[ 'name' => 'Right Content', 'id' => 'right_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Feature Gallery Title', 'id' => 'gallery_title', 'type' => 'text', 'desc' => 'Features can be configured at <a href="/wp-admin/edit.php?post_type=feature">this section</a>.' ],
			]
		],
	];
}