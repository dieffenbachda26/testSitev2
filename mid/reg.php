<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("connection.php");

//Uncomment line below for debugging
//var_dump($_POST);

if (isset($_POST['Submit'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $query = $connection->prepare("INSERT INTO `user` (`fName`, `lName`, `email`, `phone`, `pass`) VALUES (:fName, :lName, :email, :phone, :pass)");

    $query->bindParam("fName", $fName, PDO::PARAM_STR);
    $query->bindParam("lName", $lName, PDO::PARAM_STR);
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->bindParam("phone", $phone, PDO::PARAM_STR);
    $query->bindParam("pass", $pass, PDO::PARAM_STR);

    $result = $query->execute();
}
?>