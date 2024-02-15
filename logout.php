<?php
session_start(); 

if (isset($_POST['logout'])) {
    session_destroy();
    // Redirect to the login page
    header('location: index.php');
    exit(); 
}
?>
