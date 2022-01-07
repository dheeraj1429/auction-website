<?php
require_once "../redis.php";
require_once "../registerCornJob.php";
require_once "../model/auction.php";


function dbJob()
{
    $redis = new RedisConnection();
    $registerCornJob = new RegisterCornJob();
    $auction = new Auction();
    $currentAuction = $auction->getAuctionByTime();
    $redis->setAuction($currentAuction);
    $registerCornJob->registerJob($currentAuction[0]["time"]);
}

dbJob();