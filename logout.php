<?php
    session_start();
    session_destroy();
?>


<!-- This destroys the php session and logs the user out and brings them back to the login page -->

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <meta http-equiv="refresh" content="1;url=login.php" /s>
    </body>
</html>