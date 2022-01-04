<?php
require_once "base.php";

class General extends Base
{
    private $tableName = "bnmi_general";

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

    public function getDataByName($name)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE key_name = '$name'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function create($data)
    {
        if (
            array_key_exists("key_name", $data) &&
            array_key_exists("key_value", $data) &&
            array_key_exists("status", $data)
        ) {
            $keyName = $data["key_name"];
            $keyValue = $data["key_value"];
            $status = $data["status"];
            $sql = "INSERT INTO " . $this->tableName . " (
                key_name,
                key_value,
                `status`
            ) VALUES ('$keyName', '$keyValue', '$status')";
            $stmt = $$this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function update($updatedData, $_key = null)
    {
        $keys = array_keys($updatedData);
        foreach ($keys as $key) {
            $value = $updatedData[$key];
            if ($_key) {
                $sql = "UPDATE " . $this->tableName . " SET " . $key . " = " . "'$value'" . " WHERE key_name = '$_key'";
            } else {
                $sql = "UPDATE " . $this->tableName . " SET " . 'key_value' . " = " . "'$value'" . " WHERE key_name = '$key'";
            }
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