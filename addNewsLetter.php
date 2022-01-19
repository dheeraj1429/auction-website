<?php
require_once "./model/newsLetter.php";
require_once "./session.php";


if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
    die();
}

function getNewsLetter()
{
    $newsLetter = new NewsLetter();
    return $newsLetter;
}

function isAlreadySubscribed($email)
{
    $newsLetter = getNewsLetter();
    $newsLetterData = $newsLetter->getLetterByEmail($email);

    if (!empty($newsLetterData)) {
        return true;
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $email = $_POST["email"];
    $isAlreadySubscribed = isAlreadySubscribed($email);

    if (!$isAlreadySubscribed) {
        $newsLetter = getNewsLetter();
        $newsLetterData = array("user_id" => $_SESSION["userId"], "email" => $email);
        $newsLetter->create($newsLetterData);
        $_SESSION["flash"]["type"] = "success";
        $_SESSION["flash"]["message"] = "You are now subscribed";
    }
}
header("Location: ./index.php");