<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['loggedin'] = null;
$_SESSION['email'] = null;

header("Location: ../index.php");
