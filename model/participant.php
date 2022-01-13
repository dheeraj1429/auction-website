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
        if (array_key_exists("auction_id", $data) && array_key_exists("user_email", $data)) {
            $auctionId = $data["auction_id"];
            $email = $data["user_email"];
            $sql = "INSERT INTO " . $this->tableName . " (auction_id, email) VALUES ('$auctionId', '$email')";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }
}