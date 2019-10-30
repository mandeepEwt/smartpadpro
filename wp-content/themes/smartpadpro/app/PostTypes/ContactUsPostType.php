<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class ContactUsPostType extends PostType
{
	protected $metabox = [
		'map' => [
			'id'         => 'map',
			'title'      => 'Map',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 21],
			'fields'     => [
				[ 'name' => 'Map URL', 'id' => 'map_url', 'type' => 'text' ],
			]
		],

		'four_icons_section' => [
			'id'         => '2_images_section',
			'title'      => '2 Images Section',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 21],
			'fields'     => [
				[ 'name' => 'Section 1 Image', 'id' => 'section_one_image', 'type' => 'file' ],
				[ 'name' => 'Section 1 Title', 'id' => 'section_one_title', 'type' => 'text' ],
				[ 'name' => 'Section 1 Content', 'id' => 'section_one_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Section 1 button Label', 'id' => 'contact_us_label_1', 'type' => 'text' ],
				[ 'name' => 'Section 1 button Link', 'id' => 'contact_us_link_1', 'type' => 'text' ],
				[ 'name' => 'Section 1 contact form', 'id' => 'contact_us_tech_form', 'type' => 'text' ],

				[ 'name' => 'Section 2 Image', 'id' => 'section_two_image', 'type' => 'file' ],
				[ 'name' => 'Section 2 Title', 'id' => 'section_two_title', 'type' => 'text' ],
				[ 'name' => 'Section 2 Content', 'id' => 'section_two_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Section 2 button Label', 'id' => 'contact_us_label_2', 'type' => 'text' ],
				[ 'name' => 'Section 2 button Link', 'id' => 'contact_us_link_2', 'type' => 'text' ],
				[ 'name' => 'Section 2 contact form', 'id' => 'contact_us_sales_form', 'type' => 'text' ],
				
				[ 'name' => 'Section 3 Image', 'id' => 'section_three_image', 'type' => 'file' ],
				[ 'name' => 'Section 3 Title', 'id' => 'section_three_title', 'type' => 'text' ],
				[ 'name' => 'Section 3 Content', 'id' => 'section_three_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Section 3 button Label', 'id' => 'contact_us_label_3', 'type' => 'text' ],
				[ 'name' => 'Section 3 button Link', 'id' => 'contact_us_link_3', 'type' => 'text' ],
				[ 'name' => 'Section 3 contact form', 'id' => 'contact_us_product_form', 'type' => 'text' ],
			]
		],
		
		'pricing' => [
			'id'         => 'pricing',
			'title'      => 'pricing Section',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 21],
			'fields'     => [
				[ 'name' => 'Heading', 'id' => 'pricing_heading', 'type' => 'text' ],
				[ 'name' => 'Button label', 'id' => 'pricing_button', 'type' => 'text' ],
				[ 'name' => 'Link', 'id' => 'pricing_link', 'type' => 'text' ],
				[ 'name' => 'Background Color', 'id' => 'pricing_bg_color', 'type' => 'text' ],
			]
		],
		
		'demonstration' => [
			'id'         => 'demonstration',
			'title'      => 'Demonstration Section',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 21],
			'fields'     => [
				[ 'name' => 'Heading', 'id' => 'demo_heading', 'type' => 'text' ],
				[ 'name' => 'Sub Heading', 'id' => 'demo_sub_heading', 'type' => 'text' ],
				[ 'name' => 'Demonstration Content', 'id' => 'demo_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false ],
				[ 'name' => 'Form Heading', 'id' => 'demo_form_heading', 'type' => 'text' ],
				[ 'name' => 'Demonstration Form', 'id' => 'demo_form', 'type' => 'text' ]
			]
		],
		
	];
}