<?php
require_once "./model/auction.php";
require_once "./model/participant.php";
require_once "./redis.php";


function getAuctionData($id)
{
    $auction = new Auction();
    $auctionData = $auction->read($id = $id)[0];
    return $auctionData;
}

function setUsers($token, $user)
{
    $redis = new RedisConnection($token);
    $redis->setUsers($user);
}

function getUserCount($token)
{
    $redis = new RedisConnection($token);
    $users = $redis->getUsers();
    return count($users);
}

function getAllUsers($token)
{
    $redis = new RedisConnection($token);
    return $redis->getUsers();
}

function isParticepeted($email, $auctionId)
{
    $participant = new Participant();
    $participants = $participant->getParticipant($email, $auctionId);
    if (empty($participants)) {
        return false;
    }
    return true;
}

function validateToken($token)
{
    $redis = new RedisConnection($token);
    if ($redis->isValidToken()) {
        return true;
    }
    return false;
}

function rmUsers($token, $user)
{
    $redis = new RedisConnection($token);
    $redis->rmUser($user);
}