<?php 

namespace App\PostTypes;

use App\PostTypes\Core\PostType;

class MapMarkersPostType extends PostType 
{

	// If the post type you want to control is page you don't need to specify these Attributes Anymore.

	// Post Type Name
	protected $label    = 'Map Marker';
	protected $type     = 'map-marker';

	// Default Not Required.
	protected $icon     = 'dashicons-location';
	protected $taxonomy = true;
	protected $exclude  = false;
	protected $supports = ['title'];

	protected $metabox = [
		'markers' => [
			'id'         => 'markers',
			'title'      => 'Markers',
			'pages'      => ['map-marker'],
			'show_names' => true,
			'fields'     => [
				[ 'name' => 'Original Marker', 'id' => 'original_marker', 'type' => 'file' ],
				[ 'name' => 'Active Marker', 'id' => 'active_marker', 'type' => 'file' ],
			]
		],

		'location' => [
			'id'         => 'location',
			'title'      => 'Location',
			'pages'      => ['map-marker'],
			'show_names' => true,
			'fields'     => [
				[ 'name' => 'Latitude', 'id' => 'latitude', 'type' => 'text' ],
				[ 'name' => 'Longitude', 'id' => 'longitude', 'type' => 'text' ],
			]
		],
	];
}