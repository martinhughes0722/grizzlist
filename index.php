<?php

   session_start();
    //checks to see if there is a session, if there isnt then it will relocate use to login screen 
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
           <!-- This is what shows the button the user can click on to do differnt things like show their contact list, add, delete and edit contacts -->
            <a href="showcontact.php"> <img style="height:200px; width: 200px;" src="img/view_contact.png"> </a>
            <a href="add.php"><img style="height:200px; width: 200px;" src="img/add_icon.png"></a>
            <a href="delete.php"><img style="height:200px; width: 200px;" src="img/delete_friend.png"></a>
            <a href="edit.php"><img style="height:200px; width: 200px;" src="img/edit_contact.png"></a>
        </nav>
    </header>
<main>
     <div id="logout">
           <!-- user can click this logout to end their session and logout -->
            <a href="logout.php">Logout</a><br>
        </div>
    </main>
 <footer>
      copyright 2020 Grizzlist. All rights reserved.<a href="contact.html">Contact Us</a>
  </footer>
    
</body>
</html>
