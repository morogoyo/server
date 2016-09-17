<?php

$createdFile = fopen ("file", "w+");

   if (!isset($createdFile)){
	   
	   echo " the file was not found";
	   
	   
   }else{
	   echo "the file is in the directory <br/>";
	   	   echo "why";

   }

       
     fwrite($createdFile , "new testing of the file for 4/21/2015");
	
    
	
	fclose($createdFile);
	
	$createdFile = fopen ("file", "r");
	
	
	
	    $data = fread($createdFile,100);
		
		
		
		           echo "<br/> this is fucking bulshit<br/>";
			
			
		
			        echo $data ;
			
	
	  
	
	 

 
?>