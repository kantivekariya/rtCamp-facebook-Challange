<?php
	session_start();

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => 'api_id',							//Graph api id
		'app_secret' => 'app_secreatkey',		//Graph api Secret key
		'default_graph_version' => 'v3.1'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>
