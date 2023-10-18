<?php
//TODO: Change connection.php file location later
include("connection.php");

var_dump($_POST);

//TODO: Refactor variables to make consistent w/ camel case & get data processing down !!COMPLETED
if(isset($_POST['Submit'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = $connection->prepare("INSERT INTO `user` (`fName`, `lName`, `email`, `phone`) VALUES (:fName, :lName, :email, :phone)");

    $query -> bindParam("fName", $fName, PDO::PARAM_STR);
    $query -> bindParam("lName", $lName, PDO::PARAM_STR);
    $query -> bindParam("email", $email, PDO::PARAM_STR);
    $query -> bindParam("phone", $phone, PDO::PARAM_STR);

    $result = $query->execute();
}
?>