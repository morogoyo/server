<?php
//include('../../administrator/Class/include/connection.php');
session_start();

                                 
	

class FINDNOBLE {
	      
	                
	
	function form(){
		$name; $member_number;
	echo' <div class="row">
	      <div class="col-xs-6 col-md-4"></div>  
          <div class="col-xs-6 col-md-4 "> 
		  
		  <div class="panel panel-danger">
          <div class="panel-heading">MEMBERSHIP SEARCH</div>
          <div class="panel-body">
	      <form action="" method="get">
          <label for="member#">Member Number </label>
          <input type="number" class="form-control" id="member#" name="member_number" valuer="Member#">
          <button type="submit" class="btn btn-primary">Submit</button>         
          </form> </div> </div></div>
		  
		  <div class="col-xs-6 col-md-4"></div>
          </div>
			';
		 global $name,$member_number;
		 $name = $_GET['name'];
		 $member_number = $_GET['member_number'];
		 //$info = array($name,$member_number);
		// echo var_dump($member_number);
		// return $info;
		  
		
		
		}
	
	
	function find_noble_in_db(){
		  global $conn;
		 // global $name;
		  global $member_number;
		  global  $first_name , $middle_name ,$last_name ,$address ,$city ,$state ,$zip ,$email ,$phone, $spouse, $message; 
		 //echo var_dump($first_name , $middle_name ,$last_name ,$address ,$city ,$state ,$zip ,$email ,$phone, $spouse);
		$sql = " SELECT * FROM membership WHERE member_number = {$member_number}";
		$result = $conn->query($sql);
		   if ($member_number){
		while ($row = $result->fetch_object()){
			
			   if ($row->member_number === $member_number){
				   
				   echo '<div class="row">
				   	               <div class="col-xs-6 col-md-4"></div>
								   <div class="col-xs-6 col-md-4"> ';
								    
								   $member_number = $row->member_number;
								   $first_name = $row->F_name;
								   $middle_name = $row->M_name;
								   $last_name = $row->L_name;
								   $address = $row->address;
								   $city = $row->city;
								   $state = $row->state;
								   $zip = $row->zip;
								   $email = $row->email;
								   $phone = $row->phone;
								   $spouse =$row->spouse;
								  
				                    echo "<b>Name:</b> ". ucfirst($row->F_name)." ".ucfirst($row->M_name)." ".ucfirst($row->L_name)."</br>";
							        echo "<b>Address:</b> ". $row->address." </br> ". $row->city." ". $row->state." ". $row->zip."</br>";
							        echo "<b>Email:</b> ". $row->email."</br>";
							        echo "<b>Spouse:</b> ". ucfirst($row->spouse)."</br>";
							        echo "<b>Phone number:</b> ". $row->phone."</br>";								
									echo '</div></div></div>';
								   $_SESSION['member_number'] = $member_number;
								   $_SESSION['first_name'] = $first_name;
								   $_SESSION['last_name'] =  $last_name;
								   $_SESSION['address'] = $address;
								   $_SESSION['city'] =  $city;
								   $_SESSION['state'] = $state;
								   $_SESSION['zip'] =  $zip;
								   $_SESSION['email'] = $email;
								   $_SESSION['phone'] = $phone;
				 
				  				   } 
				 }
			
		   }
		   
		   
		}
	
	function information_check(){
		     global $member_number;
			   global $name;
		 
			// echo var_dump($member_number);
		  if ($member_number != null){
	              global  $first_name , $middle_name ,$last_name ,$address ,$city ,$state ,$zip ,$email ,$phone,$spouse ; 
				 //var_dump($first_name , $middle_name ,$last_name ,$address ,$city ,$state ,$zip ,$email ,$phone,$spouse); 
	               
				            						
							  echo ' <div class="row">';				  
						      echo '<div class="col-xs-6 col-md-4"></div>';
						      echo '<div class="col-xs-6 col-md-4 "> '; 
							  echo ' </br><b>Check the information above to see if it is right  and answer accordingly below</b>';
						      
							 //form 1 start 
							 
							 echo '<form action= "" method="post">';							 
							 echo '<input type="hidden" name="check" value="no">';
							 echo '<input class="btn btn-danger" type="submit" value="No" >';
						     echo '</form>';
							 echo ' </div></div>';
							 
							 
							  
							   //form 1 end 
							    //form 2 start 
							 echo ' <div class="row">';
							 echo '<div class="col-xs-6 col-md-4"></div>';
							 echo '<div class="col-xs-6 col-md-4 "> '; 
							 echo '</br> <form action= "payment.php" method="post">';								  
						     echo '<input class="btn btn-primary" type="submit" value="Yes"  >';
							 echo '</form>';		  
							
						      //form 2 end 
							    echo ' </div></div>';
 
                    
	                       $check = $_POST['check'];
				
				
					  if ($check === 'no'){
						  //Show the form to make changes
						  
						   echo '
						     <!-- Beginning  of block -->
						   <div class="row">
				   	           <div class="col-xs-6 col-md-4"></div>
								<div class="col-xs-6 col-md-4"> <h1>Replace all that are incorrect</h1>'; 
						echo '<div class="form-group ">
						       <form action="payment.php" method="get" >
						        <input type="text" class="form-control" name="first_name" placeholder="First Name">
								<input type="text" class="form-control" name="last_name" placeholder="Last Name">
								<input type="text" class="form-control" name="address1" placeholder="Address">
								<input type="text" class="form-control" name="city" placeholder="City">
								<input type="text" class="form-control" name="state" placeholder="State">
								<input type="text" class="form-control" name="zip" placeholder="Zip">
								<input type="text" class="form-control" name="spouse" placeholder="Spouse">
								<input type="text" class="form-control" name="phone" placeholder="phone">
								<input type="text" class="form-control" name="email" placeholder="email">
								<input type="submit" name="submit" class="btn btn-danger"  >
								</div>
								</form>
								<!-- End of block -->
								</div></div></div>'; 
								// information is being collected to be emailed out to administrator
								
//								if ($_POST){
//									
//									$first_name =$_POST['first_name'];
//									$address =$_POST['address1'];
//									$city =$_POST['city'];
//									$state =$_POST['state'];
//									$zip =$_POST['zip'];
//									$spouse =$_POST['spouse'];
//									$phone =$_POST['phone'];
//									$email_sent ="rene@tigersloft.com";
//									$subject="Noble  ".$first_name." ".$last_name." Member Number ".$member_number;
//									
//									$message = "the following information needs to be changed in the data base;
//									$message .= Name: {$first_name}</br>;
//									$message .= Address: {$address}</br>";
//									$message .= City: ".$city."</br>;
//									$message .= State: ".$state."</br>;
//									$message .= Zip: ".$zip."</br>;
//									$message .= Spouse: ".$spouse."</br>;
//									$message .= Phone: ".$phone."</br>";
//                                     $message = "Name ".$first_name."</br>".$last_name;	
//														
//									
//									$mail = mail($email_sent,$subject,$message);	
//									}
									
																							
									
					  }					  
					  else {
						   
						  echo ".";
						  
						  }	  
				  
		  }
		 
	       
	}
	
	
	}


?>