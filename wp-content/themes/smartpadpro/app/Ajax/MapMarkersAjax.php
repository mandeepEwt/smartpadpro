<?php 

namespace App\Ajax;

use WP_Query;

class MapMarkersAjax extends \App\Ajax\Core\Ajax 
{

	// action is used in ajax call -> data: { action: 'sample' }
	// callback is the method to be called like the method sample() below
	// nopriv if this ajax is also accessible by none login users.
	protected $callbacks = [
		['action' => 'map-markers', 'callback' => 'index', 'nopriv' => true]
	];

	public function index() 
	{
		$request = (object) $_REQUEST;

		$mapMarkers = new WP_Query([
			'post_type'      => 'map-marker',
			'post_status'    => 'publish',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'tax_query'      => [
				[
					'taxonomy' => 'map-marker-category',
					'field'    => 'slug',
					'terms'    => $request->type,
				],
			],
			'posts_per_page' => -1
		]);

		$result = [];
		while($mapMarkers->have_posts())
		{
			$mapMarkers->the_post();
			$result[] = [
				'name' => get_the_title(),
				'longitude' => get_post_meta(get_the_ID(), 'longitude', TRUE),
				'latitude' => get_post_meta(get_the_ID(), 'latitude', TRUE),
				'original_marker' => get_post_meta(get_the_ID(), 'original_marker', TRUE),
				'active_marker' => get_post_meta(get_the_ID(), 'active_marker', TRUE),
			];
		}
		wp_reset_postdata();

		echo json_encode($result);

		wp_die();
	}

}