<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../../mid/connection.php");

    //Line below for debugging $_POST
    //var_dump($_POST);

    $stmt = $connection->prepare('SELECT ID, fName, lName, auth, email, phone FROM user WHERE email =:email');
    $stmt->bindParam('email', $_SESSION['email']);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Line below for debugging $result
    //var_dump($result);
}
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/x-icon" href="../resources/images/favicon.ico">

<!--Navigation section-->

<head>
    <div style="background-color:tomato;">
        <title>
            Account Settings
        </title>

        <h1 style="text-align:center;">
            Account Settings
        </h1>
    </div>

    <!--Navigation button-->
    <div>
        <button onclick="window.location='../../index.php'">Back to Home </button>
    </div>
    <hr>
</head>

<div>
    <form action="../../mid/usrmgmt/accSet.php" method="post">

        <label for="fname">First name:</label>
        <input type="text" id="fName" name="fName" placeholder="<?= $result['fName'] ?>" pattern="[a-zA-Z]+"><br><br>

        <label for="lname">Last name:</label>
        <input type="text" id="lName" name="lName" placeholder="<?= $result['lName'] ?>" pattern="[a-zA-Z]+"><br><br>

        <!--TODO: Fix regex, allows things like t@t to pass
            TODO: Validate that the new email isn't already in use elsewhere-->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9.-]+@[a-zA-Z]+[.][a-zA-Z]{3}$" placeholder="<?= $result['email'] ?>"><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" pattern="^(0-9)?\d{3}-\d{3}-\d{4}$" placeholder="<?= $result['phone'] ?>"><br><br>

        <!--This regex requires that the user input a password with a min length of 8, 
            at least 1 uppercase letter, 1 number, and 1 special non-alphanumeric character-->
        <label for="pass">Password:</label>
        <input type="text" id="pass" name="pass" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$"><br><br>

        <button type="submit" name="ID" value="<?= $result['ID'] ?>">Edit</button>
    </form>
</div>