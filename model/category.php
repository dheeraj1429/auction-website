<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/base.php";


class Category extends Base
{
    private $tableName = "bnmi_category";

    public function read($id = null)
    {
        if (!$id) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE id = $id";
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
            array_key_exists("status", $data) &&
            array_key_exists("date_time", $data)
        ) {
            $name = $data["name"];
            $status = $data["status"];
            $dateTime = $data["date_time"];
            $sql = "INSERT INTO " . $this->tableName . " (name, status, date_time) VALUES ('$name', '$status', '$dateTime')";
            $this->connection->exec($sql);
        }
    }

    public function update($updatedData, $id)
    {
        $keys = array_keys($updatedData);
        foreach ($keys as $key) {
            $value = $updatedData[$key];
            $sql = "UPDATE " . $this->tableName . " SET $key = '$value' WHERE id = '$id'";
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

    public function runCustomQuery($sql)
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}