<?php

require_once "base.php";


class AuthToken extends Base
{
    private $tableName = "authTokens";

    public function read($token)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function varify($token)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            $expireTime = strtotime($result[0]["expire_time"]);
            $currentTime = strtotime(date("H:i:s"));
            if ($currentTime <= $expireTime) {
                return true;
            }
        }
        return false;
    }

    public function create($data)
    {
        if (array_key_exists("token", $data) && array_key_exists("email", $data)) {
            $token = $data["token"];
            $email = $data["email"];
            $currentTime = date("H:i:s");
            $expireTime = date('H:i:s', strtotime($currentTime . ' +5 minutes'));
            $sql = "INSERT INTO " . $this->tableName . " (
                token,
                email,
                generate_time, 
                expire_time
                ) VALUES (
                '$token',
                '$email',
                '$currentTime',
                '$expireTime'
            )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function delete($token)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }
}