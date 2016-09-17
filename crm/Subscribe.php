<?php

require_once ('include/subs.class.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

 <div class="panel panel-primary">
  <div class="panel-heading">Panel heading without title</div>
  <div class="panel-body">
  <form action="Subscribe.php" method="post">
<div class="form-group">
    <label for="name">First Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name" name="fname">
  </div>
  <div class="form-group">
   <label for="lastName">Last Name</label>
    <input type="text" class="form-control" id="lastName" placeholder="Last Name"name="lname">
  </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <input type=text" class="form-control" id="Address" placeholder="Address" name="address">
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" placeholder="city" name="city">
  </div>
  <div class="form-group">
    <label for="zipCode">Zip Code</label>
    <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" name="zip">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
  </div>
  <div class="form-group">
    <label for="userName">User Name</label>
    <input type="text" class="form-control" id="userName" placeholder="User Name" name="userName">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  
  <button type="submit" class="btn btn-default" name="submit" >Submit</button>
 
</form> <?php 

   //all of the post variables from the form translated in to variables 
   //also they have been sanitized for data base entry 
   $userName = htmlspecialchars($_POST['userName']);
   $password = htmlspecialchars($_POST['password']);
   $password =  md5(htmlspecialchars($_POST['password'])."encryptingword");
   $lastName = htmlspecialchars($_POST['lname']);
   $address  = htmlspecialchars($_POST['address']);
   $city     = htmlspecialchars($_POST['city']);
   $zip      = htmlspecialchars($_POST['zip']);
   $email    = htmlspecialchars($_POST['email']);
   $firstName = htmlspecialchars($_POST['fname']);
   


      $subs = new Subscription();
 
 $subs->insert($firstName,$userName,$password,$lastName,$address,$city,$zip,$email);
	
	
	

echo var_dump($password,$userName,$lastName,$address,$city,$zip,$email);

?>
</div></div></div>

</body>

</html>