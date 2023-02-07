<?php
class Database
{
    public static $host = 'localhost';
    public static $dbname = 'electramaroc';
    public static $usernamedb = 'root';
    public static $passworddb = '';
    public $conn;
    public  $Username;
    public   $Password;


    public function connect()
    {
        $this->conn = new mysqli(self::$host, self::$usernamedb, self::$passworddb, self::$dbname);
    }

    public function __construct()
    {

        $this->connect();
        // mysqli_query($conn, $this->Username);
    }
}
