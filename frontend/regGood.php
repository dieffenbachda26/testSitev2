<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Registration page for website
    </title>
</head>

<div>
    <h1>
        Success!
    </h1>
    <hr>
</div>

<!--Have the webpage automatically redirect the user to the home screen-->
<div>

    <body>
        Congratulations, you are now registered. You will be redirected to the homescreen in X seconds.
        From there you can log into yor account.
    </body>
</div>
<br>
<div>

</div>

</html>