<?php

function actions() {
	return new \App\Actions\Actions();
}

function env($key) {
	return getenv($key);
}

function dd($var = '') {
	echo "<pre>".var_dump($var)."</pre>";
	die();
}