<?php
require_once "registerCornJob.php";
require_once "model/participant.php";
require_once "model/auction.php";
require_once "model/cronJobs.php";
require_once "sendEmail.php";

function auctionFunction()
{
    $cronJobs = new CronJobs();
    $participant = new Participant();
    $auctionId = $cronJobs->read()[0]["id"];
    $cronJobs->updateStatus($auctionId, "unactive");
    $participantData = $participant->read($auctionId);
    $auctionModel = new Auction();
    $auctionData = $auctionModel->read($id = $auctionId)[0];

    if (count($participantData) != $auctionData["capacity"]) {
        foreach ($participantData as $p) {
            sendEmail($p["email"], "We are posponding auction");
        }
    }
    $currentAuction = $cronJobs->read()[0];

    // Register Cron job
    $registerCronJob = new RegisterCornJob();
    $registerCronJob->registerJob($currentAuction["time"]);
}

auctionFunction();