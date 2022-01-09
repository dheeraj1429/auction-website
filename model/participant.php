<?php
require_once "base.php";

class Participant extends Base
{
    private $tableName = 'participant';

    public function read($id = null)
    {
        if (!$id) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE auction_id = '$id'";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function create($data)
    {
        if (array_key_exists("auction_id", $data) && array_key_exists("user_id", $data)) {
            $auctionId = $data["auction_id"];
            $userId = $data["user_id"];
            $sql = "INSERT INTO " . $this->tableName . " (auction_id, user_id) VALUES ('$auctionId', '$userId')";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }
}