<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    include("../mid/connection.php");

    $stmt = $connection->prepare('SELECT fName, lName, email, phone FROM user WHERE email != :email');
    $stmt->bindParam('email', $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    var_dump($result); 
    die();

    echo count($result);
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
        <hr>
    </head>
</div>

</html>

<?php if ($_SESSION['loggedin'] == true) {
    echo "Welcome to the user management home page."; ?> 

    <!-- <table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone Number</th>
    </tr> -->

<?php } else {
    echo "Please log in first to see this page.";
    ?><br><br><button onclick="document.location='login.php'">Login</button><?php
}
?>