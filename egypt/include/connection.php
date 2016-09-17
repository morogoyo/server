<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egypt_membership";
$conn;

// Create connection

 $conn = new mysqli($servername, $username, $password, $dbname);
 global $conn;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else{
	
	//echo "Connected to data base";
	
	}


?>
