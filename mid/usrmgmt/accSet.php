<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../../mid/connection.php");

    //Line below for debugging $_POST
    //var_dump($_POST['ID']);

    $stmt = $connection->prepare('SELECT ID, fName, lName, email, phone, pass FROM user WHERE ID =:ID');
    $stmt->bindParam('ID', $_POST['ID']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Line below for debugging $result
    // var_dump($result);

    $query = $connection->prepare('REPLACE INTO user (`ID`, `fName`, `lName`, `email`, `phone`, `pass`) VALUES (:ID, :fName, :lName, :email, :phone, :pass)');

    //If first name is null, it equals default value; else set it to user entry; same for rest of fields except ID which can't be changed

    $ID = $_POST['ID'];

    if ($_POST['fName'] == null) {
        $fName = $result['fName'];
    } else {
        $fName = $_POST['fName'];
    }

    if ($_POST['lName'] == null) {
        $lName = $result['lName'];
    } else {
        $lName = $_POST['lName'];
    }

    if ($_POST['email'] == null) {
        $email = $result['email'];
    } else {
        $email = $_POST['email'];
    }

    if ($_POST['phone'] == null) {
        $phone = $result['phone'];
    } else {
        $phone = $_POST['phone'];
    }

    if ($_POST['pass'] == null) {
        $pass = $result['pass'];
    } else {
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    }

    //Line below for debugging
    // var_dump($fName);
    // var_dump($lName);
    // var_dump($email);
    // var_dump($phone);
    // var_dump($pass);

    $query->bindParam("ID", $ID, PDO::PARAM_INT);
    $query->bindParam("fName", $fName, PDO::PARAM_STR);
    $query->bindParam("lName", $lName, PDO::PARAM_STR);
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->bindParam("phone", $phone, PDO::PARAM_STR);
    $query->bindParam("pass", $pass, PDO::PARAM_STR);

    $result = $query->execute();

    header('Refresh: 5; URL="../../frontend/usrmgmt/accSet.php"');

    echo("Account information successfully updated");

}
?>