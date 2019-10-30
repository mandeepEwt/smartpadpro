<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class AboutPagePostType extends PostType
{
	protected $metabox = [
		'Banner Text Contents' => [
			'id'         => 'gradient_strip',
			'title'      => 'Gradient Strip',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 9],
			'fields'     => [
				[ 'name' => 'Heading', 'id' => 'gradient_heading', 'type' => 'text' ],
				[ 'name' => 'Content', 'id' => 'gradient_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Button Text', 'id' => 'gradient_button_label', 'type' => 'text' ],
				[ 'name' => 'Button Link', 'id' => 'gradient_button_link', 'type' => 'text' ],
			]
		],

		'Two Column Contents' => [
			'id'         => 'two_column_contents',
			'title'      => 'Two Column Contents',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 9],
			'fields'     => [
				[ 'name' => 'Left Content', 'id' => 'left_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Right Content', 'id' => 'right_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false, 'desc' => 'The Our Values List can be configured on the <a href="/wp-admin/edit.php?post_type=our-value">our values post page.</a>' ],
			]
		]
	];
}