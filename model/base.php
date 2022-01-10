<?php

class Base
{
    public function __construct()
    {
        $servername = "127.0.0.1";
        $connectionStatement = "mysql:host=$servername;dbname=auction";
        $dbUsername = "root";
        $dbPassword = "";
        $this->connection = new PDO($connectionStatement, $dbUsername, $dbPassword);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->hashKey = "option";
    }

    public function preventSqlInjection($sql)
    { // ...
    }
}