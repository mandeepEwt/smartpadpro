<?php namespace App\Tinymce\TinymceButton\Core;

class TinymceButton {

	public function __construct() {
		if(is_admin()) {
			add_action('init', [$this, 'setupTinyMcePlugin']);
		}
	}

	public function setupTinyMcePlugin() {
		// Check if the logged in WordPress User can edit Posts or Pages
		// If not, don't register our TinyMCE plugin
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		// Check if the logged in WordPress User has the Visual Editor enabled
		// If not, don't register our TinyMCE plugin
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}

		// Setup some filters
		add_filter('mce_external_plugins', [$this, 'addTinyMcePlugin']);
		add_filter('mce_buttons', [$this, 'addTinyMceToolbarButton']);
	}

	public function addTinyMcePlugin($plugin_array) {
		$path = explode('/', get_template_directory_uri().'/'.str_replace('\\', '/', get_called_class()));
		unset($path[count($path)-1]);
		$path = implode('/', $path);

		$plugin_array[$this->name] = $path.'/assets/button.js';
		return $plugin_array;
	}

	public function addTinyMceToolbarButton($buttons) {
		array_push($buttons, $this->name);
		return $buttons;
	}

}