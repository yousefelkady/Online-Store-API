<?php
 
 include_once '../client.php';
 include_once '../admin.php';
 include_once '../storeOwner.php';

$userType = isset($_POST['type']) ? $_POST['type'] : die();
$user = null;
 
// set ID property of user to be edited
if ($userType == "client"){
    $user = new Client();
    $user->username = isset($_POST['username']) ? $_POST['username'] : die();
    $user->password = isset($_POST['password']) ? $_POST['password'] : die();
}
else if ($userType == "owner"){
    $user = new StoreOwner();
    $user->username = isset($_POST['username']) ? $_POST['username'] : die();
    $user->password = isset($_POST['password']) ? $_POST['password'] : die();
}else if ($userType == "admin"){
    $user = new Admin();
    $user->username = isset($_POST['username']) ? $_POST['username'] : die();
    $user->password = isset($_POST['password']) ? $_POST['password'] : die();
}

$user->setParam();

 
// create the user
if($user->signup()){
    
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "username" => $user->username
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