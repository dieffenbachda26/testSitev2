<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../mid/connection.php");

    $stmt = $connection->prepare('SELECT fName, lName, email, phone, auth FROM user WHERE email != :email');
    $stmt->bindParam('email', $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = count($result) + 1;

    //Debugging lines below dump all table entires and then echo the amount of records found (adding 1 for an accurate count)
    // var_dump($result);
    // die();
    //echo count($result) + 1;
}
?>

<!DOCTYPE html>
<html>

<!--Page header for navigation-->
<div>

    <head>
        <div style="background-color:tomato;">
            <title>
                User Management Home
            </title>

            <h1 style="text-align:center;">
                User Management Home
            </h1>
        </div>

        <!--Navigation button-->
        <div>
            <button onclick="window.location='../index.php'">Back to Home </button>
        </div>
        <hr>
    </head>
</div>

</html>

<?php if ($_SESSION['loggedin'] == true) {
    echo "Welcome to the user management home page."; ?><br><br>

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
        <!--TODO: Switch statement that changes auth to user,admin,or superadmin-->

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
                <td>insert button</td>
                <td>insert button</td>
            </tr>
        <?php } ?>

    <?php } else {
    echo "Please log in first to see this page.";
    ?><br><br><button onclick="document.location='login.php'">Login</button>
    <?php
}
    ?>