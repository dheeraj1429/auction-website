<?php

require_once "base.php";


class Bids extends Base
{
    private $tableName = 'bids';

    public function read($id = null)
    {
        if ($id) {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE id = '$id'";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function create($data)
    {
        if (
            array_key_exists("user_id", $data) &&
            array_key_exists("auction_id", $data) &&
            array_key_exists("amount", $data)
        ) {
            $userId = $data["user_id"];
            $auctionId = $data["auction_id"];
            $amount = $data["amount"];
            $sql = "INSERT INTO " . $this->tableName . " (
                user_id,
                auction_id,
                amount
                ) VALUES (
                    '$userId',
                    '$auctionId',
                    '$amount'
            )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function getReverceSortedBids($auctionId)
    {
        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY amount DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update($updatedData, $id)
    {
        $keys = array_keys($updatedData);
        foreach ($keys as $key) {
            $value = $updatedData[$key];
            $sql = "UPDATE " . $this->tableName . " SET " . $key . " = " . "'$value'" . " WHERE id = '$id'";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE id = '$id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }
}