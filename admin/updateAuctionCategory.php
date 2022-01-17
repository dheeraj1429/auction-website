<?php
require_once "../session.php";
require_once "../model/auctionCategory.php";


if (isset($_SESSION["admin_email"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $auctionCategory = new AuctionCategory();
    $name = $_POST["name"];
    $categoryId = $_POST['id'];
    $data = array("name" => $name);
    $auctionCategory->update($data, $categoryId);
    header("Location: ./auctionCategory.php");
    die();
}