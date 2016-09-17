<?php 
session_start();
 
 include('include/functions.php');
 echo "test";
login();
 
 if(!$_SESSION['loggedin']){
    loginform();  

    // if($_POST['login']){
    //  // need to retrive names form data base
    // }
 }else{

   header('inspectiondoc.php');
 }


  login();
?>
 