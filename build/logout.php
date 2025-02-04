<?php
    session_start();
    session_unset();
    session_destroy();

    if($_SESSION['userName']){
        header('location: index.php');
    } else{
        header('location: login.php');
        // echo "Please login first";
    }   
?>