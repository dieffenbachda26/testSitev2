<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

session_start();
include("connection.php");

$stmt = $connection->prepare('SELECT ID, pass FROM user WHERE email =:email');
$stmt->bindParam('email', $_POST['email']);

$stmt->execute();
//TODO: Check that emails are unique

if($stmt->rowCount() > 0) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

//Pulling pass
//        echo $result['pass'];

//        if (password_verify($_POST['pass'], $pass)) {
    if ($_POST['pass'] == $result['pass']) {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $_POST['email'];
    //    $_SESSION['ID'] = $ID;
        echo 'Welcome ' . $_SESSION['email'] . '!';
    } else {
    echo 'Incorrect email and/or password'; 
    }
} else {
    echo 'Incorrect email and/or password';
}
