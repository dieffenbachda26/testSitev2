<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
        <button onclick="window.location='../index.php'">Back to Home </button>
    </div>
    <hr>
</head>