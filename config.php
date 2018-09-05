<?php
	session_start();

	require_once "Facebook/autoload.php";

	$FB = new \Facebook\Facebook([
		'app_id' => '2189180164685340',							//Graph api id
		'app_secret' => '616edae4d02541f76cf9ec9c18aa1edd',		//Graph api Secret key
		'default_graph_version' => 'v3.1'
	]);

	$helper = $FB->getRedirectLoginHelper();
?>
