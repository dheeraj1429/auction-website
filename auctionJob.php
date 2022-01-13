<?php
require_once "registerCornJob.php";
require_once "model/participant.php";
require_once "model/auction.php";
// require_once "model/cronJobs.php";
require_once "sendEmail.php";

function auctionFunction($token)
{
    $auctionModel = new Auction();
    // $cronJobs = new CronJobs();
    $participant = new Participant();
    $auctionData = $auctionModel->getAuctionByToken($token)["id"];
    $participantData = $participant->read($auctionData["id"]);

    if (count($participantData) != $auctionData["capacity"]) {
        foreach ($participantData as $p) {
            sendEmail($p["email"], "We are posponding auction");
        }
    } else {
        foreach ($participantData as $p) {
            sendEmail($p["email"], "We are starting the auction");
        }
    }
}

if (isset($_GET["token"])) {
    auctionFunction($_GET["token"]);
}