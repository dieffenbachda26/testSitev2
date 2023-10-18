<?php

//Definiting constants
define('USER', "root");
define('HOST', "localhost");
define('DATABASE', "testSitev2-db");
define('PASSWORD', "");

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
}

catch(PDOException $e) {
    exit("Error: ".$e->getMessage());
}

?>