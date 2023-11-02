<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<!--Page header for navigation-->

<head>
    <div style="background-color:tomato;">
        <title>
            Home Page
        </title>

        <h1 style="text-align:center;">
            Home Page
        </h1>
    </div>
    <hr>
</head>


<!--TODO: Buttons for registration, logging in, and eventually user management replacing the create an account button-->
<div>

    <body>
        Please choose an option below<br><br>
        <p>I am currently logged in; T/F: </p><?php echo $_SESSION['loggedin'] ?>
    </body>
</div><br>
<div>
    <?php if ($_SESSION['loggedin'] == null) { ?>
        <button onclick="document.location='frontend/reg.php'">Create An Account</button>
    <?php } ?>
</div><br>
<div>
    <?php if ($_SESSION['loggedin'] == null) { ?>
        <button onclick="document.location='frontend/login.php'">Login</button>
    <?php } else { ?>
        <button onclick="document.location='frontend/logout.php'">Logout</button>
    <?php } ?>
</div><br>
<div>
    <?php if ($_SESSION['loggedin'] == true) { ?>
        <button onclick="document.location='frontend/usrmgmt.php'">User Management</button>
    <?php } ?>
</div><br>

</html>