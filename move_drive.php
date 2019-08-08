<?php
session_start();
$data=$_SESSION['userData'];
// print_r($_GET['album']);
$url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$url = $url_array[0];
 require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_DriveService.php';
// require_once 'google-api-php-client/src/google/service/plus.php';
// require_once 'google-api-php-client/src/google/Client.php';
$client = new Google_Client();
$client->setClientId('');
$client->setClientSecret('');
$client->setRedirectUri($url);
$client->setScopes(array('https://www.googleapis.com/auth/drive'));
if (isset($_GET['code'])) {
    $_SESSION['accessToken'] = $client->authenticate($_GET['code']);
    header('location:'.$url);exit;
} elseif (!isset($_SESSION['accessToken'])) {
    $client->authenticate();
}
// $files= array();
// $dir = dir('files');
// while ($file = $dir->read()) {
//     if ($file != '.' && $file != '..') {
//         $files[] = $file;
//     }
// }
if(isset($_GET['album'])){
    if(!is_array($_GET['album'])){//single album
        $selected_albums=$_GET['album'];
        $selected_albums=array($selected_albums);
    }else{//selected multiple album
        $selected_albums=$_GET['album'];
    }	
}else{
    if(isset($_GET['move_selected'])){//album is not selected user going to download selected album
        echo "no album selected";
    }else{//all albums
        $selected_albums=range(0,count($data)-1);
        //print_r($selected_albums);
    }
}

foreach($selected_albums as $selected_album){
    $cnt=0;
        // print_r($selected_album);
   
    # download file
    $dir = $data['albums'][$selected_album]['name'];
    // $dir = $data['albums'][$selected_album]['name'];
     print_r($dir);
    
        //  print_r($album_pic['picture']);
       //  echo "<br>";
      



if (!empty($_GET)) {
    $client->setAccessToken($_SESSION['accessToken']);
    $service = new Google_DriveService($client);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
     $file = new Google_DriveFile();
    $mime='application/vnd.google-apps.folder';
    // $file = new Google_Service_Drive_DriveFile();
    foreach($data['albums'][$selected_album]['photos'] as $album_pic) {
        print_r($album_pic);
        $file_path = $album_pic;
        //print_r($file_path);
        $mime_type = finfo_file($finfo, $file_path);
        // print_r($mime_type);
        //$file->setMimeType($mime);
        $file->setTitle($dir);
        $file->setDescription($mime_type);
        $file->setMimeType($mime_type);
        $service->files->insert(
            $file,
            array(
                'data' => file_get_contents($file_path['picture']),
                'mimeType' => $mime_type
            )
        );
       
    }
    finfo_close($finfo);
    header('location:'.$url);exit;
    echo "helllo";
}
}
 header('location:index.php');exit;
