<?php

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

require __DIR__.'/helpers.php';

/**
 * Boot INIT
 */
function initializeApp() {
	new \App\App();

	/**
	 * Boot POST TYPES
	 */
	$path = __DIR__.'/PostTypes/';
	foreach(glob("$path*.php") as $file) {
		// Get the filename -> {$Filename}.php
		$fileExplode = explode('/', $file);
		$className = explode('.', $fileExplode[count($fileExplode)-1])[0];

		// Initialize it automatically.
		$postType = '\App\PostTypes\\'.$className;
		new $postType();
	}

	/**
	 * Boot SHORTCODES
	 */
	$path = __DIR__.'/Shortcodes/';
	foreach(glob("$path*.php") as $file) {
		// Get the filename -> {$Filename}.php
		$fileExplode = explode('/', $file);
		$className = explode('.', $fileExplode[count($fileExplode)-1])[0];

		// Initialize it automatically.
		$postType = '\App\Shortcodes\\'.$className;
		new $postType();
	}

	/**
	 * Boot WIDGETS
	 */
	$path = __DIR__.'/Widgets/';
	foreach(glob($path.'*') as $dir) {
		foreach(glob($dir) as $file) {
			$className = basename($file);

			if($className != 'Core') {
				register_widget('\App\Widgets\\'.$className.'\\'.$className);
			}
		}
	}

	/**
	 * Boot Tiny MCE BUTTON
	 */
	$path = __DIR__.'/Tinymce/TinymceButton/';
	foreach(glob($path.'*') as $dir) {
		foreach(glob($dir) as $file) {
			$className = basename($file);

			if($className != 'Core') {
				$tinymceButton = '\App\Tinymce\\TinymceButton\\'.$className.'\\'.$className;
				new $tinymceButton();
			}
		}
	}

	/**
	 * Boot AJAX
	 */
	$path = __DIR__.'/Ajax/';
	foreach(glob("$path*.php") as $file) {
		// Get the filename -> {$Filename}.php
		$fileExplode = explode('/', $file);
		$className = explode('.', $fileExplode[count($fileExplode)-1])[0];

		// Initialize it automatically.
		$postType = '\App\Ajax\\'.$className;
		new $postType();
	}
}
add_action('init', 'initializeApp');