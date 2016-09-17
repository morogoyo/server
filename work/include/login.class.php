<?php
session_start();


include('include/connectionsql.php'); 

 class Login {	 	  

	function signIn($userName,$password){

		   global $dbconnect;		   
	       $this->userName= $userName;
		   $this->password=$password;
	               echo $this->userName;
	              echo $this->password;
	              $sql ="SELECT * FROM users WHERE user_name = '$this->userName'";
                  
				$result = $dbconnect->query($sql);	
			    //echo var_dump($sql);		   

			     if ($result->num_rows > 0)  //i have altered the $result to $result1				 {			
				 
				    	  while($row = $result->fetch_object()){
							   
							  echo "</br>".$row->password."</br>";
							  echo $row->user_name."</br>";	
							  	// this set the global to the username
							  
                              if($row->password == $this->password) {
                                 $_SESSION['userName']= $row->user_name;
							echo "Authentication is Correct you may procede to main page<br/>";						  
                            echo "<script type='text/javascript'>window.location = 'http://hondacustomelite.com/working' </script>";   
							   
						}
					 else{

							echo "your authentication failed<br/>";							

						//end of else 	

							}
              // end of while loop      
					 }

					 

					//end of if

					} 

	}
 


 function show(){
	           
			   echo "test";
			   
			   global $dbconnect;
			   
			    $sql1= "SELECT * FROM users ";// this one is for testing acctual connection to table 
                 $result1 = $dbconnect->query($sql1);				
				 
				 if ($result1->num_rows > 0){
					 
					 while($rows = $result1->fetch_object()){
					     echo $rows->id." </br> ".$rows->user_name." </br> ".$rows->password;
					 }
					 }else
					 {
						 echo "the query didnt go thru ";
						 
						 }
	
	
	}
	
	

    


?>





























