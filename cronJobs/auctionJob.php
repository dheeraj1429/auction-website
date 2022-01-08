<?php
require_once "../redis.php";
require_once "../model/participant.php";
require_once "../model/auction.php";
require_once "../registerCronJob.php";
require_once "../sendEmail.php";

function auctionFunction()
{
    $redis = new RedisConnection();
    $participant = new Participant();
    $auctionId = $redis->getFirstAuction();
    $redis->rmFisrstValue($auctionId);
    $participantData = $participant->read($auctionId);
    $auctionModel = new Auction();
    $auctionData = $auctionModel->read($id = $auctionId)[0];

    if (count($participantData) != $auctionData["capacity"]) {
        foreach ($participantData as $p) {
            sendEmail($p["email"], "We are posponding auction");
        }
    }
    $auctionData = $auctionModel->getIdByTime($auctionId);

    // Register Cron job
    $registerCronJob = new RegisterCornJob();
    $registerCronJob->registerJob($auctionData["time"]);
}

auctionFunction();