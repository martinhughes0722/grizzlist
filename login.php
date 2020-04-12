<?php
    session_start();

    if(isset($_POST['login'])) {
        include_once("db.php");
        //re hashes the password that was entered so it matches what is hashed in the database to login
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

        //creates a session for the user and brings them to the index page for their account
        if($password == $db_password) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            header("Location: index.php");
        } else {
            
            echo "You didn't enter the correct details!";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="grizzlist.css">
      <link rel="stylesheet" href="tablet.css"
          media="screen and (max-width: 900px)">
    <title>Login</title>
</head>
<body>
    <header>
        <a href="index.php"><img src="img/grizzlist2.png" alt="main page image" ></a>
    </header>
    
<main>
    <div id="index">
        <h1>Login</h1>
        <!-- form where user enters their login information, code above runs and then logs in the user or shows an error message -->
        <form action="login.php" method="post" enctype="multipart/form-data">
            <input placeholder="Username" name="username" type="text" autofocus><br><br>
            <input placeholder="Password" name="password" type="password"><br><br>
            <input name="login" type="submit" value="Login"><br><br>
        </form>     
        <p style="text-align: center;"><br>Dont have an account? Register <a href="register.php"> here</a></p>
    </div>
</main>

<footer>
copyright 2020 Grizzlist. All rights reserved.<a href="contact.html"> Contact Us</a>
</footer>
    
</body>
</html>