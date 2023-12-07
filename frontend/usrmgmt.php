<?php

include("../header.php");

$stmt = $connection->prepare('SELECT fName, lName, email, phone, auth FROM user WHERE email != :email');
$stmt->bindParam('email', $_SESSION['email']);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = count($result) + 1;

//Debugging lines below dump all table entires and then echo the amount of records found (adding 1 for an accurate count)
// var_dump($result);
// die();
//echo count($result) + 1;
?>

<!DOCTYPE html>
<html>

<body>

    <title>
        User Management Home
    </title>

    <!--Navigation header-->
    <div>
        <!--Page header for navigation-->
        <div class="navigationHeader">User Management Home</div>

        <div>
            <button onclick="window.location='../index.php'">Back to Home </button>
        </div>
    </div>
    <hr>

    <div class=".form">
        <?php if ($_SESSION['loggedin'] == true) {
            echo "Welcome to the user management home page."; ?><br><br>
    </div>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>User Type</th>
            <th></th>
            <th></th>
        </tr>

        <?php
            $authStr;
            foreach ($result as $user) {
                switch ($user['auth']) {
                    case 0:
                        $authStr = 'User';
                        break;
                    case 1:
                        $authStr = 'Admin';
                        break;
                    case 2:
                        $authStr = 'SuperAdmin';
                        break;
                } ?>
            <tr>
                <td><?= $user['fName'] ?></td>
                <td><?= $user['lName'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $authStr ?></td>
                <?php if ($_SESSION['auth'] == 1 || $_SESSION['auth'] == 2) { ?>
                    <form action="./usrmgmt/usrEdit.php" method="post">
                        <td><button type="submit" value="<?= $user['email'] ?>" name="email">Edit</button></td><?php } ?>
                    </form>
                    <?php if ($_SESSION['auth'] == 2) { ?>
                        <form action="./usrmgmt/usrRm.php" method="post">
                            <td><button type="submit" value="<?= $user['email'] ?>" name="email">Delete</button></td><?php } ?>
                        </form>
            </tr>
        <?php } ?>
        <!--Try posting the table row by clicking on either button, SEE IF IT WORKS-->

    <?php } else {
            echo "Please log in first to see this page.";
    ?><br><br><button onclick="document.location='login.php'">Login</button>
    <?php
        }
    ?>
</body>

</html>