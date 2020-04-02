<?php
include_once '../listModel.php';


$List = new ListModel();
$listOfUsers = $List->getUsers();
print_r(json_encode($listOfUsers));

?>