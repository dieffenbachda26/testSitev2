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
            Registration
        </title>

        <h1 style="text-align:center;">
            Account Registration
        </h1>
    </div>

    <!--Navigation button-->
    <div>
        <button onclick="window.location='../index.php'">Back to Home </button>
    </div>
    <hr>
</head>

<!--Registration section-->
<div>
    <div>

        <body>
            <b><u>Please register below:</u></b>
        </body><br><br>
    </div>

    <!--Registration input-->
    <div>
        <!--TODO: Also look into server-side validation for the fields-->
        <form action="../mid/reg.php" method="post">
            <label for="fname">First name:</label>
            <input type="text" id="fName" name="fName" placeholder="John" required><br><br>

            <label for="lname">Last name:</label>
            <input type="text" id="lName" name="lName" placeholder="Doe" required><br><br>

            <!--TODO: Fix regex, allows things like t@t to pass-->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9.-]+@[a-zA-Z]+[.][a-zA-Z]{3}$" placeholder="example@what.ever" required><br><br>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" pattern="(0-9)?\d{3}-\d{3}-\d{4}" placeholder="XXX-XXX-XXXX" required><br><br>

            <label for="pass">Password:</label>

            <!--This regex requires that the user input a password with a min length of 8, 
            at least 1 uppercase letter, 1 number, and 1 special non-alphanumeric character-->
            <input type="password" id="pass" name="pass" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$" minlength="8" required><br><br>
            <input type="submit" value="Submit" name="Submit">
        </form>
    </div>
</div>

<footer>
    <hr>
    <p>Copyright 2023</p>
</footer>

</html>