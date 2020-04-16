<?php
include_once '../packageDB/DAO.php';
include_once    'login.php';

class userList
{
private $authenticationToken;
private $isLogged;



public function __construct($isLoggedIn)
{
    $isLogged = $isLoggedIn;
    
}


public function userIsLogged($theUserType) 
{
   
    if($isLogged == true && $theUserType == 'admin')
    {
        $List = new DAO();
        $listOfUsers = $List->getUsers();
        print_r(json_encode($listOfUsers));
    }
    else
    {
        $msg_arr=array(
            "status" => false,
            "message" => "Sorry you are not an admin");       
    }
    print_r(json_encode($msg_arr));

}



}


?>