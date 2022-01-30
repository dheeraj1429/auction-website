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

    public function getBidByAuctionId($auctionId)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE auction_id = '$auctionId' ORDER BY amount DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getOldBid($userId, $auctionId)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE user_id = '$userId' AND auction_id = '$auctionId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            return $result[0];
        }
        return null;
    }

    public function getReverceSortedBids($auctionId)
    {
        // SELECT * FROM bids JOIN users ON bids.user_id = users.id WHERE auction_id = 8 ORDER BY amount DESC;
        $sql = "SELECT * FROM " . $this->tableName . " JOIN users ON bids.user_id = users.id WHERE auction_id = '$auctionId' ORDER BY amount DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getUserBid($userId)
    {
        $sql = "SELECT * FROM " . $this->tableName . " JOIN auction ON bids.auction_id = auction.id WHERE user_id = '$userId'";
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

    public function getWinnerBid($auctionId)
    {
        $sql = "SELECT * FROM " . $this->tableName . " JOIN users ON users.id = bids.user_id  WHERE auction_id = '$auctionId' ORDER BY amount DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE id = '$id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }
}
