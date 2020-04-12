<?php
if(isset($_SESSION['id'])){
    header("Location: index.php");
}
//if information is put into register an account then 
if(isset($_POST['register'])){
    //connects to database
    include_once("db.php");
    //this is the proccess of hashing out the password so when looking in the database peoples passwords do not show. 
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $password_confirm = strip_tags($_POST['password_confirm']);
        $email = strip_tags($_POST['email']);

        $username = stripslashes($username);
        $password = stripslashes($password);
        $password_confirm = stripslashes($password_confirm);
        $email = stripslashes($email);
        
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db, $password);
        $password_confirm = mysqli_real_escape_string($db, $password_confirm);
        $email = mysqli_real_escape_string($db, $email);
    
    
        $password = md5($password);
        $password_confirm = md5($password_confirm);
    //code to store a users account information in the database
        $sql_store = "INSERT into users (username, password, email) VALUES ('$username','$password','$email')";
        $sql_fetch_username = "SELECT username FROM users WHERE username = '$username'" ;
        $sql_fetch_email = "SELECT email FROM users WHERE email = '$email'" ;
    
        $query_username = mysqli_query($db,$sql_fetch_username);
        $query_email = mysqli_query($db,$sql_fetch_email);
    //all errorchecking when creating an account
    
    //check to see if there is a user with that name already
    if(mysqli_num_rows($query_username)){
        echo "there is already a user with that name!" ;
        return;
    }
    //check to make sure a username is entered 
    if($username == ""){
        echo "Please insert a username";
        return;
    }
    //check to makesure a password is entered 
    if($password == "" || $password_confirm == ""){
        echo "Please insert your password";
        return;
    }
    //checks to make sure the two passwords that were enetered are the same 
    if($password != $password_confirm){
        echo "the passwords do not match";
        return;
        
    }
    
    //makes sure a valid email with an @ sign is entered
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email= ""){
        echo "this email is not valid";
        return;
    }
    //makes sure there are no two same emails in the database 
    if(mysqli_num_rows($query_email)){
        echo "that email is already in use";
        return;
    }
    //stores the user in the database and redirects to index page. 
    mysqli_query($db, $sql_store);
    header("Location: index.php");
    
}

?>


<!-- html code (what the user sees) -->
<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="grizzlist.css">
          <link rel="stylesheet" href="tablet.css"
          media="screen and (max-width: 900px)">
        <title>Create Account</title>
    </head>
<body>
    <header>
        <a href="index.php"><img src="img/grizzlist2.png" alt="main page image" ></a>
    </header>
<main>
<div id= "account">
    <h1>Create an account</h1>
       <!-- form to create an account, runs php code above when submit button is clicked -->
        <form action="register.php" method="post" enctype="multipart/form-data">
            <input placeholder="Username" name="username" type="text" autofocus><br>
            <input placeholder="Password" name="password" type="password"><br>
            <input placeholder="Confirm Password" name="password_confirm" type="password"><br>
            <input placeholder="E-Mail Address" name="email" type="text"><br><br>
            <input name="register" type="submit" value="Register"><br>
        </form>
    <p style="text-align: center;">Already have an account? Login <a href="login.php"> here</a></p>
    </div>
</main>
<footer>
      copyright 2020 Grizzlist. All rights reserved. <a href="contact.html">Contact Us</a>
</footer>
</body>
</html>