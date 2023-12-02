<?php
include("header.php");
?>

<html>

<body>
    <!--Page header for navigation-->
    <div>
        <title>
            Home Page
        </title>

        <div class="navigationHeader">Home Page</div>

    </div>

    <!--Logged in indicator-->
    <div>
        <?php if ($_SESSION['loggedin']) { ?>
            <p>Currently logged in as :
                <?php echo $_SESSION['email'] ?>
            </p>
        <?php } ?>
    </div>

    <!--User account management buttons (REGISTER/LOGIN/MGMT)-->
    <div class="form">

        <?php if ($_SESSION['loggedin'] == null) { ?>
            <button onclick="document.location='frontend/reg.php'">Create An Account</button>
        <?php } ?>



        <?php if ($_SESSION['loggedin'] == null) { ?>
            <button onclick="document.location='frontend/login.php'">Login</button>
        <?php } else { ?>
            <button onclick="document.location='frontend/logout.php'">Logout</button>
        <?php } ?>



        <?php if ($_SESSION['loggedin']) { ?>
            <button onclick="document.location='frontend/usrMgmt.php'">User Management</button>
            <button onclick="document.location='frontend/usrmgmt/accSet.php'">Account Settings</button>
        <?php } ?>


    </div>
    <hr>

    <!--WEBSITE BODY CONTENTS-->
    <div>

        <!--VMI WEBCAM LIVE FEED FROM MOODY HALL-->
        <p>LIVE VMI WEBCAM</p>
        <img style="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 25%);" src="http://144.75.184.14/cgi-bin/encoder?USER=public&amp;PWD=viewvideo&amp;GET_STREAM">
        <p>"For when you need to know its still standing"</p>
    </div>
</body>

</html>