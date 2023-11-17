<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../../mid/connection.php");

    //Line below for debugging $_POST
    //var_dump($_POST['fName']);

    $stmt = $connection->prepare('SELECT fName, lName, auth, email, phone FROM user WHERE email =:email');
    $stmt->bindParam('email', $_POST['email']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Line below for debugging $result
    //var_dump($result);

    //TODO: Add auth change if super admin

    //$query = $connection->prepare("INSERT INTO `user` (`fName`, `lName`, `email`, `phone`, `pass`, `auth`) VALUES (:fName, :lName, :email, :phone, :pass, :auth) WHERE email :=email");

    //If first name is null, it equals default value; else set it to user entry
    if($_POST['fName'] == null) {
        $fName = $result['fName'];
    } else {
       $fName = $_POST['fName'];
    }

    if($_POST['lName'] == null) {
        $lName = $result['lName'];
    } else {
       $lName = $_POST['lName'];
    }

    if($_POST['email'] == null) {
        $email = $result['email'];
    } else {
       $email = $_POST['email'];
    }

    if($_POST['phone'] == null) {
        $phone = $result['phone'];
    } else {
       $phone = $_POST['phone'];
    }

    if($_POST['auth'] == null) {
        $auth = $result['auth'];
    } else {
       $auth = $_POST['auth'];
    }

    //Line below for debugging
    var_dump($fName);
    var_dump($lName);
    var_dump($email);
    var_dump($phone);
    var_dump($auth);

    //     $query->bindParam("fName", $fName, PDO::PARAM_STR);
    //     $query->bindParam("lName", $lName, PDO::PARAM_STR);
    //     $query->bindParam("email", $email, PDO::PARAM_STR);
    //     $query->bindParam("phone", $phone, PDO::PARAM_STR);
    //     $query->bindParam("pass", $hash, PDO::PARAM_STR);
    //     $query->bindParam("auth", $auth, PDO::PARAM_STR);

    //     $result = $query->execute();

    //     header("Location: ../index.php");


}
?>