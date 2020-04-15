<?php
include_once 'user.php';

class StoreOwner extends User {


    public function __construct(){
        $this->type = "owner";
    }
}

?>
