<?php
    session_start();
    if(empty($_SESSION['level'])){
        header('location:../index.php?error=You do not have access to this site. Please login !!!');
        exit;
    }
?>