<?php
include("connection.php");

if ($stmt = $con->prepare('SELECT id, pass FROM user WHERE email = ?')) {
    $stmt->bind_Param('s', $_POST['email']);
    
    $stmt->execute();
    
    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $stmt->bind_results($id, $pass);
        $stmt->fetch();

        if (password_verify($_POST['pass'], $pass)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['email'];
            $_SESSION['id'] = $id;
            echo 'Welcome ' . $_SESSION['email'] . '!';
        }
    } else {
        echo 'Incorrect username and/or password';
    } 
} else {
    echo 'Infocorrect username and/or password';

    $stmt->close();
}
?>
