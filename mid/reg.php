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
    $auth = '0';

    //Line below for debugging
    //echo $fName . $lName . $email . $phone . $pass;

    $stmt = $connection->prepare('SELECT COUNT(email) AS EmailCount FROM user WHERE email = :email');
    $stmt->execute(array('email' => $_POST['email']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //If the email entered is unique (var = 0), post to DB
    if ($result['EmailCount'] == 0) {
        $query = $connection->prepare("INSERT INTO `user` (`fName`, `lName`, `email`, `phone`, `pass`, `auth`) VALUES (:fName, :lName, :email, :phone, :pass, :auth)");

        $query->bindParam("fName", $fName, PDO::PARAM_STR);
        $query->bindParam("lName", $lName, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->bindParam("pass", $pass, PDO::PARAM_STR);
        $query->bindParam("auth", $auth, PDO::PARAM_STR);

        $result = $query->execute();

        header("Location: ../index.php");

    } else {
        echo 'The email you entered is not unique, please try a different one';
    }
}
?>