<?php

$localhost = 'localhost';
$username = 'hondacus_mega';
$password = 'perdon1979';
$database = 'hondacus_logger';

global $dbconnect;


$dbconnect = new mysqli($localhost, $username, $password, $database);

if (!$dbconnect) {

    die("Connection failed: " .$dbconnect->connect_error);

}else{

echo "Connected successfully";


}


?>