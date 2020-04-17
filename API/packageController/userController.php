<?php
include_once '../packageUser/client.php';
include_once '../packageUser/storeOwner.php';
include_once '../packageUser/admin.php';
include_once '../packageDB/DAO.php';



class Controller{
 

    public $table_name = null ;
    public $user = null ;
    public $dao = null ;
    public $type ;


    public function __construct($userType){

        $this->type = $userType ;
        
        //initialize user 
        if ($this->type == 'client'){
            $user = new Client();
        }
        else if ($this->type == 'owner'){
            $user = new StoreOwner();
        }
        else if ($this->type == 'admin'){
            $user = new Admin();
        }

        $this->dao = new DAO($this->type);
    
    }


    // signup user
    function signup(){

        return $this->dao->signup($this->user->username , $this->user->password);

    }



    // login user
    public function login(){

        return $this->dao->login($this->user->username , $this->user->password);

    }

    
}