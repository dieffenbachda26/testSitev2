<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../../mid/connection.php");

    //Line below for debugging $_POST
    //var_dump($_POST);

    $stmt = $connection->prepare('SELECT ID, fName, lName, auth, email, phone FROM user WHERE email =:email');
    $stmt->bindParam('email', $_POST['email']);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Line below for debugging $result
    //var_dump($result);
}
?>

<!DOCTYPE html>
<html>

<!--Navigation section-->

<head>
    <div style="background-color:tomato;">
        <title>
            Editing User
        </title>

        <h1 style="text-align:center;">
            Editing User:
            <?php echo ($result['fName'] . " " . $result['lName']); ?>
        </h1>
    </div>

    <!--Navigation buttons-->
    <div>
        <button onclick="window.location='../../index.php'">Back to Home </button><br><br>
    </div>

    <div>
        <button onclick="window.location='../usrmgmt.php'">Back to User Management </button>
    </div>
    <hr>
</head>

<!--User deletion prompt-->
<p>If you are sure you want to delete this user, click the confirm button. Otherwise choose a navigation button above.</p>
<form action="../../mid/usrmgmt/usrRm.php" method="post">
    <button type="submit" name="ID" value="<?= $result['ID']?>">Confirm</button>