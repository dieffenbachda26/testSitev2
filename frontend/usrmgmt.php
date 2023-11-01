<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
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

<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . htmlspecialchars($_SESSION['username']) . "!";
} else {
    echo "Please log in first to see this page.";
}
?>