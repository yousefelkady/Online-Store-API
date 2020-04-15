<?php 

include_once 'userController.php';

class OwnerController extends Controller{


    public function __construct($userName , $pass){

        parent::__construct('owner');
        $this->user->username = $userName ;
        $this->user->password = $pass ;
        $this->table_name = 'owners' ;

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