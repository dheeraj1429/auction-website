<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../redis.php";
require_once "../model/users.php";
require_once "../model/participant.php";


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

function cmp($a, $b)
{
    if ($a["amount"] == $b["amount"]) {
        return 0;
    }
    return ($a["amount"] < $b["amount"]) ? -1 : 1;
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET["token"]) && isset($_GET["email"]) && isset($_GET["id"])) {
        $token = $_GET["token"];
        $email = $_GET["email"];
        $id = $_GET["id"];

        if (isParticepeted($email, $id)) {
            $redis = new RedisConnection($token);
            $data = $redis->getAuctions($token);
            usort($data, "cmp");
            $updateValue = json_encode($data[count($data) - 1]);
            echo $updateValue;
        } else {
            header('HTTP/1.0 403 Forbidden');
            echo "You don't have permission to participate";
            die();
        }
    } else {
        header('HTTP/1.0 403 Forbidden');
        echo 'You are forbidden!';
        die();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entityBody = file_get_contents('php://input');
    $data = json_decode($entityBody, true);
    if (array_key_exists('token', $data) && array_key_exists('auction_id', $data) && array_key_exists('id', $data) && array_key_exists('amount', $data) && array_key_exists('email', $data)) {
        $token = $data['token'];
        $id = $data['id'];
        $amount = $data['amount'];
        $email = $data['email'];
        $auctionId = $data['auction_id'];

        if (isParticepeted($email, $auctionId)) {
            $data = array("user_id" => $id, "amount" => $amount, "email" => $email);
            $redis = new RedisConnection($token);
            $users = new Users();
            try {
                $users->updateBidToken("remove", $amount, $id);
            } catch (Exception $e) {
                header('HTTP/1.0 403 Forbidden');
                echo json_encode(array("error" => "You Don't have enough token"));
                die();
            }
            $redis->setAuction($data);
            echo json_encode(array("success" => true));
        } else {
            header('HTTP/1.0 403 Forbidden');
            echo "You don't have permission to participate";
            die();
        }
    } else {
        header('HTTP/1.0 403 Forbidden');
        echo 'You are forbidden!';
        die();
    }
}
