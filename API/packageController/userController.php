<?php
include_once '../packageUser/client.php';
include_once '../packageUser/storeOwner.php';
include_once '../packageUser/admin.php';
include_once '../packageDB/DAO.php';



class Controller{
 

    public $table_name = null ;
    public $user = null ;
    public $dao = null ;


    public function __construct($userType){
        // get database connection
        $database = database::getInstance();
        $db = $database->getConnection();
        $this->conn = $db;

        //initialize user 
        if ($userType == 'client'){
            $user = new Client();
        }
        else if ($userType == 'owner'){
            $user = new StoreOwner();
        }
        else if ($userType == 'admin'){
            $user = new Admin();
        }

        $this->dao = new DAO();
    
    }


    // signup user
    function signup(){

        return $this->dao->signup($this->table_name , $this->user->username , $this->user->password);

    }



    // login user
    public function login(){

        return $this->dao->login($this->table_name , $this->user->username , $this->user->password);

    }

    
}