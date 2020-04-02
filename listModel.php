<?php

include_once 'database.php';

class ListModel{

    private $conn;
    private $users = array(); 

    public function __construct(){
        $database = database::getInstance();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    public function getUsers(){

        $users[] = 'clients' ;

        $query1 = "SELECT
                `id`, `username`, `password`
            FROM
                 clients ";

        // prepare query statement
        $stmt = $this->conn->prepare($query1);
        // execute query
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // add each row returned into an array
            $users[] = $row;         
            // OR just echo the data:    
          }

        $users[] = 'owners' ;

        $query2 = "SELECT
                `id`, `username`, `password`
            FROM
                owners ";

        // prepare query statement
        $stmt = $this->conn->prepare($query2);
        // execute query
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // add each row returned into an array
            $users[] = $row;         
            // OR just echo the data:    
            }
        
        return $users;
    }

}


?>