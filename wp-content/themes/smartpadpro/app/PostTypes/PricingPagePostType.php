<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class PricingPagePostType extends PostType
{
	protected $metabox = [
		
		'Headings' => [
			'id'         => 'pricing_heading_section',
			'title'      => 'Pricing Heading Section',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Heading', 'id' => 'pricing_heading', 'type' => 'text' ],
				[ 'name' => 'Sub Heading', 'id' => 'pricing_sub_heading', 'type' => 'text' ]
			]
		],
		
		'single_store_setup' => [
			'id'         => 'single_store_setup',
			'title'      => 'SINGLE STORE SETUP',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Unit Text', 'id' => 'ss_setup_unit_text', 'type' => 'text' ],
				[ 'name' => 'Sign Up Url', 'id' => 'ss_sign_up_url', 'type' => 'text' ],
			]
		],

		'single_store_column_one' => [
			'id'         => 'single_store_column_one',
			'title'      => 'Single Store Column 1',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Title', 'id' => 'ss_one_title', 'type' => 'text' ],
				[ 'name' => 'User Count', 'id' => 'ss_one_user_count', 'type' => 'text' ],
				[ 'name' => 'Price', 'id' => 'ss_one_price', 'type' => 'text' ],
				[ 'name' => 'Content', 'id' => 'ss_one_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false, 'options' => ['textarea_rows' => 9] ],
			]
		],

		'single_store_column_two' => [
			'id'         => 'single_store_column_two',
			'title'      => 'Single Store Column 2',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Title', 'id' => 'ss_two_title', 'type' => 'text' ],
				[ 'name' => 'User Count', 'id' => 'ss_two_user_count', 'type' => 'text' ],
				[ 'name' => 'Price', 'id' => 'ss_two_price', 'type' => 'text' ],
				[ 'name' => 'Content', 'id' => 'ss_two_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false, 'options' => ['textarea_rows' => 9] ],
			]
		],

		'single_store_column_three' => [
			'id'         => 'single_store_column_three',
			'title'      => 'Single Store Column 3',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Title', 'id' => 'ss_three_title', 'type' => 'text' ],
				[ 'name' => 'User Count', 'id' => 'ss_three_user_count', 'type' => 'text' ],
				[ 'name' => 'Price', 'id' => 'ss_three_price', 'type' => 'text' ],
				[ 'name' => 'Content', 'id' => 'ss_three_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false, 'options' => ['textarea_rows' => 9] ],
			]
		],

		'multi_store_setup' => [
			'id'         => 'multi_store_setup',
			'title'      => 'MULTI STORE SETUP',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Title', 'id' => 'ms_setup_title', 'type' => 'text' ],
				[ 'name' => 'Unit Text', 'id' => 'ms_setup_unit_text', 'type' => 'text' ],
				[ 'name' => 'Divider Text', 'id' => 'ms_setup_divider_text', 'type' => 'text' ],
				[ 'name' => 'User Count', 'id' => 'ms_setup_user_count', 'type' => 'text' ],
				[ 'name' => 'Sign Up Url', 'id' => 'ms_sign_up_url', 'type' => 'text' ],
			]
		],

		'multi_store_column_one' => [
			'id'         => 'multi_store_column_one',
			'title'      => 'Multi Store Column 1',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Title', 'id' => 'ms_one_title', 'type' => 'text' ],
				[ 'name' => 'Location Text', 'id' => 'ms_one_location', 'type' => 'text' ],
				[ 'name' => 'Price', 'id' => 'ms_one_price', 'type' => 'text' ],
				[ 'name' => 'Content', 'id' => 'ms_one_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false, 'options' => ['textarea_rows' => 9] ],
			]
		],

		'multi_store_column_two' => [
			'id'         => 'multi_store_column_two',
			'title'      => 'Multi Store Column 2',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Title', 'id' => 'ms_two_title', 'type' => 'text' ],

				[ 'name' => 'Location Text', 'id' => 'ms_two_location', 'type' => 'text' ],
				[ 'name' => 'Price', 'id' => 'ms_two_price', 'type' => 'text' ],

				[ 'name' => 'OR Location Text', 'id' => 'ms_two_or_location', 'type' => 'text' ],
				[ 'name' => 'OR Price', 'id' => 'ms_two_or_price', 'type' => 'text' ],

				[ 'name' => 'Content', 'id' => 'ms_two_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false, 'options' => ['textarea_rows' => 9] ],
			]
		],

		'multi_store_column_three' => [
			'id'         => 'multi_store_column_three',
			'title'      => 'Multi Store Column 3',
			'pages'      => ['page'],
			'show_names' => true,
			'show_on'    => ['key' => 'id', 'value' => 17],
			'fields'     => [
				[ 'name' => 'Title', 'id' => 'ms_three_title', 'type' => 'text' ],
				[ 'name' => 'Location Text', 'id' => 'ms_three_location', 'type' => 'text' ],
				[ 'name' => 'Price', 'id' => 'ms_three_price', 'type' => 'text' ],
				[ 'name' => 'Content', 'id' => 'ms_three_content', 'type' => 'WYSIWYG', 'sanitization_cb' => false, 'options' => ['textarea_rows' => 9] ],
			]
		],
		
	];
}