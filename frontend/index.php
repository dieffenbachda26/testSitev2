<?php session_start() ?>
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
        <p>I am currently logged in; T/F: </p><?php $_SESSION['name'] ?>

    </body>
</div>
<br>
<div>
    <button onclick="document.location='reg.html'">Create An Account</button>
</div><br>
<div>
    <button onclick="document.location='login.html'">Login</button>
</div><br>
<div>
    <button onclick="document.location='../resources/misc/fun.html'" background: transparent; border: none !important; font-size:0;></button>
    <!--Fix visibility-->
</div>

</html>