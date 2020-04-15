<?php
include_once 'user.php';

class Client extends User {

    public function __construct(){
        $this->type = "client";
    }

}

?>
