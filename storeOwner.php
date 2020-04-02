<?php
include_once 'user.php';
include_once 'userController.php';

class StoreOwner extends User {


    public function __construct(){
        $this->ctrlr = new Controller();
        $this->type = "owner";
    }

    public function setParam(){
        $this->ctrlr->table_name = "owners";
        $this->ctrlr->username = $this->username;
        $this->ctrlr->password = $this->password;
    }

    public function signup(){
        return $this->ctrlr->signup();
    }

    public function login(){
        return $this->ctrlr->login();
    }


}

?>
