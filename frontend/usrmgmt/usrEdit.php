<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../../mid/connection.php");

    //Line below for debugging $_POST
    //var_dump($_POST);

    $stmt = $connection->prepare('SELECT fName, lName, auth, email, phone FROM user WHERE email =:email');
    $stmt->bindParam('email', $_POST['email']);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Line below for debugging $result
    //var_dump($result);

    //TODO: Add auth change if super admin


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
            Editing User: <?php echo($result['fName'] . " " . $result['lName']);?>
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

<!--fName, lName, email, phone, auth
TODO: Add auth change if super admin
TODO: Regex for auth-->
<div>
    <form action="../../mid/usrmgmt/usrEdit.php" method="post">
        <label for="fname">First name:</label>
        <input type="text" id="fName" name="fName" placeholder="<?= $result['fName'] ?>"><br><br>

        <label for="lname">Last name:</label>
        <input type="text" id="lName" name="lName" placeholder="<?= $result['lName'] ?>"><br><br>

        <!--TODO: Fix regex, allows things like t@t to pass-->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9.-]+@[a-zA-Z]+[.][a-zA-Z]{3}$" placeholder="<?= $result['email'] ?>"><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" pattern="^(0-9)?\d{3}-\d{3}-\d{4}$" placeholder="<?= $result['phone'] ?>"><br><br>

        <?php if ($_SESSION['auth'] == 2) { ?>
            <label for="auth">Privilege Level:</label>
            <input type="text" id="auth" name="auth" pattern="^[0-2]{1}$" placeholder="<?= $result['auth'] ?>"><br><br>
        <?php } ?>

        <button type="submit" name="email" value="<?= $result['email'] ?>">Edit</button>
    </form>
</div>


</html>