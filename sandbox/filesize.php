 <?php 
$array2=array();
// address of files that need to be looked at 
  define("FILES","C:/wamp/www/backuptest/bahia");
 // define("FILES","E:\Storage E\Dropbox (TigersLoft)\Backups\bahia");
         $allfilesinBahia =scandir(FILES);
		 //var_dump($allfilesinBahia);
		
       foreach($allfilesinBahia as $bahia){
		 
		   array_push($array2 ,date("Y-m-d",filemtime($bahia)));
		   
		   foreach($array2 as $array){
			   
			  var_dump($array);
		   }
		 
		 //echo  date("Y-m-d",filemtime($bahia));
		   
		   
	   }
  
  /*  $allfiles = scandir(FILES);

// getting the length of the array to be able to itterate thru it later
 $length = count($allfiles);

        for($i=0; $i<$length ; $i++){
	
	        
                
				//echo FILES.$allfiles[$i]."</br>";
                $backup = FILES.$allfiles[$i];
	            //var_dump(scandir($backup));
                $newBackups = scandir($backup);
				  
              foreach ($newBackups as $back){
				       $back = trim($back);
				  if (file_exists($backup)){
					  echo "todays ".date("Y-m-d");
				    //echo $file_downloaded = filemtime($back);
					echo $file_downloaded = date("Y-m-d H:i:s",filemtime($back))."</br>";
					
					echo  "file time $file_downloaded </br>";
					 echo "time  ".$t =date("Y-m-d H:i:s",time())."</br>";
					 echo date("Y-m-d H:i:s",($t - $file_downloaded))."</br></br></br>";
					 echo $back."</br>"; */
					/*   if(strpos($back , '.jpa')){
						   
                     if ( ($t - (30*86400)) > $file_downloaded){
						
						echo "file is less than 30 days old $back</br>";
						echo $t - $file_downloaded;
						
					}else {
						
						
						echo " is older than 30 days $back </br>";
						echo $t - $file_downloaded;
						//unlink($back)
					} 
                        						
					   }*/
				  //echo $back."</br>";
				  
			/* 	  
			  }
			  }
						
						
					} */

		
       

   




				   
?>  