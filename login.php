<?php
	require_once "config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}
	$redirectURL = "https://rtcamptest.herokuapp.com/fb-callback.php";
	$permissions = ['email'];
	$loginURL = $helper->getLoginUrl($redirectURL, $permissions);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header container-fluid text-center">
		<h1 class="text-left facebook-heading">Facebook</h1>
	</div>
	<div class="container-fluid action-button-div text-center">
		<div class="text-center">
			<div class="main-image">
				<img src="img/social.png" alt="social image">
			</div>
			<div class="ml-auto pr-5">
				<form>
					<input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Facebook" class="btn btn-primary btn-facebook">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
