<?php
session_start();
$selected_album=$_GET['album'];
$data=$_SESSION['userData'];
$cnt=0;
//print_r($selected_album);
# create new zip opbject
 $zip = new ZipArchive();
 
 # create a temp file & open it
 $tmp_file = tempnam('.','');
 $zip->open($tmp_file, ZipArchive::CREATE);
 
 # loop through each file
 //print_r($data['albums']);
 foreach($data['albums'] as $album_data)
 {
     //print_r($album_data);
     # download file
      foreach ($album_data['photos'] as $album_pic) {
       // print_r($album_pic);
                    $download_file = file_get_contents($album_pic['picture']);
                    $zip->addFile($album_data['name'],$download_file);
                    
    }
     
    
     #add it to the zip
    
  	 $cnt++;
 }
 
# close zip
$zip->close();
 
# send the file to the browser as a download

header('Content-disposition: attachment; filename=album.zip');
header('Content-type: application/zip');
readfile($tmp_file);
unlink($tmp_file);
  header("location:index.php");
?>