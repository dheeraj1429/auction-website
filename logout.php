<?php 
require_once 'inc/config.php';

if(isset($_SESSION['user'])){
    session_destroy();
    $_SESSION['toast']['type'] = "warning";
    $_SESSION['toast']['msg'] = "Log Out";
    header('location:login.php');
    exit();
}