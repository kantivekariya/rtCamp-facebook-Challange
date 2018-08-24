<?php
	session_start();

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '648554865537599',							//Graph api id
		'app_secret' => '1af0c3917c1f268901de1e9407eafec8',		//Graph api Secret key
		'default_graph_version' => 'v3.1'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>