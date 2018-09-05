<?php
	session_start();

	if (!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
	$data=$_SESSION['userData'];		//Store The Session Data data
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rtCamp</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body><form method="GET" action="manage_to_file.php">
	<div class="welcome-message-div container-fluid d-flex align-items-center">
		<h1>Welcome to the Facebook</h1>
		<div class="logout-div ml-auto mr-5">
			<a href="logout.php">Logout</a>
		</div>
	</div>
	<div class="container-fluid main-content albums-div">
		<div class="row">
			<div class="row d-flex justify-content-center">
				<?php
					//Fetch_Album($data);
					$cnt=0;
					foreach($data['albums'] as $d)
					{
						//print_r($d['photos']);exit;
				?>

					<div class="mx-5 my-2">
						<div class="row">
							<a href="photos.php?album=<?php echo $cnt;?>">
								<img class="album-image" src="<?php echo $d['photos'][0]['picture'];?>">
							</a>
						</div>
						<div class="row image-buttons d-flex">
							<div>
								<input type="checkbox" name="album[]" value="<?php echo "$cnt";?>">
							</div>
						<div>
							<input type="button" onClick="window.location = '<?php echo 'https://rtcamptest.herokuapp.com/zip.php?album='.$cnt ?>';" value="Download Zip" class="btn btn-small">
						</div>
						<div>
							<input type="button" onClick="window.location = '<?php echo 'https://rtcamptest.herokuapp.com/move_drive.php?album='.$cnt ?>';" value="Move Drive" class="btn btn-small">
						</div>
					</div>
					</div>				
					<?php
						$cnt++;
					}
				?>
				
			</div>

			<div class="mega-buttons container">
				<div>
					<input type="button" onClick="window.location = 'https://rtcamptest.herokuapp.com/zip.php';" value="Download All" class="btn btn-primary">
				</div>
				<div>
					<input type="button" onClick="window.location = 'https://rtcamptest.herokuapp.com/move_drive.php';" value="Move All drive" class="btn btn-primary">
				</div>
				<div>
					<input type="submit" onClick="window.location = 'https://rtcamptest.herokuapp.com/zip.php';" name="download_selected" value="Download Selected" class="btn btn-primary">
				</div>
				<div>
					<input type="submit"  onClick="window.location = 'https://rtcamptest.herokuapp.com/move_drive.php';" name="move_selected" value="Move Selected" class="btn btn-primary">
				</div>
			</div>
		</div>
	</div>
	</form>
	<footer class="footer-div">
		<p class="text-center lead">&copy;2018 | Kanti Vekariya</p>
	</footer>
</body>
</html>
