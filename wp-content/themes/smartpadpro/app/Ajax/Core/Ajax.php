<?php namespace App\Ajax\Core;

class Ajax {

	/**
	 * Registers the Ajax Calls
	 */
	public function __construct() {
		foreach($this->callbacks as $callback) {
			$callback = (object) $callback;

			// Admin ajax access.
			add_action("wp_ajax_$callback->action", [$this, $callback->callback]);

			// Non admin ajax access.
			if($callback->nopriv) {
				add_action("wp_ajax_nopriv_$callback->action", [$this, $callback->callback]);
			}
		}
	}

}