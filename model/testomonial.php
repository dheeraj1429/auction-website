<?php
require_once "base.php";

class Testomonial extends Base
{
    private $tableName = "testomonial";

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
            array_key_exists("designation", $data) &&
            array_key_exists("review", $data) &&
            array_key_exists("status", $data) &&
            array_key_exists("media", $data) &&
            array_key_exists("Name", $data) &&
            array_key_exists("message", $data)
        ) {
            $designation = $data["designation"];
            $review = $data["review"];
            $name = $data["Name"];
            $status = $data["status"];
            $message = $data["message"];
            $datetime = date("Y-m-d H:i:s");
            $media = $data["media"];

            $sql = "INSERT INTO " . $this->tableName . " (
                    designation,
                    review, 
                    status, 
                    datetime, 
                    media,
                    Name,
                    message
                    ) VALUES (
                        '$designation', 
                        '$review', 
                        '$status', 
                        '$datetime', 
                        '$media',
                        '$name',
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