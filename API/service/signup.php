<?php
 
 include_once '../packageController/clientController.php';
 include_once '../packageController/ownerController.php';
 include_once '../packageController/adminController.php';

$userType = isset($_POST['type']) ? $_POST['type'] : die();
$username = isset($_POST['username']) ? $_POST['username'] : die();
$password = isset($_POST['password']) ? $_POST['password'] : die();
$controller= null;
 

if ($userType == "client"){
    $controller= new clientController($username , $password);
}
else if ($userType == "owner"){
    $controller= new ownerController($username , $password);
}
else if ($userType == "admin"){
    $controller= new adminController($username , $password);
}


 
// create the user
if($controller->signup()){
    
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "username" => $controller->user->username
    );
}

else{
    $user_arr=array(
        "status" => false,
        "message" => "Username already exists!"
    );
}
print_r(json_encode($user_arr));
?>