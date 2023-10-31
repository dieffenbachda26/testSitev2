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
        <p>I am currently logged in; T/F: </p><?php echo $_SESSION['email'] ?>
    </body>
</div><br>
<div>
    <button onclick="document.location='reg.php'">Create An Account</button>
</div><br>
<div>
    <button onclick="document.location='login.php'">Login</button>
</div><br>
<div>
    <button onclick="document.location='login.php'">User Management</button>
</div><br>

</html>