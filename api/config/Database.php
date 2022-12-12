<?php

class Database
{
    private $host = "127.0.0.1";
    private $db_name = "api_db";
    private $username = "root";
    private $password = "root";
    public $connect;

    public final function getConnection(): PDO
    {
        $this->connect = null;
        try {
            $this->connect = new PDO("mysql:host=" . $this->host . "; port=3406 ;dbname="
                . $this->db_name, $this->username, $this->password);
            $this->connect->exec("set names utf-8");
        } catch (PDOException $exception) {
            echo "Connection error!" . $exception->getMessage();
        }
        return $this->connect;
    }

}

?>