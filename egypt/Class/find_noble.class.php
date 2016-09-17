<?php
//include('include/connection.php');

$email ="rene@tigersloft.com";
class FINDNOBLE {
	      
	
	function form(){
		// Display form 
		$name; $member_number;
	echo' <div class="row">
	      <div class="col-xs-6 col-md-4"></div>  
          <div class="col-xs-6 col-md-4 "> 
		  
		  <div class="panel panel-danger">
          <div class="panel-heading">MEMBERSHIP SEARCH</div>
          <div class="panel-body">
	      <form action="" method="get">
          <label for="member#">Member Number </label>
          <input type="number" class="form-control" id="member#" name="member_number" placeholder="Member#">
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
		
		//find noble in data base
		  global $conn;
		 // global $name;
		  global $member_number;
		$sql = " SELECT * FROM membership WHERE member_number = {$member_number}";
		$result = $conn->query($sql);
		   if ($member_number){
		while ($row = $result->fetch_object()){
			
			   if ($row->member_number === $member_number){
				   echo '<div class="row">
				   	               <div class="col-xs-6 col-md-4"></div>
								   <div class="col-xs-6 col-md-4"> ';
				   echo "<b>Name:</b> ". ucfirst($row->F_name)." ".ucfirst($row->M_name)." ".ucfirst($row->L_name)."</br>";
				   echo "<b>Address:</b> ". $row->address." </br> ". $row->city." ". $row->state." ". $row->zip."</br>";
				   echo "<b>Email:</b> ". $row->email."</br>";
				   echo "<b>Spouse:</b> ". ucfirst($row->spouse)."</br>";
				   echo "<b>Phone number:</b> ". $row->phone."</br>";
				   
				         echo '</div></div></div>';
				   
				  				   } 
				 }
			
		   }
		   
		   
		}
	
	function information_check(){
		//check information agains data base
		     global $member_number;
			   global $name;
		 
			// echo var_dump($member_number);
		  if ($member_number != null){
	  
	              echo ' <div class="row">
				   	           <div class="col-xs-6 col-md-4"></div>
								<div class="col-xs-6 col-md-4 "> 
								  <form action="" method="get">
				                   <input type="radio" name="check" value="yes">Yes<br>
					               <input type="radio" name="check" value="no">No<br>
                                   <input type="submit"  >
			                     </form>
								 </div></div></div>';
				  
		  }
				  
				   $check =  $_GET['check'];
				  if ($check === 'yes')
				  { 
					  
					   header("Location: payment.php"); /* Redirect browser */
					  }
					  else if ($check=== 'no'){
						   echo '
						     <!-- Beginning  of block -->
						   <div class="row">
				   	           <div class="col-xs-6 col-md-4"></div>
								<div class="col-xs-6 col-md-4"> <h1>Replace all that are incorect</h1>'; 
						echo '<div class="form-group ">
						       <form action="" method="post" >
						        <input type="text" class="form-control" name="name" placeholder="Full Name">
								<input type="text" class="form-control" name="address" placeholder="Address">
								<input type="text" class="form-control" name="city" placeholder="City">
								<input type="text" class="form-control" name="state" placeholder="State">
								<input type="text" class="form-control" name="zip" placeholder="Zip">
								<input type="text" class="form-control" name="spouse" placeholder="Spouse">
								<input type="text" class="form-control" name="phone" placeholder="phone">
								<input type="submit" class="btn btn-danger"  >
								</div>
								</form>
								<!-- End of block -->
								</div></div></div>'; 
								
								if ($_POST){
									$email ="rene@tigersloft.com";
									$subject="Noble {$member_number} {name}";
									$name =$_POST['name'];
									$address =$_POST['address'];
									$city =$_POST['city'];
									$state =$_POST['state'];
									$zip =$_POST['zip'];
									$spouse =$_POST['spouse'];
									$phone =$_POST['phone'];
									$message = "the following information needs to be changed in the data base\n";
									$message .= "Name: ".$name."\n";
									$message .= "Address: ".$address."\n";
									$message .= "City: ".$city."\n";
									$message .= "State: ".$state."\n";
									$message .= "Zip: ".$zip."\n";
									$message .= "Spouse: ".$spouse."\n";
									$message .= "Phone: ".$phone."\n";
									
									$mail = mail($email,$subject,$message);
									
									
									}
									
									if ($mail){
									header("Location: payment.php"); /* Redirect browser */
									echo var_dump($subject);
									echo var_dump($message);
									echo var_dump($email);
									 
									}
									
									
					  }
					  
					 // echo var_dump($check); 
					 
	       
	}
	
	
	}

//$conn->close();

?>