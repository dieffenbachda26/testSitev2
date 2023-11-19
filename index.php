<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        $_SESSION['loggedin'] = null;
    } else {
    }
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

    <!--Logged in indicator-->
    <div>
        <?php if ($_SESSION['loggedin'] == true) { ?>
            <p>Currently logged in as :
                <?php echo $_SESSION['email'] ?>
            </p>
        <?php } ?>
    </div>

    <!--User account management buttons (REGISTER/LOGIN/MGMT)-->
    <div>
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
                <button onclick="document.location='frontend/usrMgmt.php'">User Management</button>
            <?php } ?>
        </div><br>
    </div>
    <hr>
</head>

<!--WEBSITE BODY CONTENTS-->
<div>

    <!--VMI WEBCAM LIVE FEED FROM MOODY HALL-->
    <h1 style="text-align: center;"><u> LIVE VMI WEBCAM </u></h1>
    <img style="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 25%);"
        src="http://144.75.184.14/cgi-bin/encoder?USER=public&amp;PWD=viewvideo&amp;GET_STREAM">
    <p style="text-align: center;"><i>"For when you need to know its still standing"</i></p>
</div>

</html>