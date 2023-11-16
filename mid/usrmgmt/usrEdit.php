<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../../mid/connection.php");

    //Line below for debugging $_POST
    var_dump($_POST);

    $stmt = $connection->prepare('SELECT fName, lName, auth, email, phone FROM user WHERE email =:email');
    $stmt->bindParam('email', $_POST['email']);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Line below for debugging $result
    //var_dump($result);

    //TODO: Add auth change if super admin


}
?>