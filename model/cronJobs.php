<?php
require_once "base.php";


class CronJobs extends Base
{
    private $tableName = "CronJobs";

    public function read()
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE status = 'active'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public function create($data)
    {
        if (array_key_exists("token", $data) && array_key_exists("time", $data) && array_key_exists("date", $data)) {
            $token = $data["token"];
            $time = $data["time"];
            $date = $data["date"];
            $status = "active";
            $sql = "INSERT INTO " . $this->tableName . " (token, time, date, status) VALUES ('$token', '$time', '$date', '$status')";
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

    public function updateStatus($token, $status)
    {
        $sql = "UPDATE " . $this->tableName . " SET " . "status = '$status' WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }

    public function delete($token)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE token = '$token'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }
}