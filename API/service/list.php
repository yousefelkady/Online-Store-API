<?php
include_once '../packageController/adminController.php';

$id = isset($_POST['id']) ? $_POST['id'] : die();

$controller= new adminController("","");

if ($controller->isAdmin($id)){
    $listOfUsers = $controller->list();
    print_r(json_encode($listOfUsers));
}
else {
    $user_arr=array(
        "status" => false,
        "message" => "You are Not Authorized !!",
    );
    print_r(json_encode($user_arr));
}


?>
