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
        if (array_key_exists("price", $data) && array_key_exists("clicks", $data) && array_key_exists("category", $data)) {
            $price = $data["price"];
            $clicks = $data["clicks"];
            $category = $data["category"];
            $sql = "INSERT INTO " . $this->tableName . " (price, clicks, category) VALUES ('$price', '$clicks', '$category')";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function getVIPTokens()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE category = '1'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getStandardTokens()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE category = '0'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update($updateddata, $id)
    {
        $keys = array_keys($updateddata);
        foreach ($keys as $key) {
            $value = $updateddata[$key];
            $sql = "update " . $this->tablename . " set " . $key . " = " . "'$value'" . " where id = '$id'";
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