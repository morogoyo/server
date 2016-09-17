<?php

include('../include/connection.php');

 class Login {
	  
	  
	 // function session($userName){
//		  session_start();
//		  $_SESSION['userName']="$userName";
//		  }
	  
	function signIn($userName,$password){
		   global $conn;
	       echo $this->userName= $userName;
		   echo $this->password=$password; 
	 if ($this->userName =="" || $this->password==""){
		 
		     echo "User Name and Password can not be empty";
			  }else {
			   $sql= "SELECT * FROM user_login WHERE user_name='{$this->userName}'";
			   $result = $con->query($sql);	
			   
			   $_SESSION['userName']=$this->userName;
			   echo var_dump($sql);		  
			     if ($result->num_rows > 0){					 
					 while($row = $result->fetch_object()){
						 	if($this->password === $row->password ) {
							echo "Authentication is Correct you may procede to main page<br/>";
							  
							  
							  header('Location: http://localhost/login/admin.php');
						}else{
							
							echo "your authentication failed<br/>";
							  
							
							
							}
					 }
					 
					
					}
				  }
				  
			 
			 }
	 
	   }
	 
	 



?>














