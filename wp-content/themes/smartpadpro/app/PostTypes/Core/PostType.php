<?php namespace App\PostTypes\Core;

class PostType {

	protected $icon     = 'dashicons-admin-post';
	protected $taxonomy = false;
	protected $exclude  = false;
	protected $supports = ['title', 'thumbnail', 'editor', 'page-attributes'];

	/**
	 * Construct
	 */
	public function __construct() {
		$this->create();

		// Create Meta box if assigned.
		if($this->metabox) {
			$this->create_metabox();
		}

		// Call Enqueue Scripts Function
		if(method_exists($this, 'scripts')) {
			if((isset($_GET['post_type']) && $_GET['post_type'] == $this->type) ||      // Create Mode
			   (isset($_GET['post']) && get_post_type($_GET['post']) == $this->type)) { // Edit Mode
				add_action('admin_enqueue_scripts', [$this, 'scripts']);
			}
		}

		// Call custom logic
		if(method_exists($this, 'custom')) {
			add_action('init', [$this, 'custom']);
		}
	}

	/**
	 * Create Custom Post
	 */
	public function create() {
		// Must not be page to create a custom post
		if($this->type && $this->type != 'page') {
			$labels = [
				'name'               => "{$this->label}s",
				'singular_name'      => "{$this->label}",
				'menu_name'          => "{$this->label}s",
				'name_admin_bar'     => "{$this->label}",
				'add_new'            => "Add New",
				'add_new_item'       => "Add New {$this->label}",
				'new_item'           => "New {$this->label}",
				'edit_item'          => "Edit {$this->label}",
				'view_item'          => "View {$this->label}",
				'all_items'          => "All {$this->label}s",
				'search_items'       => "Search {$this->label}s",
				'parent_item_colon'  => "Parent {$this->label}s:",
				'not_found'          => "No {$this->label}s found.",
				'not_found_in_trash' => "No {$this->label}s found in Trash"
			];

			$args = [
				'labels'             => $labels,
				'menu_icon'          => $this->icon,
				'public'             => false,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => ['slug' => $this->type],
				'capability_type'    => 'page',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'exclude_from_search'=> $this->exclude,
				'supports'           => $this->supports
			];

			register_post_type($this->type, $args);

			if($this->taxonomy) {
				$this->createTaxonomy();
			}
		}
	}

	/**
	 * Custom Post Taxonomy
	 */
	public function createTaxonomy() {
		$single = $this->label.' Category';
		$plural = $this->label.' Categorie';
		$slug   = $this->type.'-category';

		$labels = [
			'name'              => "{$plural}s",
			'singular_name'     => "{$single}",
			'search_items'      => "Search {$plural}",
			'all_items'         => "All {$plural}",
			'parent_item'       => "Parent {$single}",
			'parent_item_colon' => "Parent {$single}:",
			'edit_item'         => "Edit {$single}",
			'update_item'       => "Update {$single}",
			'add_new_item'      => "Add New {$single}",
			'new_item_name'     => "New {$single} Name",
			'menu_name'         => $single
		];

		$args = [
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'capability'        => 'post',
			'rewrite'           => ['slug' => $slug],
		];

		register_taxonomy("$this->type-category", $this->type, $args);
		
		add_action('restrict_manage_posts', [$this, 'tsm_filter_post_type_by_taxonomy']);
		add_filter('parse_query', [$this, 'tsm_convert_id_to_term_in_query']);
	}

	/**
	 * Creates Meta Box
	 */
	public function create_metabox() {
		add_action('init', [$this, 'intialize_metabox'], 9999);
	}

	/**
	 * Initialize Meta Box
	 */
	public function intialize_metabox() {
		foreach($this->metabox as $metabox) {
			new \App\PostTypes\Core\CustomMetaBox\cmb_Meta_Box($metabox);
		}
	}

	public function tsm_filter_post_type_by_taxonomy()
	{
		global $typenow;
		$post_type = $this->type; // change to your post type
		$taxonomy  = $this->type.'-category'; // change to your taxonomy

		if($typenow == $post_type) 
		{
			$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
			$info_taxonomy = get_taxonomy($taxonomy);

			wp_dropdown_categories(array(
				'show_option_all' => __("Show All {$info_taxonomy->label}"),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			));
		};
	}

	public function tsm_convert_id_to_term_in_query($query) 
	{
		global $pagenow;
		$post_type = $this->type; // change to your post type
		$taxonomy  = $this->type.'-category'; // change to your taxonomy

		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}
}