<?php
 
$conn; 

	
function connection(){

$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "joomla_2015";// will have to be changed to accomodate new data base

// Create connection globaly used
 //$Globals->conn = $conn ;

 global $conn;
 $conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br/>";
  return $conn;
}
?>