<?php

//$serverName = "216.172.165.115";
//$userName = "bahiashr_trey";
//$password= "Beast$4414";
//$dbName="bahiashr_joomla";


//$serverName = "216.172.165.115";
//$userName = "root";
//$password= "";
//$dbName="bahiashr_joomla";

function convert(){
	$serverName = "216.172.165.115";
$userName = "bahiashr_trey";
$password= "Beast4414";
$dbName="bahiashr_joomla";
	$arrayConvert=array();
	         // Create connection
       $conn = new mysqli($serverName, $userName, $password, $dbName);
            // Check connection
                 if ($conn->connect_error) {
                       die("Connection failed: " . $conn->connect_error);
                         } 
					else{
						   echo "connection was successful";
						
						}
		// sql statement to get executed 
		$sql = "SELECT * FROM wtqy9_jevents_vevdetail";		
		$result = $conn->query($sql);		
		if($result->num_rows > 0){
			   $jsf = fopen("calendar.php","w");
		      
		  while($row = $result->fetch_assoc()){	          
					   
					   // storing in to array to be converted
					
					 $array_Convert []=$row;
					
						
			   } 
			   
			  
        fwrite($jsf, json_encode($array_Convert)."}");
              fclose($jsf);
 
		}
				  
//'{"resourse":'.
	
}

convert();

//global $dbconnect ;
//	  $sql_select= "SELECT * FROM website";
//	  $result_select = $dbconnect->query($sql_select);
//			
//			if($result_select->num_rows > 0){
//			   $encoded = fopen("json/rene.php","w");
//			 
//			 
//			 while($row = $result_select->fetch_assoc()){		    
//				
//						 $array_to_encode []= $row;
//				
//			 } 
//				 //write to file the envoded json array 
//				 fwrite($encoded,'{"site":'.json_encode($array_to_encode)."}");
//				 //confirm creation
//		  }
//	  
?>