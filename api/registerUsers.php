<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once "../model/participant.php";
require_once "../redis.php";


function isParticepeted($email, $auctionId)
{
    $participant = new Participant();
    $participants = $participant->getParticipant($email, $auctionId);
    if (empty($participants)) {
        return false;
    } else {
        return true;
    }
}

$entityBody = file_get_contents('php://input');
$data = json_decode($entityBody, true);

if (array_key_exists("email", $data) && array_key_exists("userId", $data) && array_key_exists("auction_id", $data) && array_key_exists("token", $data)) {
    $email = $data["email"];
    $auctionId = $data["auction_id"];
    $token = $data["token"];
    $userId = $data["userId"];
    // $redis = new RedisConnection($token);
    if (isParticepeted($email, $auctionId)) {
        $comfirmation = json_encode(array("email" => $email, "confirmation" => true));
        // $redis->setUsers($userId);
    } else {
        $comfirmation = json_encode(array("email" => $email, "confirmation" => false));
    }
    echo $comfirmation;
} else {
    header('HTTP/1.0 403 Forbidden');
    echo "Invalid parameters";
}