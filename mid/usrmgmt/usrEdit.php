<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../../mid/connection.php");

    //Line below for debugging $_POST
    //var_dump($_POST['ID']);

    $stmt = $connection->prepare('SELECT ID, fName, lName, auth, email, phone FROM user WHERE ID =:ID');
    $stmt->bindParam('ID', $_POST['ID']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Line below for debugging $result
    //var_dump($result);

    //TODO: Add auth change if super admin

    $query = $connection->prepare('REPLACE INTO user (`ID`, `fName`, `lName`, `email`, `phone`, `auth`) VALUES (:ID, :fName, :lName, :email, :phone, :auth)');

    //If first name is null, it equals default value; else set it to user entry

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

    if ($_POST['auth'] == null) {
        $auth = $result['auth'];
    } else {
        $auth = $_POST['auth'];
    }

    //Line below for debugging
    // var_dump($fName);
    // var_dump($lName);
    // var_dump($email);
    // var_dump($phone);
    // var_dump($auth);

    $query->bindParam("ID", $ID, PDO::PARAM_INT);
    $query->bindParam("fName", $fName, PDO::PARAM_STR);
    $query->bindParam("lName", $lName, PDO::PARAM_STR);
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->bindParam("phone", $phone, PDO::PARAM_STR);
    $query->bindParam("auth", $auth, PDO::PARAM_STR);

    $result = $query->execute();

    header("Location: ../../frontend/usrMgmt.php");


}
?>