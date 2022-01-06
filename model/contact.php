<?php
require_once "base.php";


class Contact extends Base
{
    private $tableName = 'contact';

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
            array_key_exists("name", $data) &&
            array_key_exists("email", $data) &&
            array_key_exists("phone_number", $data) &&
            array_key_exists("message", $data)
        ) {
            $name = $data['name'];
            $email = $data['email'];
            $phone_number = $data['phone_number'];
            $message = $data['message'];
            $sql = "INSERT INTO " . $this->tableName . " (
                name,
                email,
                phone_number,
                message
                ) VALUES (
                '$name',
                '$email',
                '$phone_number',
                '$message'
                )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
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

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE id = '$id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }
}