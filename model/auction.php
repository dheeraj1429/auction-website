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
            array_key_exists("featured_status", $data) &&
            array_key_exists("token", $data) &&
            array_key_exists("category", $data) &&
            array_key_exists("discription", $data)
        ) {
            $productName = $data['product_name'];
            $startingPrice = $data['starting_price'];
            $capacity = $data['capacity'];
            $storePrice = $data['store_price'];
            $capacity = $data['capacity'];
            $category = $data['category'];
            $discription = $data['discription'];
            $feature = $data['featured_status'];
            $date = $data['date'];
            $time = $data['time'];
            $endTime = strtotime("+20 minutes", strtotime($time));
            $endTime = date('H:i', $endTime);
            $productImg = $data['product_img'];
            $token = $data["token"];
            $sql = "INSERT INTO " . $this->tableName . " (
                product_name,
                starting_price,
                token,
                capacity,
                date,
                time,
                end_time,
                store_price,
                product_img,
                category,
                discription,
                featured_status
            ) VALUES (
                '$productName',
                '$startingPrice',
                '$token',
                '$capacity',
                '$date',
                '$time',
                '$endTime',
                '$storePrice',
                '$productImg',
                '$category',
                '$discription',
                '$feature'
            )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function getLiveAndUpcomingAuction()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE `time` > TIME(NOW()) AND `date` = DATE(NOW()) OR 
            `time` > TIME(NOW()) AND (`date` > DATE(NOW()) OR `date` = DATE(NOW()))";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getLiveAuction()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE `time` > TIME(NOW()) AND `date` = DATE(NOW())";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getFeatured()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE featured_status = 'featured'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getDealOfTheDay()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE featured_status = 'deal_of_the_day'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getPopular()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE featured_status = 'popular-auction'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getMinimumPriceAuction()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE starting_price = (SELECT MIN(starting_price) FROM " . $this->tableName . ")";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
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

    public function getCurrentAuction()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE `date` = DATE(NOW()) AND `time` >= TIME(NOW()) AND `end_time` < TIME(NOW())";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            return $result;
        }
        return null;
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
        for ($i = 0; $i < 30; $i++) {
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

    public function getCompleteAuction()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE auction.date < DATE(NOW()) OR auction.end_time < TIME(NOW())";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getCompleteAuctionONJoin()
    {
        $sql = "SELECT * FROM " . $this->tableName . "  WHERE auction.date < DATE(NOW()) OR auction.end_time < TIME(NOW())";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getAuctionByToken($token)
    {
        $sql = "SELECT * FROM `auction` WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            return $result[0];
        }
        return null;
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