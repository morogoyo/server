<?php
session_start();

include('include/Includes.php');
print_r($_SESSION['userName']);
//if (isset($_SESSION))
//{
//    unset($_SESSION);
//    session_unset();
//    session_destroy();
//}
?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Untitled Document</title>

</head>



<body>

<div class=" panel panel-primary">

<div class="panel-heading">Panel heading</div>

  <div class="panel-body">

<form action="login.php" method="post" enctype="application/x-www-form-urlencoded">

  <div class="form-group ">

    <label for="userName">User Name</label>

         <input type="text" class="form-control" id="user_name" placeholder="" name="user_name"/>

  </div>

  <div class="form-group">

    <label for="exampleInputPassword1">Password       </label>

    <input type="password" class="form-control" id="password" placeholder="" name="password"/>

  </div>

 

  <button type="submit" class="btn btn-default" name="submit">Log in </button>


<div>
<a href="logoff.php"><input class="btn btn-warning" type="button" value=" Log off now"/> </a>
</div>
    <?php 
    
	    $userName = htmlspecialchars($_POST['user_name']);		 

	   $password =md5(htmlspecialchars( $_POST['password']."encryptingword"));
	   // will use as salt   md5(htmlspecialchars( $_POST['password']."encryptingword"))

	   $login = new Login();
      
	   $login->signIn($userName,$password);	
	 

	   $login->session($userName);  
       
	
	
	 

	  	?>

</form>

</div>



</div>

<?php 

//echo var_dump( $userName,$password); 

 $login->show();
 $dbconnect->close();
 

  
  

?>

</body>

</html>