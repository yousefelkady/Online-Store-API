<?php
// include object files
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



// read the details of controllerto be edited
$stmt = $controller->signin();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Login!",
        "id" => $row['id'],
        "username" => $row['username'],
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Username or Password!",
    );
}
// make it json format
print_r(json_encode($user_arr));
?>