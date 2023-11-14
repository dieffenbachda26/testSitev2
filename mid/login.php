<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("connection.php");

$stmt = $connection->prepare('SELECT pass, fName, lName, auth FROM user WHERE email =:email');
$stmt->bindParam('email', $_POST['email']);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST['pass'], $result['pass'])) {
        ?>

        <head>
            <div style="background-color:tomato;">
                <title>
                    Login Successful
                </title>

                <h1 style="text-align:center;">
                    Login Successful
                </h1>
            </div>

            <!--Navigation button-->
            <div>
                <button onclick="window.location='../index.php'">Back to Home </button>
            </div>
            <hr>
        </head>

        <!--If the login creds match an entry in the DB, the variable loggedin is 
        set to true and a session email of their email is stored-->
        <?php
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['auth'] = $result['auth'];
        $_SESSION['emailTwo'] = null;
        echo 'Welcome ' . $result['fName'] . " " . $result['lName'] . '!';

    //Obligatory else clauses
    } else { ?>

        <!--Header for navigation-->
        <head>
            <div style="background-color:tomato;">
                <title>
                    Login Unsuccessful
                </title>

                <h1 style="text-align:center;">
                    Login Unsuccessful
                </h1>
            </div>

            <!--Button gives users option to try logging in again-->
            <div>
                <button onclick="window.location='../frontend/login.php'">Try Again </button>
            </div>
            <hr>
        </head>
        <?php
        echo 'Incorrect email and/or password';
    }
} else { ?>

    <head>
        <div style="background-color:tomato;">
            <title>
                Login Unsuccessful
            </title>

            <h1 style="text-align:center;">
                Login Unsuccessful
            </h1>
        </div>

        <!--Button gives users option to try logging in again-->
        <div>
            <button onclick="window.location='../frontend/login.php'">Try Again </button>
        </div>
        <hr>
    </head>
    <?php
    echo 'Incorrect email and/or password';
}
