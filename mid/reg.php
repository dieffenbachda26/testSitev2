<?php
include("connection.php");

var_dump($_POST);

if(isset($_POST['Submit'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = $connection->prepare("INSERT INTO `user` (`fName`, `lName`, `email`, `phone`, `pass`) VALUES (:fName, :lName, :email, :phone, :pass)");

    $query -> bindParam("fName", $fName, PDO::PARAM_STR);
    $query -> bindParam("lName", $lName, PDO::PARAM_STR);
    $query -> bindParam("email", $email, PDO::PARAM_STR);
    $query -> bindParam("phone", $phone, PDO::PARAM_STR);
    $query -> bindParam("pass", $pass, PDO::PARAM_STR);

    $result = $query->execute();
}
?>

Figure this shit out : 
array(6) { ["fName"]=> string(1) "j" ["lName"]=> string(1) "d" ["email"]=> string(8) "dingus@c" ["phone"]=> string(12) "434-434-4334" ["pass"]=> string(10) "dingUs51!@" ["Submit"]=> string(6) "Submit" }
Fatal error: Uncaught PDOException: SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'phone' cannot be null in C:\xampp\htdocs\testSitev2\mid\reg.php:21 Stack trace: #0 C:\xampp\htdocs\testSitev2\mid\reg.php(21): PDOStatement->execute() #1 {main} thrown in C:\xampp\htdocs\testSitev2\mid\reg.php on line 21