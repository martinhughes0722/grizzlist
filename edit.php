<?php
   session_start();
    //checks to make sure the user has a session if not redirected to the login page
    if(!isset($_SESSION['id'])) {
        header("Location: login.php");
    }

    include_once("db.php");   





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
           <!-- shows clickable images to go to differnt pages -->
            <a href="showcontact.php"> <img src="img/view_contact.png"> </a>
            <a href="add.php"><img src="img/add_icon.png"></a>
            <a href="delete.php"><img src="img/delete_friend.png"></a>
            <a href="edit.php"><img src="img/edit_contact.png"></a>
        </nav>
    </header>
 <main>
    <div id ="edit">
        <div id="logout">
            <a href="logout.php">Logout</a><br>
        </div>
        <h1>Edit a Contact</h1>
        <form action="editlist.php" method="POST">
           <!-- form the user fills out to edit the contact. After submit is clicked the code on editlist.php will run -->
            <input type="text" name="id" value="" placeholder="ID"><br><br>
            <input type="text" name="name_first" value="" placeholder="First Name"> <br><br>
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