<?php 

namespace App\Ajax;

class SampleAjax extends \App\Ajax\Core\Ajax 
{

	// action is used in ajax call -> data: { action: 'sample' }
	// callback is the method to be called like the method sample() below
	// nopriv if this ajax is also accessible by none login users.
	protected $callbacks = [
		['action' => 'sample', 'callback' => 'sample', 'nopriv' => true]
	];

	public function sample() {
		echo json_encode([
			'result' => 'You just had an Ajax Call!'
		]);

		wp_die();
	}

}