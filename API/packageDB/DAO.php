<?php

include_once 'database.php';

class DAO{

    private $conn;
    private $users = array(); 

    public function __construct(){
        $database = database::getInstance();
        $db = $database->getConnection();
        $this->conn = $db;
    }



    function signup($table_name , $username , $password){

        if($this->isAlreadyExist($table_name , $username)){
            return false;
        }
        // query to insert record
        $query = "INSERT INTO
                    " . $table_name . "
                SET
                    username=:username, password=:password";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $username=htmlspecialchars(strip_tags($username));
        $password=htmlspecialchars(strip_tags($password));

        // bind values
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);

        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    
    }



    // login user
    public function login($table_name , $username , $password){

        $query = "SELECT
                `id`, `username`, `password`
            FROM
                " . $table_name . " 
            WHERE
                username='".$username."' AND password='".$password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;

    }

    
    // a function to check if username already exists
    function isAlreadyExist($table_name , $username){

        $query = "SELECT *
            FROM
                " . $table_name . " 
            WHERE
                username='".$username."'";
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



    public function getUsers(){

        $tableName =  ['admins','clients','owners'];

        for ($i=0 ; $i < 3 ; $i++){

            $users[] = $tableName[$i] ;
            $query1 = "SELECT
                    `id`, `username`, `password`
                FROM " . $tableName[$i] ;
            // prepare query statement
            $stmt = $this->conn->prepare($query1);
            // execute query
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // add each row returned into an array
                $users[] = $row;         
                // OR just echo the data:    
            }
        }
            
        return $users;
    }

}


?>