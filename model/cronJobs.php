<?php
require_once "base.php";


class CronJobs extends Base
{
    private $tableName = "CronJobs";

    public function read()
    {

        $sql = "SELECT * FROM " . $this->tableName . " 
          WHERE status = 'active'   ORDER BY 'time' ASC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public function create($data)
    {
        if (array_key_exists("auction_id", $data) && array_key_exists("time", $data)) {
            $auctionId = $data["auction_id"];
            $time = $data["time"];
            $status = "active";
            $sql = "INSERT INTO " . $this->tableName . " (auction_id, time, status) VALUES ('$auctionId', '$time', '$status')";
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

    public function updateStatus($auctionId, $status)
    {
        $sql = "UPDATE " . $this->tableName . " SET " . "status = '$status' WHERE auction_id = '$auctionId'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }

    public function delete()
    {
        $sql = "TRUNCATE TABLE " . $this->tableName;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }
}