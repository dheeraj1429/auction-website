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
            $username = $this->preventSqlInjection($data["username"]);
            $email = $this->preventSqlInjection($data["email"]);
            $password = $this->preventSqlInjection($data["password"]);
            $contact = $this->preventSqlInjection($data["contact"]);
            $address = $this->preventSqlInjection($data["address"]);
            $role = $this->preventSqlInjection($data["role"]);
            $token = $this->generateToken();
            $sql = "INSERT INTO " . $this->tableName . "(
                username, 
                email, 
                password,
                contact, 
                address, 
                role, 
                token
                ) VALUES (
                    '$username', 
                    '$email', 
                    '$password', 
                    '$contact', 
                    '$address', 
                    '$role', 
                    '$token'
                    )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return true;
        }
    }

    public function update($updatedData, $email)
    {
        $keys = array_keys($updatedData);
        foreach ($keys as $key) {
            $value = $updatedData[$key];
            $sql = "UPDATE " . $this->tableName . " SET " . $key . " = " . $value . " WHERE email = $email";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    private function generateToken()
    {
        $sql = "SELECT token FROM " . $this->tableName;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $tokens = $stmt->fetchAll();
        $token = $this->getToken();

        if (in_array($token, $tokens)) {
            $this->generateToken();
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