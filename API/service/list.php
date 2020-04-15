<?php
include_once '../packageDB/DAO.php';


$List = new DAO();
$listOfUsers = $List->getUsers();
print_r(json_encode($listOfUsers));

?>