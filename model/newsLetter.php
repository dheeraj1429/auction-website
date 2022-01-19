<?php

require_once "base.php";


class NewsLetter extends Base
{
    private $tableName = "newsletter";

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
        if (array_key_exists("user_id", $data) && array_key_exists("email", $data)) {
            $userId = $data["user_id"];
            $email = $data["email"];
            $sql = "INSERT INTO " . $this->tableName . " (user_id, email) VALUES ('$userId', '$email')";
            $stmt = $this->connection->prepare($sql);
            $result = $stmt->execute();
            return $result;
        }
    }

    public function getLetterByEmail($email)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE email = '$email'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0];
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
