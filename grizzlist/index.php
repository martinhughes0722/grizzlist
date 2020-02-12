<?php
   session_start();
    
    if(!isset($_SESSION['id'])) {
        header("Location: login.php");
    }

    include_once("db.php"); 


    if(isset($_POST['name_first']) && isset($_POST['name_last'])){
        if($_POST['name_first'] != "" && $_POST['name_last'] != ""){
           $first = $_POST['name_first'] ;
           $last = $_POST['name_last'] ;
           $sql_store = "INSERT into names (id, first, last) VALUES (NULL, '$first', '$last')" ;
           $sql = mysqli_query($db, $sql_store) or die(mysql_error());  
            echo "You entered '$first $last' into the database." ;
        } else {
        echo "you need to enter data in both boxes." ;
         }
    }  else {
        echo "you need to enter data in both boxes." ;
}    
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="grizzlist.css">
    <title>GrizzList</title>
</head>
<body>
    <h1>GrizzList</h1>
    <a href="logout.php">Logout</a>
    <form action="index.php" method="POST">
        <input type="text" name="name_first" value="" placeholder="First Name">
        <input type="text" name="name_last" value="" placeholder="Last Name">
        <input type="submit" name="submit" value="submit">
    </form>
    
    <h2>Names:</h2>
    <table border="1" align = "center" >
        <tr>
            <th>First</th>
            <th>Last</th>
            <th></th>
        </tr>
        
        <?php
        $sql_list = "SELECT * FROM names ORDER BY first ASC";
        $results = mysqli_query($db, $sql_list) or die(mysql_error());
        $names = "";
        
        if(mysqli_num_rows($results) >0 ){
            while($row = mysqli_fetch_assoc($results)){
                $id = $row['id'];
                $first = $row['first'];
                $last = $row['last'];
                
                $names .=  "<tr><td>$first</td><td>$last</td></tr>" ;
                
            }
            echo $names ;
        }else{
            echo "there are no names in the database!";
        }
        ?>
    </table>
</body>
 <footer>
      copyright 2020 Grizzlist. All rights reserved. <a href="">FAQ</a>, <a href="contact.html">Contact Us</a>
  </footer>
</html>
