<?php

class Database
{
    private $host = "127.0.0.1:3306";
    private $database_name = "carti";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn =  null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Failed connect database" . $exception->getMessage();
        }
        return $this->conn;
    }
}
