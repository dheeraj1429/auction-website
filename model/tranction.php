<?php
require_once "base.php";


class Transaction extends Base
{
    private $tableName = "transaction";

    public function read($userId = null)
    {
        if ($userId) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE user_id = " . $userId;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function create($data)
    {
        if (
            array_key_exists('user_id', $data) &&
            array_key_exists('orderId', $data) &&
            array_key_exists('package_id', $data) &&
            array_key_exists('status', $data) &&
            array_key_exists('payerId', $data)
        ) {
            $userId = $data['user_id'];
            $order_id = $data['orderId'];
            $package_id = $data['package_id'];
            $payer_id = $data['payerId'];
            $status = $data['status'];
            $time = date('h:i:s');
            $date = date('Y-m-d');

            $sql = "INSERT INTO " . $this->tableName . " (
                user_id, 
                package_id, 
                status,
                payer_id,
                time,
                date,
                order_id
            ) VALUES (
                '$userId',
                '$package_id',
                '$status',
                '$payer_id',
                '$time',
                '$date',
                '$order_id'
            )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function update($updatedData, $id)
    {
        // ...
    }

    public function delete($id)
    {
        // ...
    }
}