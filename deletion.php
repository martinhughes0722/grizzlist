<?php
$idd = $_POST['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tutorial";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//had to recreate a new connection to get the delete function to work



// sql to delete a record
$sql = "DELETE FROM names WHERE id=$idd";
 header("Location: delete-successful.php");
//when a record is deleted correctly the user will be redirected to the delete page and that user will be deleted. 
if ($conn->query($sql) === TRUE) {
    header("Location: delete-successful.php");
    echo "Record deleted successfully (click back button to return to Grizzlist)";
} else {
    echo "Error deleting record (click back button to return to Grizzlist: " . $conn->error;
}

$conn->close();



?>