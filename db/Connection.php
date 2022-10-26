<?php

class Connection
{
    private $host = "localhost";
    private $db_name = "gcsonia";
    private $username = "root";
    private $password = "";
    public static $pdoo = null;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->pdo->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }

    public static function getConnection()
    {

        if (is_null(self::$pdoo))
            self::$pdoo = new Connection();
        return self::$pdoo;
    }

    public function getpdo()
    {
        return $this->pdo;
    }
}


?>