<?php
	require_once "config.php";

	try {
		$accessToken = $helper->getAccessToken();
	}
// 	} catch (\Facebook\Exceptions\FacebookResponseException $e) {
// 		echo "Response Exception: " . $e->getMessage();
// 		exit();
	} catch (\Facebook\Exceptions\FacebookSDKException $e) {
		echo "SDK Exception: " . $e->getMessage();
		exit();
	}

	if (!$accessToken) {
		header('Location: login.php');
		exit();
	}

	
	$oAuth2Client = $FB->getOAuth2Client();
	if (!$accessToken->isLongLived())
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

	$response = $FB->get("me?fields=albums{name,photos{picture}}", $accessToken);			//Fetch The Albums 
	//var_dump($response);
	$userData = $response->getGraphNode()->asArray();
	//var_dump($userData);
	// $jsonData = file_get_contents($response);
	// $fbAlbumObj = json_decode($jsonData);
	// //var_dump($fbAlbumObj);
	//$_SESSION['fbAlbumObj']=$fbAlbumObj;
	$_SESSION['userData'] = $userData;
	$_SESSION['access_token'] = (string) $accessToken;
	header('Location: https://rtcamptest.herokuapp.com/index.php');
	exit();
?>
