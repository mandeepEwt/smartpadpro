<?php 

namespace App\Ajax;

use WP_Query;

class FeaturesAjax extends \App\Ajax\Core\Ajax 
{

	// action is used in ajax call -> data: { action: 'sample' }
	// callback is the method to be called like the method sample() below
	// nopriv if this ajax is also accessible by none login users.
	protected $callbacks = [
		['action' => 'features', 'callback' => 'index', 'nopriv' => true]
	];

	public function index() 
	{
		$request = (object) $_REQUEST;

		$features = new WP_Query([
			'post_type'      => 'feature',
			'post_status'    => 'publish',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'tax_query'      => [
				[
					'taxonomy' => 'feature-category',
					'field'    => 'slug',
					'terms'    => 'feature',
				],
			],
			'posts_per_page' => -1
		]);

		$result = [];
		while($features->have_posts())
		{
			$features->the_post();

			$result[] = [
				'title'   => get_the_title(),
				'content' => get_post_meta(get_the_ID(), 'short_content', TRUE),
				'image'   => get_the_post_thumbnail_url(get_the_ID(), 'full')
			];
		}
		wp_reset_postdata();

		echo json_encode($result);

		wp_die();
	}

}