<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../model/bids.php";
require_once "../model/users.php";
require_once "../model/auction.php";


if (isset($_GET["auction_id"])) {
    $bids = new Bids();
    $users = new Users();
    $auction = new Auction();
    $aucitonData  = $auction->read($id = $_GET["auction_id"])[0];
    $auctionTime = $auctionData["date"] . " " . $auctionData["time"];
    $currentTime = date("Y-m-d H:i:s");

    if (strtotime($auctionTime) <= strtotime($currentTime)) {
        $bidData = $bids->getReverceSortedBids($_GET["auction_id"])[0];

        $winner = $users->getUserById($bidData["user_id"]);
        echo json_encode($winner);
    } else {
        $data = array("message" => "auction does'nt finish yet");
        echo json_encode($data);
    }
} else {
    header('HTTP/1.0 403 Forbidden');
    echo 'Invalid argument';
}