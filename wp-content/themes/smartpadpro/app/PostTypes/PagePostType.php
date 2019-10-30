<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class PagePostType extends PostType
{
	protected $metabox = [
		'Page Settings' => [
			'id'         => 'page_settings',
			'title'      => 'Page Settings',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 2],
			'fields'     => [
				[ 'name' => 'Page Title', 'id' => 'page_title', 'type' => 'text' ],
				[ 'name' => 'Meta Description', 'id' => 'meta_description', 'type' => 'text' ],
				[ 'name' => 'Meta Keywords', 'id' => 'meta_keywords', 'type' => 'text' ],
			]
		],

		'Banner Texts' => [
			'id'         => 'banner_texts',
			'title'      => 'Banner Texts',
			'pages'      => ['page'],
			'show_names' => true,
			'fields'     => [
				[ 'name' => 'Heading <br/><small>(<b>if not set page title will be shown.</b>)</small>', 'id' => 'banner_heading', 'type' => 'text' ],
				[ 'name' => 'Heading Description', 'id' => 'banner_heading_description', 'type' => 'text' ],
				[ 'name' => 'Heading Description Font Size', 'id' => 'banner_heading_description_font_size', 'type' => 'text' ],
				[ 'name' => 'Button Text', 'id' => 'banner_button_label', 'type' => 'text' ],
				[ 'name' => 'Button Link', 'id' => 'banner_button_link', 'type' => 'text' ],
			]
		],
	];
}