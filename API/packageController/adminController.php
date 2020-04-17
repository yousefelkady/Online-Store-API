<?php 

include_once 'userController.php';

class AdminController extends Controller{


    public function __construct($userName , $pass){

        parent::__construct('admin') ;
        $this->user->username = $userName ;
        $this->user->password = $pass ;
        $this->table_name = 'admins' ;

    }


    public function signin()
    {
        return parent::login();
    }

    public function signup()
    {
        return parent::signup();
    }

    public function isAdmin($uID)
    {
        return $this->dao->isAdmin($uID);
    }

    public function list()
    {
        return $this->dao->getUsers();
    }


}


?>