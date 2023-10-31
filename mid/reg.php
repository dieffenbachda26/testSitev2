<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("connection.php");

//Uncomment line below for debugging
//var_dump($_POST);

if (isset($_POST['Submit'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $query = $connection->prepare("INSERT INTO `user` (`fName`, `lName`, `email`, `phone`, `pass`) VALUES (:fName, :lName, :email, :phone, :pass)");

    $query->bindParam("fName", $fName, PDO::PARAM_STR);
    $query->bindParam("lName", $lName, PDO::PARAM_STR);
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->bindParam("phone", $phone, PDO::PARAM_STR);
    $query->bindParam("pass", $pass, PDO::PARAM_STR);

    $result = $query->execute();
}
?>

<html>

<!--Page header for navigation-->
<div>

    <head>
        <div style="background-color:tomato;">
            <title>
                Registration Successful
            </title>

            <h1 style="text-align:center;">
                Registration Successful!
            </h1>
        </div>
        <hr>
        <div>
    </head>
</div>

<!--Redirect code w/ dynamic countdown-->
<div>
    <!-- TODO: Need to figure out how to get the countdown IN a line of text, would look pretty - Might need to figure out CSS styling -->

    <body>
        <div id="counter">5</div>
        <script>
            setInterval(function() {
                var div = document.querySelector("#counter");
                var count = div.textContent * 1 - 1;
                div.textContent = count;
                if (count <= 0) {
                    window.location.replace("../frontend/index.php");
                }
            }, 1000);
        </script>
    </body>
</div>

</html>