<?php 
    session_start();
    unset($_SESSION['username']);
    session_destroy();
    $_SESSION['message'] = "You are now logged out";
    header("location: index.php");
?>