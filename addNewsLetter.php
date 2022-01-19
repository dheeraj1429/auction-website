<?php
require_once "./model/newsLetter.php";
require_once "./model/users.php";
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

function isValidEmail($email)
{
    $users = new Users();
    $usersData = $users->read($email);
    if (empty($usersData)) {
        return false;
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $email = $_POST["email"];
    $isAlreadySubscribed = isAlreadySubscribed($email);
    $isValidEmail = isValidEmail($email);

    if ($isValidEmail && !$isAlreadySubscribed) {
        $newsLetter = getNewsLetter();
        $newsLetterData = array("user_id" => $_SESSION["userId"], "email" => $email);
        $newsLetter->create($newsLetterData);
        $_SESSION["flash"]["type"] = "success";
        $_SESSION["flash"]["message"] = "You are now subscribed";
    }

    if (!$isValidEmail) {
        header("Location: ./logIn.php");
        die();
    }
}
header("Location: ./index.php");