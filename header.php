<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/testSitev2/style.css">
</head>

</html>

<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("mid/connection.php")
?>