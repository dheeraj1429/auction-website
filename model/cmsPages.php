<?php
require_once "base.php";


class CMSPages extends Base
{
    private $tableName = "bnmi_cms_pages";

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
            array_key_exists("type", $data) &&
            array_key_exists("title", $data) &&
            array_key_exists("img", $data) &&
            array_key_exists("desc", $data)
        ) {
            $type = $data['type'];
            $title = $data['title'];
            $img = $data['img'];
            $desc = $data['desc'];
            $date_time = date("Y-m-d");

            $sql = "INSERT INTO " . $this->tableName . " (
                type, 
                title, 
                img, 
                `desc`, 
                date_time)
                VALUES (
                    '$type',
                    '$title',
                    '$img',
                    '$desc',
                    '$date_time'
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