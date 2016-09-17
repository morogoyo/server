<?php

///////////////////// I think you were trying to check for empty variables here ///////////////////
// check if fields passed are empty
//if(empty($_POST['name'])  		||
//   empty($_POST['phone']) 		||
//   empty($_POST['email']) 		||
//   empty($_POST['message'])	||
//   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//   {
//	echo "No arguments Provided!";
//	return false;
//   }
	 if (isset($_POST['name'],$_POST['phone'],$_POST['email'],$_POST['message'])){
$name = $_POST['name'];
$phone = $_POST['phone'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
$to = 'info@milesofhelpthroughchrist.org'; // PUT YOUR EMAIL ADDRESS HERE
//$to = 'rene@tigersloft.com';//test email Rene
$email_subject = "MOHTC Website Contact Form:  $name"; // EDIT THE EMAIL SUBJECT LINE HERE
$email_body = "You have received a new message from your website's contact form.\n\n"."Here are the details:\n\nName: $name\n\nPhone: $phone\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@your-domain.com\n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
//return true;
echo " your information was sent ";
	
}	else {
	
	echo "you Need to fill out the form to proceed";
	
	  
	
	
	}	
?>