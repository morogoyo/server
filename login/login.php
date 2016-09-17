<?php


include('include/connection.php');
include('include/header.php');
include('include/menu.html');
//include('include/style.css');
//include('include/files.php');
include('Class/login.class.php');

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div class="col-sm-4 col-md-4 col-md-4"></div>
<div class="col-sm-4 col-md-4 col-md-4">
<div class=" panel panel-primary">
<div class="panel-heading">Panel heading</div>
  <div class="panel-body">
<form action="login.php" method="post" enctype="application/x-www-form-urlencoded">
  <div class="form-group ">
    <label for="userName">User Name</label>
         <input type="text" class="form-control" id="userName" placeholder="" name="userName"/>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="Password" placeholder="" name="password"/>
  </div>
 
  <button type="submit" class="btn btn-default" name="submit">Log in </button>
    <?php 
	    $userName = htmlspecialchars($_POST['userName']);		 
	   $password = md5(htmlspecialchars($_POST['password']."encryptingword"));
	   $login = new Login();
	   $login->signIn($userName,$password);	
	   //$login->session($userName);  
	   $conn->close();
	  
	  	?>
</form>
</div>
</div>
</div>

<?php 
echo var_dump( $userName,$password); 

include('include/footer.php');
  
?>
</body>
</html>