<?php

include_once 'userController.php';

abstract class User{

    public $id;
    public $username;
    public $password;
    public $type;
    public $ctrlr;
    public function login(){}
    public function signup(){}
    public function setParam(){}


}


?>