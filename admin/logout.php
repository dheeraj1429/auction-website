<?php
require_once('../session.php');
unset($_SESSION['admin_email']);
$_SESSION['toast']['msg'] = "Successfully logged out.";
header("location:login.php");
exit();