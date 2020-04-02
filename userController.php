<?php
include_once 'database.php';

class Controller{
 

    public $conn;
    public $table_name;
    public $id;
    public $username;
    public $password;


    public function __construct(){
        // get database connection
        $database = database::getInstance();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    // signup user
    function signup(){

        if($this->isAlreadyExist()){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, password=:password";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);

        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    
    }



    // login user
    function login(){

        $query = "SELECT
                `id`, `username`, `password`
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."' AND password='".$this->password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;

    }

    
    // a function to check if username already exists
    function isAlreadyExist(){

        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
        
    }
}