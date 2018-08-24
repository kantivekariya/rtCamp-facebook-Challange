<?php
    if (isset($_GET['download_selected'])) {
        header("location:zip.php");
    }
    elseif (isset($_GET['move_selected'])) {
        header("location:move_drive.php");
    }
?>