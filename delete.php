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
            <a href="showcontact.php"> <img src="img/view_contact.png"> </a>
            <a href="add.php"><img src="img/add_icon.png"></a>
            <a href="delete.php"><img src="img/delete_friend.png"></a>
            <a href="edit.php"><img src="img/edit_contact.png"></a> 
        </nav>
    </header>
<main>
    <div id ="delete">
        <div id="logout">
            <a href="logout.php">Logout</a><br>
        </div>
        <h1>Delete a Contact</h1>  
        <!-- form to delete a contact, when sumbit button is clicked the php code on deletion.php will run and delete the contact -->  
        <form action="deletion.php" method="post">
            <h2>Delete by ID</h2>
                ID no: <input type="text" name="id" maxlength="20">
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</main>

    <footer>
        copyright 2020 Grizzlist. All rights reserved.<a href="contact.html">Contact Us</a>
    </footer>
</body>
</html>