<?php
$idd = $_POST['id'];
$first = $_POST['name_first'] ;
$last = $_POST['name_last'] ;
$phone = $_POST['phone_num']; 
$email = $_POST['email'];
$address = $_POST['address'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorial";
//had to create a new connection for the edit to work
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    //check to make sure a connection was made
    die("Connection failed: " . $conn->connect_error);
}
 //id the the user supplied wil be update with what they entered in the form this is what the post method is for 
$sql = "UPDATE names SET first = '$_POST[name_first] ' , last = '$_POST[name_last] ' , phone = '$_POST[phone_num] ' , email = '$_POST[email] ', address = '$_POST[address] '  WHERE id = $idd" ;

     
     //if the record is edited then this message will be displayed. 
if ($conn->query($sql) === TRUE) {
   header('location: edit-successful.php');
    echo "Record edited successfully (click back button to go back)";
} else {
    echo "Error editing record: " . $conn->error;
}

$conn->close();





?>