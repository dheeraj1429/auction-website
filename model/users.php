<?php
require_once "base.php";

class Users extends Base
{
    private $tableName = 'users';

    public function read($userEmail = null)
    {
        if ($userEmail) {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE email = '$userEmail'";
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

    public function getUserByToken($token)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0];
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE id = '$id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0];
    }

    public function updateBidToken($action, $tokenValue, $userId)
    {
        $totalTokens = $this->getUserById($userId)["bid_token"];
        if ($action == "add") {
            $totalTokens += $tokenValue;
        } else if ($action == "remove") {
            $totalTokens -= $tokenValue;
        }

        if ($totalTokens >= 0) {
            $this->update(array("bid_token" => $totalTokens), $userId);
        } else {
            throw new Exception("You Don't have enough token");
        }
    }

    public function create($data)
    {
        if (
            array_key_exists("username", $data) &&
            array_key_exists("password", $data) &&
            array_key_exists("email", $data) &&
            array_key_exists("contact", $data) &&
            array_key_exists("address", $data) &&
            array_key_exists("role", $data)
        ) {
            $username = $data["username"];
            $email = $data["email"];
            $password = hash("sha512", $data["password"]);
            $contact = $data["contact"];
            $address = $data["address"];
            $role = $data["role"];
            $status = $data["status"];
            $token = $this->generateToken();
            $sql = "INSERT INTO " . $this->tableName . "(
                username, 
                email, 
                password,
                contact, 
                address, 
                role, 
                token,
                status
                ) VALUES (
                    '$username', 
                    '$email', 
                    '$password', 
                    '$contact', 
                    '$address', 
                    '$role', 
                    '$token',
                    '$status'
                    )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return true;
        }
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

    private function generateToken()
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
}
