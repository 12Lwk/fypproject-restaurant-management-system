<?php
session_start();
include('dbcon.php');

if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Please login with your username and password";
    header('Location: login.php');
    exit(0);
}
?>