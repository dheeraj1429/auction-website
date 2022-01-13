<?php
require_once "base.php";

class Auction extends Base
{
    private $tableName = 'auction';

    public function read($id = null)
    {
        if (!$id) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE id = '$id'";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function create($data)
    {
        if (
            array_key_exists("product_name", $data) &&
            array_key_exists("starting_price", $data) &&
            array_key_exists("store_price", $data) &&
            array_key_exists("capacity", $data) &&
            array_key_exists("product_img", $data) &&
            array_key_exists("date", $data) &&
            array_key_exists("time", $data) &&
            array_key_exists("token", $data)
        ) {
            $productName = $data['product_name'];
            $startingPrice = $data['starting_price'];
            $capacity = $data['capacity'];
            $storePrice = $data['store_price'];
            $capacity = $data['capacity'];
            $date = $data['date'];
            $time = $data['time'];
            $productImg = $data['product_img'];
            $token = $data["token"];
            $sql = "INSERT INTO " . $this->tableName . " (
                product_name,
                starting_price,
                token,
                capacity,
                date,
                time,
                store_price,
                product_img
            ) VALUES (
                '$productName',
                '$startingPrice',
                '$token',
                '$capacity',
                '$date',
                '$time',
                '$storePrice',
                '$productImg'
            )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function getUpcomingAuction()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE `time` > TIME(NOW()) AND (`date` > DATE(NOW()) OR `date` = DATE(NOW()))";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    private function validateToken($token)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (empty($result)) {
            return true;
        }
        return false;
    }

    public function generateToken()
    {
        $token = $this->getToken();

        if (!$this->validateToken($token)) {
            return $this->generateToken();
        }
        return $token;
    }

    private function getToken()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function update($updatedData, $id)
    {
        $keys = array_keys($updatedData);
        foreach ($keys as $key) {
            $value = $updatedData[$key];
            $sql = "UPDATE " . $this->tableName . " SET " . $key . " = " . " '$value' " . " WHERE id = '$id'";
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

    public function getAuctionByToken($token)
    {
        $sql = "SELECT * FROM `auction` WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0];
    }

    public function getIdByTime($id)
    {
        $sql = "SELECT `time` FROM auction WHERE id = '$id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0];
    }
}