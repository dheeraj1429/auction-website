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
    {
        $invalidChar = array("!", "?", "'", "\"", "\\", "-", "<", ">");
        $sql = str_split($sql);
        $filterSql = "";
        foreach ($sql as $s) {
            if (in_array($s, $invalidChar)) {
                $s = "\\" . $s;
            }
            $filterSql .= $s;
        }
        return $filterSql;
    }

    private function akSecureString($param)
    {
        ///remove vulnerable params...
        $param = str_replace('"', "\"", str_replace("'", '\'', str_replace('</script>', '', str_replace('<script>', '', $param))));

        return $param;
    }
}