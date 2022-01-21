<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once "../model/participant.php";
require_once "../model/auction.php";
require_once "../redis.php";

date_default_timezone_set("Asia/Kolkata");


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

    $redis = new RedisConnection($token);
    $auction = new Auction();
    $auctionData = $auction->read($id = $auctionId)[0];
    $startingTime = $auctionData["time"];
    $endTime = $auctionData["end_time"];
    $waitingTime = date("H:i:s", strtotime("+10 minutes", strtotime($startingTime)));
    $currentDate = date("Y-m-d");

    if (strtotime($currentDate) > strtotime($auctionData["date"])) {
        echo json_encode(array("message" => "Auction over", "time_over" => true, "auction_id" => $auctionId));
        die();
    }

    if (time() >= strtotime($startingTime) && $currentDate == $auctionData["date"]) {
        if (time() <= strtotime($endTime)) {
            if (isParticepeted($email, $auctionId)) {
                if (time() >= strtotime($waitingTime)) {
                    // $timeLeft = round(abs(strtotime($endTime) - strtotime(date("H:i:s"))) / 60, 2);
                    $timeLeft = strtotime($endTime);

                    $confirmation = json_encode(
                        array(
                            "email" => $email,
                            "confirmation" => true,
                            "waiting" => false,
                            "time_left" => $timeLeft,
                            "time_over" => false
                        )
                    );
                    if (!$redis->isValidToken()) {
                        $redis->createRoom();
                    }
                } else {
                    // $timeLeft = round(abs(strtotime($waitingTime) - strtotime(date("H:i:s"))) / 60, 2);
                    $timeLeft = strtotime($waitingTime);
                    $confirmation = json_encode(
                        array(
                            "email" => $email,
                            "confirmation" => true,
                            "time_left" => $timeLeft,
                            "waiting" => true,
                            "time_over" => false
                        )
                    );
                }
            } else {
                $confirmation = json_encode(array("email" => $email, "confirmation" => false));
            }
            echo $confirmation;
        } else {
            echo json_encode(array("message" => "Auction over", "time_over" => true, "auction_id" => $auctionId));
        }
    } else {
        $data = json_encode(array("message" => "Not started yet"));
        echo $data;
    }
} else {
    header('HTTP/1.0 403 Forbidden');
    echo "Invalid parameters";
}