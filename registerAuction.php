<?php
require_once "./model/participant.php";
require_once "./model/users.php";
require_once "./model/wallet.php";
require_once "./model/auction.php";
require_once "functions.php";
require_once "session.php";

if (!isset($_SESSION["email"])) {
    header("Location: ./logIn.php");
    die();
}
if (!isset($_GET["auction_id"]) && !isset($_GET["token_value"])) {
    header("Location: ./index.php");
    die();
}


$participant = new Participant();
$users = new Users();
$auction = new Auction();
$auctionData = $auction->read($id = $_GET["auction_id"]);
$wallet = new Wallet();

if (!$auctionData) {
    header('HTTP/1.0 403 Forbidden');
    die();
}

if (strtotime($auctionData[0]["date"]) != strtotime(date("Y-m-d")) && strtotime(date("H:i:s")) > strtotime($auctionData[0]["end_time"])) {
    header('HTTP/1.0 403 Forbidden');
    die();
}

if (!isParticepeted($_SESSION['email'], $_GET["auction_id"])) {
    try {
        $users->updateBidToken("remove", $_GET["token_value"], $_SESSION["userId"]);
    } catch (Exception $e) {
        $_SESSION["flash"]["message"] = "You don't have enough tokens to buy";
        $_SESSION["flash"]["type"] = "warning";
        header("Location: ./index.php");
        die();
    }

    $data = array("auction_id" => $_GET["auction_id"], "user_email" => $_SESSION["email"]);
    $walletData = array(
        "user_id" => $_SESSION["userId"],
        "use_type" => "remove",
        "token_value" => $_GET["token_value"],
        "auction_id" => $_GET["auction_id"],
    );
    $wallet->create($walletData);
    $participant->create($data);
    $_SESSION["flash"]["message"] = "You are in the auction";
    $_SESSION["flash"]["type"] = "success";
    header("Location: ./index.php");
    die();
} else {
    $_SESSION["flash"]["message"] = "You've already participated in the auction";
    $_SESSION["flash"]["type"] = "warning";
    header("Location: ./index.php");
    die();
}