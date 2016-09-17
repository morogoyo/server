<?php 
session_start();
include('include/files.php');

            // global  $first_name , $middle_name ,$last_name ,$address ,$city ,$state ,$zip ,$email ,$phone, $spouse ; 
			                       $email_sent ="dhardy58@gmail.com,rene@tigersloft.com";
								   $member_number = $_SESSION['member_number'];
								   $first_name= $_SESSION['first_name']  ;
								   $last_name=$_SESSION['last_name'] ;
								   $address=$_SESSION['address'];
								   $city=$_SESSION['city'] ;
								   $state=$_SESSION['state'];
								   $zip=$_SESSION['zip'] ;
								   $email=$_SESSION['email'];
								   $phone=$_SESSION['phone'];
									 
								 
								     $change_link= "www.egyptshrine.org/administrator/admin.php";
		                            $first_name =$_GET['first_name'];
									$address =$_GET['address1'];
									$city =$_GET['city'];
									$state =$_GET['state'];
									$zip =$_GET['zip'];
									$spouse =$_GET['spouse'];
									$phone =$_GET['phone'];
									//$email_sent ="rene@tigersloft.com";
									$subject="Noble  ".$first_name." ".$last_name." Member Number ".$member_number;
			                        $message = "the following information needs to be changed in the data base 
									Name:".$first_name."
									Address: ".$address."
									City: ".$city."
									State: ".$state."
									Zip: ".$zip."
									Spouse: ".$spouse."
									Phone: ".$phone."
									Change the information here   "   .$change_link;
                                    // $message = "Name ".$first_name."</br>".$last_name;	
														
									
									$mail = mail($email_sent,$subject,$message);						 
								


?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
          <div class="row  ">
	      <div class="col-xs-6 col-md-4"></div>  
          <div class="col-xs-6 col-md-4 "> 		  
		  <div class="panel panel-primary ">
          <div class="panel-heading">Dues Payment</div>
          <div class="panel-body text-center">
<!-- ACTUAL BUTTON FOR USE -->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<!--variables neede for paypal to auto fill -->
<input type="hidden" name="item_name" value="membership <?php echo $member_number; ?>">
<input type="hidden" name="item_number" value="<?php echo $member_number; ?>">
<input type="hidden" name="first_name" value="<?php echo  ucfirst($first_name); ?>">
<input type="hidden" name="last_name" value="<?php echo ucfirst($last_name); ?>">
<input type="hidden" name="address1"   value="<?php echo ucfirst($address); ?>">
<input type="hidden" name="city"     value="<?php echo ucfirst($city);?>">
<input type="hidden" name="state"    value="<?php echo ucfirst($state); ?>">
<input type="hidden" name="zip"      value="<?php echo $zip; ?>">
<input type="hidden" name="night_phone_a" value="<?php echo $phone; ?>">
<input type="hidden" name="email" value="<?php echo $email; ?>">
<input type="hidden" name="hosted_button_id" value="N4LYF7SQCTP5U">

<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<lable></br>$150.00 are for dues and $5 for the convenience fee charged by paypal to process the payment</label>
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


<!-- test button is commented out if needed comment top button and test with bottom one -->
<!-- test button -->
<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">-->

<!--variables neede for paypal to auto fill -->
<!--
<input type="hidden" name="item_name" value="membership <?php echo $member_number; ?>">
<input type="hidden" name="item_number" value="<?php echo $member_number; ?>">
<input type="hidden" name="first_name" value="<?php echo  ucfirst($first_name); ?>">
<input type="hidden" name="last_name" value="<?php echo ucfirst($last_name); ?>">
<input type="hidden" name="address1"   value="<?php echo ucfirst($address); ?>">
<input type="hidden" name="city"     value="<?php echo ucfirst($city);?>">
<input type="hidden" name="state"    value="<?php echo ucfirst($state); ?>">
<input type="hidden" name="zip"      value="<?php echo $zip; ?>">
<input type="hidden" name="night_phone_a" value="<?php echo $phone; ?>">
<input type="hidden" name="email" value="<?php echo $email; ?>">
<input type="hidden" name="hosted_button_id" value="4VD8AQL5EB8GG">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

-->
<!-- end Test button -->

 </div></div></div></div></div></div>


</body>
</html>

<?php include('include/footer.php');