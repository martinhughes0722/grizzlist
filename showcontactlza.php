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
    <div id ="contactshow">
        <div id="logout">
            <a href="logout.php">Logout</a><br>
        </div>
        <h1>Contact List</h1>
       <a href="showcontact.php">Order by firstname (A-Z)</a>,<a href="showcontactfza.php">Order by firstname (Z-A)</a>,<a href="showcontactl.php">Order by lastname (A-Z)</a> 
        <div style= "overflow-x:auto;">
        <table>
            <tr>
                <th>Id</th>
                <th>First</th>
                <th>Last</th>
                <th>Phone #</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
        
            <?php
            //same as show contact just a different way of listing the users is the variable "$sql_list"
            $sql_list = "SELECT * FROM names ORDER BY last DESC";
            $results = mysqli_query($db, $sql_list) or die(mysql_error());
            $names = "";
        
            if(mysqli_num_rows($results) >0 ){
                //loops through to dispay users in database
                while($row = mysqli_fetch_assoc($results)){
                    $id = $row['id'];
                    $first = $row['first'];
                    $last = $row['last'];
                    $phone = $row['phone'] ;
                    $email = $row['email'] ;
                    $address = $row['address'] ;
                
                    $names .=  "<tr><td>$id</td><td>$first</td><td>$last</td><td>$phone</td><td>$email</td><td>$address</td></tr>" ;
                
                }
                echo $names ;
            }else{
                echo "there are no names in the database!";
            }
            ?>
        </table>
            </div>
    </div>
</main>
 <footer>
      copyright 2020 Grizzlist. All rights reserved.<a href="contact.html">Contact Us</a>
  </footer>
</body>
</html>