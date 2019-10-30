<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class HomePagePostType extends PostType
{
	protected $metabox = [
		'Extra Fields' => [
			'id'         => 'extra_fields',
			'title'      => 'Extra Fields',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 2],
			'fields'     => [
				[ 'name' => 'Feature Learn More Link', 'id' => 'feature_learn_more_link', 'type' => 'text' ],
				[ 'name' => 'Youtube Link', 'id' => 'youtube_link', 'type' => 'text' ],
				[ 'name' => 'Map Box 1 Label', 'id' => 'map_box_one_label', 'type' => 'text' ],
				[ 'name' => 'Map Box 1 Value', 'id' => 'map_box_one_value', 'type' => 'text' ],
				[ 'name' => 'Map Box 2 Label', 'id' => 'map_box_two_label', 'type' => 'text' ],
				[ 'name' => 'Map Box 2 Value', 'id' => 'map_box_two_value', 'type' => 'text' ],
				[ 'name' => 'Map Box 3 Label', 'id' => 'map_box_three_label', 'type' => 'text' ],
				[ 'name' => 'Map Box 3 Value', 'id' => 'map_box_three_value', 'type' => 'text' ],
			]
		],

		'Banner Contents' => [
			'id'         => 'banner_text_contents',
			'title'      => 'Banner Contents <small>(Banners can be configured on the <a href="/wp-admin/edit.php?post_type=banner">banners post section</a>)</small>',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 2],
			'fields'     => [
				[ 'name' => 'Logo', 'id' => 'banner_logo', 'type' => 'file' ],
				[ 'name' => 'Nav Circle Label', 'id' => 'nav_circle_label', 'type' => 'text' ],
				[ 'name' => 'Nav Circle Link', 'id' => 'nav_circle_link', 'type' => 'text' ],
			]
		],

		'Headings' => [
			'id'         => 'headings',
			'title'      => 'Strip Headings',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 2],
			'fields'     => [
				[ 'name' => 'Featured Logo', 'id' => 'featured_logo', 'type' => 'file' ],
				[ 'name' => 'Feature Icons Heading', 'id' => 'feature_icons_heading', 'type' => 'text' ],
				[ 'name' => 'Features Heading', 'id' => 'features_heading', 'type' => 'text' ],
				[ 'name' => 'Logos Heading 1', 'id' => 'logos_heading_one', 'type' => 'text' ],
				[ 'name' => 'Logos Heading 2', 'id' => 'logos_heading_two', 'type' => 'text' ],
				[ 'name' => 'Map Heading', 'id' => 'map_heading', 'type' => 'text' ],
				[ 'name' => 'Testimonials Heading', 'id' => 'testimonials_heading', 'type' => 'text' ],
				[ 'name' => 'Our Values Heading', 'id' => 'our_values_heading', 'type' => 'text' ],
			]
		],

		'Footer Gradient' => [
			'id'         => 'footer_gradient',
			'title'      => 'Footer Gradient Strip',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 2],
			'fields'     => [
				[ 'name' => 'Gradient Content', 'id' => 'gradient_content', 'type' => 'text' ],
				[ 'name' => 'Gradient Button Label', 'id' => 'gradient_button_label', 'type' => 'text' ],
				[ 'name' => 'Gradient Button Action', 'id' => 'gradient_button_action', 'type' => 'text' ],
			]
		],

		'Footer Content' => [
			'id'         => 'footer_content',
			'title'      => 'Footer Content',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 2],
			'fields'     => [
				[ 'name' => 'Logo', 'id' => 'footer_logo', 'type' => 'file' ],
				[ 'name' => 'Right Logo', 'id' => 'footer_right_logo', 'type' => 'file' ],
				[ 'name' => 'Left Content Title 1', 'id' => 'left_content_title_one', 'type' => 'text' ],
				[ 'name' => 'Left Content Title 2', 'id' => 'left_content_title_two', 'type' => 'text' ],
				[ 'name' => 'Left Content', 'id' => 'left_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Middle Content Title', 'id' => 'middle_content_title', 'type' => 'text', 'description' => 'Form can be configured in the <a href="#">contact form plugin section.</a>.' ],
				[ 'name' => 'Right Content Title', 'id' => 'right_content_title', 'type' => 'text', 'description' => 'Menu can be configured in the <a href="/wp-admin/nav-menus.php">menu section.</a>' ],
			]
		],

		/*'Footer Icons' => [
			'id'         => 'footer_icons',
			'title'      => 'Footer Icons',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 2],
			'fields'     => [
				[ 'name' => 'Icon 1 Image', 'id' => 'icon_one_image', 'type' => 'file' ],
				[ 'name' => 'Icon 1 Title', 'id' => 'icon_one_title', 'type' => 'text' ],
				[ 'name' => 'Icon 1 Content', 'id' => 'icon_one_content', 'type' => 'text' ],
				[ 'name' => 'Icon 2 Image', 'id' => 'icon_two_image', 'type' => 'file' ],
				[ 'name' => 'Icon 2 Title', 'id' => 'icon_two_title', 'type' => 'text' ],
				[ 'name' => 'Icon 2 Content', 'id' => 'icon_two_content', 'type' => 'text' ],
				[ 'name' => 'Icon 3 Image', 'id' => 'icon_three_image', 'type' => 'file' ],
				[ 'name' => 'Icon 3 Title', 'id' => 'icon_three_title', 'type' => 'text' ],
				[ 'name' => 'Icon 3 Content', 'id' => 'icon_three_content', 'type' => 'text' ],
			]
		],*/
	];
}