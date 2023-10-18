<?php
//TODO: Change connection.php file location later
include("../frontend/connection.php");

var_dump($_POST);

//TODO: Refactor variables to make consistent w/ camel case & get data processing down
if(isset($_POST['Submit'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];

    $query = $connection->prepare("INSERT INTO `user` (`fName`, `lName`, `Email`, `Phone`) VALUES (:fName, :lName, :Email, :Phone)");

    $query -> bindParam("fName", $fName, PDO::PARAM_STR);
    $query -> bindParam("lName", $lName, PDO::PARAM_STR);
    $query -> bindParam("Email", $Email, PDO::PARAM_STR);
    $query -> bindParam("Phone", $Phone, PDO::PARAM_STR);

    $result = $query->execute();
}
?>