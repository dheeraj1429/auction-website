<?php
require_once "./session.php";


if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
    die();
}

session_destroy();
header("Location: ./index.php");