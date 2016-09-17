<?php


//$servername = "mysql407.ixwebhosting.com";
//$username = "C291024_trey";
//$password = "Beast4414";
//$dbname = "C291024_membership";
//$conn;
define( "HOST", "localhost");
define( "USERNAME", "root");
define( "DATABASE", "crm");
define( "PASSWORD", "");


global $conn;

$conn = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
// Create connection

		 //$conn = new mysqli($servername, $username, $password, $dbname);
//		 global $conn;
//		// Check connection
if ($conn->connect_error) {
    die("Connection failed Call Rene: " . $conn->connect_error);
} 

else{
	
	echo "Connected to data base";
	  
	}


?>
