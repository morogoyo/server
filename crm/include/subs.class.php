<?php
/*This class is to make sure that people are subscribed
to the data base like they should */


  require_once('include/connection.php');
  require_once('bootstrap.php');

 
 
 class Subscription{

  
function insert($firstName,$userName,$password,$lastName,$address,$city,$zip,$email){
global $con;
 $this->fname= $firstName  ;
 $this->lname= $lastName ;
 $this->address= $address ;
 $this->city= $city ;
 $this->zip= $zip;
 $this->email= $email ;
 $this->userName= $userName ;
 $this->password= $password ;

$sql="INSERT INTO info (fname,lname,address,city,zip,email) VALUES('{$this->fname}','{$this->lname}','{$this->address}','{$this->city}','{$this->zip}','{$this->email}') ";
 
if($con->query($sql)===TRUE){

echo "query 1 success";
}
else {
	
	echo $con->error;
	}

$sql2= "INSERT INTO userlogin (username,password) VALUES ('{$this->userName}','{$this->password}')";
$con->query($sql2);
 if($con->query($sql2)===TRUE){

echo "query 2 success";
}
else {
	
	echo $con->error;
	}



}
}
?>



