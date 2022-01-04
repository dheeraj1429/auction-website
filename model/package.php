<?php

require_once "base.php";


class Package extends Base
{
    private $tableName = 'package';

    public function read($id = null)
    {
        if ($id) {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE id='$id'";
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
        if (array_key_exists("price", $data) && array_key_exists("clicks", $data)) {
            $price = $data["price"];
            $clicks = $data["clicks"];
            $sql = "INSERT INTO " . $this->tableName . " (price, clicks) VALUES ('$price', $clicks)";
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