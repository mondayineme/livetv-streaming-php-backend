<?php 
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    session_destroy();
    //echo "Successfully Logged out.";
    header('Location: index.php');

?>