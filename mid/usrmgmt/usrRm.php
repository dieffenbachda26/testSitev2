<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("../../mid/connection.php");

var_dump($_POST['ID']);

$query = $connection->prepare('DELETE FROM user WHERE ID =:ID');
$query->bindParam('ID', $_POST['ID']);
$query->execute();

header("Location: ../../frontend/usrMgmt.php");
?>