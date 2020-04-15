<?php 
include_once 'userController.php';

class ClientController extends Controller{


    public function __construct($userName , $pass){

        parent::__construct('client');
        $this->user->username = $userName ;
        $this->user->password = $pass ;
        $this->table_name = 'clients' ;

    }


    public function signin()
    {
        return parent::login();
    }

    public function signup()
    {
        return parent::signup();
    }


}


?>