<?php
    session_start();

    if(isset($_POST['login'])) {
        include_once("db.php");
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $username = stripslashes($username);
        $password = stripslashes($password);
        
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db, $password);

         $password = md5($password);
         
        
        
        //Query the row and get that row password by matching input username
        $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $query = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($query);
        $id = $row['id'];
        $db_password = $row['password'];

        //Compare input password and from querired above

        
        if($password == $db_password) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            header("Location: index.php");
        } else {
            echo "You didn't enter the correct details!";
        }
    }
?>

<html>
<head>
   <link rel="stylesheet" type="text/css" href="grizzlist.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post" enctype="multipart/form-data">
        <input placeholder="Username" name="username" type="text" autofocus>
        <input placeholder="Password" name="password" type="password">
        <input name="login" type="submit" value="Login">
    </form>
    Dont have an account? Register <a href="register.php"> here</a>!
    
</body>
 <footer>
      copyright 2020 Grizzlist. All rights reserved. <a href="">FAQ</a>, <a href="contact.html">Contact Us</a>
  </footer>
</html>