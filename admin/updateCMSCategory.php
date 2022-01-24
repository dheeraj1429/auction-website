<?php
require_once "../model/cmsCategory.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    $name = $_POST["name"];
    $id = $_POST["id"];
    $updatedData = array("name" => $name);
    $cmsCategory = new CMSCategory();
    $cmsCategory->update($updatedData, $id);
    header("Location: ./cmsCategory.php");
    die();
} else {
    header("HTTP/1.0 404 Not Found");
    die();
}