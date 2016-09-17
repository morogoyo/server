<?php 
// These are the credentials to test server 

define( "HOST", "localhost");
define( "USERNAME", "root");
define( "DATABASE", "crm");
define( "PASSWORD", "");


global $con;

$con = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);


if (!$con){
	
	echo $con->error;
	}else{
		echo "connected successfuly";
		
		}


?>