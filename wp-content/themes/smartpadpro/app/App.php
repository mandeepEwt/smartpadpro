<?php namespace App;

/**
 * Main Theme Setup.
 *
 * Class App
 * @package App
 */
class App {

	public function __construct() {
		@ini_set('upload_max_size', '120M');
		@ini_set('post_max_size', '120M');

		$this->themeSetup();
	}

	/**
	 * Main Theme Setup
	 */
	public function themeSetup() {
		// Load Scripts
		$this->loadScripts(); // Load Scripts on Admin
		add_action('wp_head', [$this, 'loadScripts']); // Load Scripts on wp_head()

		// Theme Menu Locations.
		register_nav_menus([
			'header' => 'Header',
			'footer' => 'Footer'
		]);

		// Theme Setup
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(125, 125, true);
		add_theme_support('menus');
		add_theme_support('title-tag');
		add_theme_support('html5', ['search-form']);
		add_editor_style('editor-style.css');

		// Register Custom Sidebar.
		$this->registerSidebars();
	}

	/**
	 * Register Sidebars
	 */
	public function registerSidebars() {
		register_sidebar([
			'name'          => 'Sample Sidebar',
			'id'            => 'sample_sidebar',
			'description'   => 'Sample Description'
		]);
	}

	/**
	 * Load Scripts
	 */
	public function loadScripts() {
		// Google Maps
		// wp_enqueue_script('gmaps', 'https://maps.googleapis.com/maps/api/js?key='.env('GMAPS_KEY').'&libraries=places');
	}

}