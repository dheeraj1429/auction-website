<?php
require_once "../model/category.php";
require_once "../session.php";
if (!isset($_SESSION["admin_email"])) {
    $category = new Category();
    $categoryName = $_POST['category'];
    $categoryId = $_POST['id'];
    $category->update(array('name' => $categoryName), $categoryId);
    header('Location: /admin/category.php');
    die();
}