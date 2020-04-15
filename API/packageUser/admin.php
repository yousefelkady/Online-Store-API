<?php
include_once 'user.php';

class Admin extends User {


    public function __construct(){
        $this->type = "admin";
    }

}

?>
