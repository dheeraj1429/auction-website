<?php

namespace Auction;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

require_once "auctionFunction.php";

class AuctionRoom implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;
        echo sprintf(
            'Connection %d sending message "%s" to %d other connection%s' . "\n",
            $from->resourceId,
            $msg,
            $numRecv,
            $numRecv == 1 ? '' : 's'
        );

        $messageData = json_decode($msg, true);

        if (
            array_key_exists("type", $messageData) &&
            array_key_exists("userId", $messageData) &&
            array_key_exists("email", $messageData) &&
            array_key_exists("token", $messageData) &&
            array_key_exists("auctionId", $messageData)
        ) {
            if ($messageData["type"] == "varify") {
                if (isParticepeted($messageData["email"], $messageData["auctionId"])) {
                    $from->send(
                        json_encode(
                            array(
                                "email" => $messageData["email"],
                                "confirmation" => true,
                                "type" => "varify"
                            )
                        )
                    );
                    if (!$this->isVarified($from, $messageData["token"])) {
                        setUsers($messageData["token"], $from->resourceId);
                    }
                } else {
                    $from->close();
                    $this->client->detach($from);
                }
            } else if ($messageData["type"] == "updatePrice") {
                if ($this->isVarified($from, $messageData["token"])) {
                    // if ($this->isTime($messageData["auctionId"])) {
                    $this->sendAll($messageData["token"], $messageData, $from);
                    // } else {
                    //     $from->send(json_encode(array("time_over" => true, "message" => "time is over")));
                    //     $from->close();
                    //     $this->client->delete($from);
                    // }
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    private function isTime($auctionId)
    {
        $auctionEndTime = strtotime(getAuctionData($auctionId)["end_time"]);
        $currentTime = time();
        if ($currentTime <= $auctionEndTime) {
            return true;
        }
        return false;
    }

    private function isVarified($user, $token)
    {
        $users = getAllUsers($token);
        if ($users) {
            if (in_array($user->resourceId, $users)) {
                return true;
            }
        }
        return false;
    }

    private function sendAll($token, $message, $from)
    {
        $users = getAllUsers($token);

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                if (in_array($client->resourceId, $users)) {
                    $client->send(json_encode($message));
                }
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}