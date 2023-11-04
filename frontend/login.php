<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<!--Navigation section-->
<head>
    <div style="background-color:tomato;">
        <title>
            Login
        </title>

        <h1 style="text-align:center;">
            Account Login
        </h1>
    </div>

    <!--Navigation button-->
    <div>
        <button onclick="window.location='../index.php'">Back to Home </button>
    </div>
    <hr>
</head>

<div>
    <form action="../mid/auth.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9.@[a-zA-Z0-9-]+.[a-zA-Z0-9-]$" placeholder="example@what.ever"><br><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required><br><br>

        <input type="submit" value="Login" name="Submit">
    </form>
</div>


</html>