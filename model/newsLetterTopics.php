<?php

require_once "base.php";


class NewsLetterTopics extends Base
{
    private $tableName = "newsletter_topics";

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
            array_key_exists("title", $data) &&
            array_key_exists("discription", $data) &&
            array_key_exists("template", $data) &&
            array_key_exists("topic", $data)
        ) {
            $title = $data["title"];
            $discription = $data["discription"];
            $template = $data["template"];
            $topic = $data["topic"];
            $sql = "INSERT INTO " . $this->tableName . " (
                title,
                discription,
                template,
                topic
            ) VALUES (
                '$title',
                '$discription',
                '$template',
                '$topic'
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