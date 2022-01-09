<?php
require_once "registerCornJob.php";
require_once "model/auction.php";
require_once "model/cronJobs.php";


function dbJob()
{
    $registerCornJob = new RegisterCornJob();
    $auction = new Auction();
    $currentAuction = $auction->getAuctionByTime();
    if (!empty($currentAuction)) {
        $cronJobs = new CronJobs();
        $cronJobs->delete();
        foreach ($currentAuction as $auction) {
            $auctionData = array("auction_id" => $auction['id'], "time" => $auction['time']);
            $cronJobs->create($auctionData);
        }
        $registerCornJob->registerJob($currentAuction[0]["time"]);
    }
}

dbJob();