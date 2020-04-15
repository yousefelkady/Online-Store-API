<?php
class Database{
 

    private $host = "localhost";
    private $db_name = "mystore";
    private $username = "root";
    private $password = "";
    private static $instance = null ;
    private $conn;
 

    private function __construct(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new self();
        }
    
        return self::$instance;
    }
    
    public function getConnection(){
        return $this->conn;
    }
}
?>