<?php
   session_start();
    //checks to make sure the user has a session if not redirected to the login page
    if(!isset($_SESSION['id'])) {
        header("Location: login.php");
    }

    include_once("db.php"); 

    //makes sure at least a first and last name are entered into the database. 
    if(isset($_POST['name_first']) && isset($_POST['name_last'])){
        if($_POST['name_first'] != "" && $_POST['name_last'] != ""){
            //checks to see what the user input was and then stores that user into the dataase 
           $first = $_POST['name_first'] ;
           $last = $_POST['name_last'] ;
            $phone = $_POST['phone_num'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            // what is stored into the database 
           $sql_store = "INSERT into names (id, first, last, phone, email, address) VALUES (NULL, '$first', '$last', '$phone', '$email', '$address')" ;
           $sql = mysqli_query($db, $sql_store) or die(mysql_error());  
               header("Location:");
            //if the user was enetered correctly 
            echo "You entered '$first $last' into the database." ;
        } else {
            //if the user was not enetered properly.
        echo "you need to enter data in all boxes." ;
         }
    }  else {
        echo "you need to enter data in all boxes." ;
}    
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="grizzlist.css">
      <link rel="stylesheet" href="tablet.css"
          media="screen and (max-width: 900px)">
    <title>GrizzList</title>
</head>
<body>
   <header>
       
        <a href="index.php"><img src="img/grizzlist2.png" alt="main page image" ></a>
        <nav id="menulinks">
            <a href="showcontact.php"> <img src="img/view_contact.png"> </a>
            <a href="add.php"><img src="img/add_icon.png"></a>
            <a href="delete.php"><img src="img/delete_friend.png"></a>
            <a href="edit.php"><img src="img/edit_contact.png"></a> 
        </nav>
    </header>
<main>
    <div id ="add">
        <div id="logout">
            <a href="logout.php">Logout</a><br>
        </div>
      <h1>Add a Contact</h1>
        <form action="add.php" method="POST">
           <!-- when form is filled in and the submit button is clicked the php code above runs -->
            <input type="text" name="name_first" value="" placeholder="First Name"><br><br>
            <input type="text" name="name_last" value="" placeholder="Last Name"><br><br>
            <input type="text" name="phone_num" value="" placeholder="Phone #"><br><br>
            <input type="text" name="email" value="" placeholder="Email"><br><br>
            <input type="text" name="address" value="" placeholder="Address"><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</main>

<footer>
      copyright 2020 Grizzlist. All rights reserved.<a href="contact.html">Contact Us</a>
</footer>
</body>
</html>