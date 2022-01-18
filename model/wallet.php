<?php
require_once "base.php";


class Wallet extends Base
{
    private $tableName = 'wallet';

    public function read($userId)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE userId = '$userId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function create($data)
    {
        if (
            array_key_exists('user_id', $data) &&
            array_key_exists("use_type", $data) &&
            array_key_exists("token_value", $data) &&
            array_key_exists("auction_id", $data)
        ) {
            $userId = $data['user_id'];
            $useType = $data['use_type'];
            $tokenValue = $data['token_value'];
            $auctionId = $data['auction_id'];
            $date = date('Y-m-d');
            $time = date('H:i:s');
            if ($auctionId) {
                $sql = "INSERT INTO " . $this->tableName . " (
                user_id,
                use_type,
                token_value,
                `date`,
                `time`,
                auction_id
                )
                VALUES (
                    '$userId',
                    '$useType',
                    '$tokenValue',
                    '$date',
                    '$time',
                    '$auctionId'
                )";
            } else {
                $sql = "INSERT INTO " . $this->tableName . " (
                        user_id,
                        use_type,
                        token_value,
                        `date`,
                        `time`
                    )
                    VALUES (
                    '$userId',
                    '$useType',
                    '$tokenValue',
                    '$date',
                    '$time'
                )";
            }
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function getDataByUserId($userId)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE user_id = '$userId'";
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