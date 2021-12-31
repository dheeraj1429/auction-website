<?php
require_once "./base.php";


class Blog extends Base
{
    private $tableName = "bnmi_blog";

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

    public function create($data)
    {
        if (
            array_key_exists("name", $data) &&
            array_key_exists("url", $data) &&
            array_key_exists("cat", $data) &&
            array_key_exists("short_desc", $data) &&
            array_key_exists("desc", $data) &&
            array_key_exists("img", $data) &&
            array_key_exists("post_date", $data) &&
            array_key_exists("meta_title", $data) &&
            array_key_exists("meta_keyword", $data) &&
            array_key_exists("meta_desc", $data) &&
            array_key_exists("status", $data)
        ) {
            $name = $this->preventSqlInjection($data["name"]);
            $url = $this->preventSqlInjection($data["url"]);
            $cat = $this->preventSqlInjection($data["cat"]);
            $img = $this->preventSqlInjection($data["img"]);
            $shortDesc = $this->preventSqlInjection($data["short_desc"]);
            $desc = $this->preventSqlInjection($data["desc"]);
            $postDate = $this->preventSqlInjection($data["post_date"]);
            $metaKeyword = $this->preventSqlInjection($data["meta_keyword"]);
            $metaDesc = $this->preventSqlInjection($data["meta_desc"]);
            $metaTitle = $this->preventSqlInjection($data["meta_title"]);
            $status = $this->preventSqlInjection($data["status"]);

            $sql = "INSERT INTO " . $this->tableName . " (
                name,
                url, 
                cat, 
                img, 
                short_desc, 
                desc, 
                post_date, 
                meta_title, 
                meta_keyword, 
                meta_desc, 
                status) VALUES (
                    '$name', 
                    '$url', 
                    '$cat', 
                    '$img',
                    '$shortDesc',
                    '$desc',
                    '$postDate',
                    '$metaTitle',
                    '$metaKeyword',
                    '$metaDesc',
                    '$status'
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
            $sql = "UPDATE " . $this->tableName . " SET " . $key . " = " . $value . " WHERE id = '$id'";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function delete()
    {
        // ...
    }
}