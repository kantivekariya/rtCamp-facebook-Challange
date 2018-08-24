<?php
	session_start();
	set_time_limit(3600);
	//$selected_album=$_GET['album'];
	$data=$_SESSION['userData'];
	//print_r($_GET['album']);
	
	if(isset($_GET['album'])){
		if(!is_array($_GET['album'])){//single album
			$selected_albums=$_GET['album'];
			$selected_albums=array($selected_albums);
		}else{//selected multiple album
			$selected_albums=$_GET['album'];
			print_r($selected_albums);
		}	
	}else{
		if(isset($_GET['download_selected'])){//album is not selected user going to download selected album
			echo "no album selected";
		}else{//all albums
			$selected_albums=range(0,count($data)-1);
		}
	}
	//print_r($selected_albums);exit;
	
	# create new zip opbject
	$zip = new ZipArchive();
 
	# create a temp file & open it
	$tmp_file = tempnam('.','');
	$zip->open($tmp_file, ZipArchive::CREATE);
 
	# loop through each file
	foreach($selected_albums as $selected_album){
 		$cnt=0;
   		   //print_r($selected_album);
		
     	# download file
		$dir = $data['albums'][$selected_album]['name'];
		$zip -> addEmptyDir($dir); 
		$zip->addFile($dir); 
	  
        foreach($data['albums'][$selected_album]['photos'] as $album_pic) {
              // print_r($album_pic['picture']);
			 //  echo "<br>";
			 $download_file = file_get_contents($album_pic['picture']);
             $zip->addFromString($dir.'/'.basename($cnt.'.jpg'),$download_file);
  			 $cnt++;   
     	} 
	}
 
 
	# close zip
	$zip->close();
 
	# send the file to the browser as a download
	header('Content-disposition: attachment; filename=Facebook Album.zip');
	header('Content-type: application/zip');
	readfile($tmp_file);
	unlink($tmp_file);
	header("location:index.php");


?>