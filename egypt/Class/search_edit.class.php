<?php 


      class ADMINISTRATOR {

function form(){

	echo' <!--<div class="row">-->';
	//echo ' <!--<div class="col-xs-6 col-md-4"></div>--> '; 
    echo ' <div class="col-xs-6 col-md-4 "> 		';  
	echo ' <div class="panel panel-danger">';
    echo ' <div class="panel-heading">MEMBERSHIP SEARCH</div>';
    echo ' <div class="panel-body">';
	echo ' <form action="" method="get">';
    echo ' <label for="member#">Member Number </label>';
    echo ' <input type="text" class="form-control" id="member#" name="input" valuer="">';
	echo        '<select class="form-control" name="search">
	                                   <option name="">Select what to search</option>
	                                    <option name="member_number" value="member_number">Member Number</option>
										<option name="F_name" value="F_name">First Name</option>
										<option name="L_name" value="L_name">Last Name</option>										
						                </select>';
    echo ' <button type="submit" class="btn btn-primary">Submit</button>   ';
	echo ' </form>';
	echo ' </div>';	 
	echo ' </br><h4>&nbsp;  Re-fresh page to see changes</h4> ';      
    echo ' </div>';  
	echo ' </br></br>';
	
    //echo ' </div>';
	  
		 
	echo ' </div>';
	       
		
		  global $name;
		  global $input;
		  global $select;
		 
		 $input = $_GET['input'];
		$select = $_GET['search'];
		 $input = strtolower($input);
		
		}
function search(){
	
	 global $name,$input;
		global $select;
			  global $conn;
		 // global $name;
		 // global $input;
		  global  $first_name , $middle_name ,$last_name ,$address ,$city ,$state ,$zip ,$email ,$phone, $spouse, $message; 
		//echo var_dump($first_name , $middle_name ,$last_name ,$address ,$city ,$state ,$zip ,$email ,$phone, $spouse);
		var_dump($seach,$input);
		$sql = " SELECT * FROM membership WHERE {$select} = '{$input}'";
		$result = $conn->query($sql);
		   if ($result){
		while ($row = $result->fetch_object()){
			
			   if ($row->$select === $input){
				   
				  echo    '<div class="row">';
				   	//echo  '<div class="col-xs-6 col-md-4"></div>';
					 echo   '<div class="col-xs-6 col-md-4"> ';
								    
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
								    echo "<b>Member Number:</b> ". $row->member_number."</br>";
				                    echo "<b>Name:</b> ". ucfirst($row->F_name)." ".ucfirst($row->M_name)." ".ucfirst($row->L_name)."</br>";
							        echo "<b>Address:</b> ". $row->address." </br> ". $row->city." ". $row->state." ". $row->zip."</br>";
							        echo "<b>Email:</b> ". $row->email."</br>";
							        echo "<b>Spouse:</b> ". ucfirst($row->spouse)."</br>";
							        echo "<b>Phone number:</b> ". $row->phone."</br>";	
									echo '</div></div>';
									
										}
											  }
											  }
										 
									 }
											  
function edit_form(){
		
		echo '
						           <!-- Beginning  of address block block -->
						           <!--<div class="row">-->
								  <!--<div class="col-xs-1 col-md-1" ></div>-->
				   	               <div class="panel panel-danger col-xs-6 col-md-4">
                                  <div class="panel-heading">MEMBERSHIP EDITING ADDRESS</div>
                                   <div class="panel-body ">'; 
						echo      '<div class="form-group ">';
						echo      '<form action="" method="post" >';
						echo       '<!-- <input type="text" class="form-control" name="first_name" placeholder="First Name">';
						echo		'<input type="text" class="form-control" name="last_name" placeholder="Last Name">-->';
						echo		'<input type="text" class="form-control" name="address1" placeholder="Address">';								
						echo		'<input type="text" class="form-control" name="city" placeholder="City">';
						echo		'<input type="text" class="form-control" name="state" placeholder="State">';
						echo	    '<input type="text" class="form-control" name="zip" placeholder="Zip">';
						echo		'<input type="submit" name="submit" class="btn btn-danger"  >';
						echo        '</form>';
						echo		'</div></div></div>'; 
						
						
						echo        '<!-- Beginning  phone,email,spouse of block -->
						           <div class="row"><div class="col-xs-6 col-md-4"></div>
				   	               <div class="panel panel-danger col-xs-6 col-md-4">
                                  <div class="panel-heading">MEMBERSHIP PERSONAL INFO</div>
                                   <div class="panel-body ">'; 
					    echo      '<form action="" method="post" >';
						echo        '<input type="text" class="form-control" name="change" placeholder="Enter change ">';
						echo        '<select class="form-control" name="personal">
						                <option name="email" value="email">Email</option>
										<option name="phone" value="phone">Phone</option>
										<option name="spouse" value="spouse">Spouse</option>
						             </select>';
						
						//echo		'<input type="text" class="form-control" name="phone" placeholder="phone">';
						//echo		'<input type="text" class="form-control" name="email" placeholder="email">';
						echo		'<input type="submit" name="submit" class="btn btn-danger"  ></br></br></br></br></br>';
						echo		'</div>';
						echo		'</form>';
						echo		'<!-- End of block -->';
						echo		'</div></div></div>'; 
						
						
		}	
		
function test(){
			  global $member_number;
			var_dump($_POST['state'],$_POST['select'],$member_number);
			
			
			}	

function edit_db(){
				$result;
				global $conn;
				global $input;
				$address = $_POST['address1'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$zip = $_POST['zip'];
				$personal = $_POST['personal'];
				$change = $_POST['change'];
				
				
				if (isset($address )){
					$input1=  $input;
					$input2= null;
					
					}else{
						
						$input1=null;
						$input2=$input;
						}
$sql_edit_1=" UPDATE membership SET address='{$address}',city='{$city}',state='{$state}',zip='{$zip}' WHERE member_number ={$input1}";
				
$sql_edit_2=" UPDATE membership SET {$personal} ='{$change}' WHERE member_number ={$input2}";
				
				var_dump($sql_edit_1,$sql_edit_2);
				
				if (isset($input1)){
					
					$result = $conn->query($sql_edit_1);
					
					
					}else{
						
						
						$result = $conn->query($sql_edit_2);
						
						}
				
				
				
				
				 if ($result){
					 
					 echo "The change is made";
					 
					 }else{
						 
						 echo "did not work";
						 echo mysqli_error($conn);
						 }
				
				
				}								  
											  
											  
	function add_noble_form(){
		
		echo '
						           <!-- Beginning  of address block block -->
						           <div class="row">
								  <div class="col-xs-1 col-md-1" ></div>
				   	               <div class="panel panel-danger col-xs-6 col-md-4">
                                  <div class="panel-heading">ADD NEW NOBLE ADDRESS</div>
                                   <div class="panel-body ">'; 
						echo      '<div class="form-group ">';
						echo      '<form action="" method="post" >';
						echo       ' <input type="text" class="form-control" name="shrine_id" placeholder="shrine_id">';
						echo       ' <input type="text" class="form-control" name="member_number" placeholder="Member Number">';
						echo       ' <input type="text" class="form-control" name="suffix" placeholder="Suffix example: I,II,III,JR.,SR.">';
						echo       ' <input type="text" class="form-control" name="first_name" placeholder="First Name">';
						echo		'<input type="text" class="form-control" name="middle_name" placeholder="Middle Name or Initial">';
						echo		'<input type="text" class="form-control" name="last_name" placeholder="Last Name">';
						echo		'<input type="text" class="form-control" name="address1" placeholder="Address">';								
						echo		'<input type="text" class="form-control" name="city" placeholder="City">';
						echo		'<input type="text" class="form-control" name="state" placeholder="State">';
						echo	    '<input type="text" class="form-control" name="zip" placeholder="Zip">';
						//echo		'<input type="submit" name="submit" class="btn btn-danger"  >';
//						echo        '</form>';
//						echo		'</div></div></div>'; 
//						
						
						//echo        '<!-- Beginning  phone,email,spouse of block -->
//						           <div class="row"><div class="col-xs-6 col-md-4"></div>
//				   	               <div class="panel panel-danger col-xs-6 col-md-4">
//                                  <div class="panel-heading">MEMBERSHIP PERSONAL INFO</div>
//                                   <div class="panel-body ">'; 
						echo        '<input type="text" class="form-control" name="spouse" placeholder="Spouse ">';
						echo		'<input type="text" class="form-control" name="phone" placeholder="phone">';
						echo		'<input type="text" class="form-control" name="email" placeholder="email">';
						echo		'<input type="text" class="form-control" name="blue_lodge" placeholder="Blue Lodge">';
						echo		'<input type="submit" name="submit" class="btn btn-danger"  ></br></br></br></br></br>';
						echo		'</div>';
						echo		'</form>';
						echo		'<!-- End of block -->';
						echo		'</div></div></div></div></div></div>'; 
						
						
						if (isset($_POST)){
							$member_number= $_POST['member_number'];
							$fname = $_POST['first_name'];
				            $lname = $_POST['last_name'];
							$mname = $_POST['middle_name'];
							$suffix = $_POST['suffix'];
							$address = $_POST['address1'];
				            $city = $_POST['city'];
				            $state = $_POST['state'];
							$zip = $_POST['zip'];
							$spouse = $_POST['spouse'];
							$phone = $_POST['phone'];
							$email = $_POST['email'];
							$shrine_id = $_POST['shrine_id'];
							$blue_lodge = $_POST['blue_lodge'];
							
					global $conn;		
$sql_add_noble="INSERT INTO membership";
 $sql_add_noble.="(shrine_id,member_number,F_name,M_name,L_name,suffixe,address,city,state,zip,email,spouse,phone,blue_lodge)";							
  $sql_add_noble.=" Value('{$shrine_id}','{$member_number}','{$fname}','{$mname}','{$lname}','{$suffix}','{$address}','{$city}','{$state}','{$zip}','{$email}','{$spouse}','{$phone}','{$blue_lodge}')";	
  
     $result_add_noble = $conn->query($sql_add_noble);		
	                     if ($result_add_noble){
							 
							 
							 $conn->connect_errno();
							 
							 }else{
								 echo "Noble succesfully added";
								 
								 
								 }
	 
	 				}
						
		
		
		
		}										  
											  
											  
											  
											  
											  
											  
											  
											  
											  
	  }

?>