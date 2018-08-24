<?php
	//session_start();
	require_once "config.php";
    $selected_album=$_GET['album'];
    //var_dump($selected_album);
	$data=$_SESSION['userData'];		//Store The Session Data data

	$redirectURL = "http://localhost/FacebookLogin/logout.php";
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
    <title>rtCamp</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/slider_style.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<script src="js/sllider_js.js" type="text/javascript"></script>
<body class="photos-body">
<div class="welcome-message-div container-fluid d-flex align-items-center">
		<h1>Welcome to the Facebook</h1>
		<div class="logout-div ml-auto mr-5">
			<a href="logout.php">Logout</a>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-9">
                <div id="main-slider" class="slider">
					<div class="slider-wrapper">
						<?php
					    	foreach($data['albums'][$selected_album]['photos'] as $key=>$album_data){				
				    	?>
								
								<img src="<?php echo $album_data['picture'];?>" class="slide">
								
						<?php
								}
						?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer-div-for-photos container-fluid">
		<p class="text-center lead">&copy;2018 | Kanti Vekariya</p>
	</footer>
</body>
</html>