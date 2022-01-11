<?php
require_once "base.php";


class Comment extends Base
{
    private $tableName = 'comments';

    public function read($blog_id)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE blog_id = '$blog_id'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function create($data)
    {
        if (
            array_key_exists('blog_id', $data) &&
            array_key_exists('comment', $data) &&
            array_key_exists('user_id', $data) &&
            array_key_exists('reply', $data)
        ) {
            $blog_id = $data['blog_id'];
            $comment = $data['comment'];
            $user_id = $data['user_id'];
            $reply = $data['reply'];
            $date = date('Y-m-d');

            $sql = "INSERT INTO " . $this->tableName . " (blog_id, comment, user_id, reply, date) VALUES 
                (
                    '$blog_id', 
                    '$comment', 
                    '$user_id', 
                    '$reply',
                    '$date'
                )";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function getReply($commentId)
    {
        $sql = "SELECT reply FROM " . $this->tableName . " WHERE id = " . $commentId;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0]["reply"];
    }

    public function setReply($commentId, $userId, $reply)
    {
        $commentReply = json_decode($this->getReply($commentId), true)["reply"];
        array_push($commentReply, array("user_id" => $userId, "reply" => $reply, "date" => date("Y-m-d")));
        $data = array("reply" => json_encode(array("reply" => $commentReply)));
        $this->update($data, $commentId);
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