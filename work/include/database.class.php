
<?php


 class DataBase{
	   
	   
	  function replaceSiteName(){
		  // echo '<div class="col-sm-4"></div>';
		   echo '<div class="form-group">';
		   echo '<div class="  col-sm-4">';
		   echo '<form action="index.php" method="post">';
		   
		   echo "<label>ID</label>";
		   echo " <input type='number' name='idRemove'/>";
		   echo "<label>Input name change</label>";
		   echo " <input type='text' name='change'/>";
		   echo "<label>Column</label>";
		   echo  "<select name='column'>
		           <option value='name'>name</option>
				   <option value='website'>website</option>
				   <option value='websiteAdmin'>websiteAdmin</option>
				   <option value='cpanel'>cpanel</option>
		          </select>";
		   echo "<input type='submit' name='repair'>";
		   echo "</form>";
		   echo '</div>';
		    echo '</div>';
		          $column = $_POST['column'] ;
				  $change=$_POST['change'] ;
				 $idRemove= $_POST['idRemove'];
		  
		    global $dbconnect;
		    
			
			
			
		 $sqlupdate = " UPDATE website SET {$column}='{$change}' WHERE id ={$idRemove} ";	
		     $resultsUpdate= $dbconnect->query($sqlupdate);			   	
			  if($resultsUpdate === TRUE){
				  echo "Record ID# '{$idRemove}' '{$column}'='{$change}' was corrected ";				   
					updateSiteInfoPage();
				  }else{					   
					  echo "No changes have been made<br/>";
					  //echo $dbconnect->error;			
					  
					  }
		   
		   
		   
		   }
		   
		   //function to update the json file on the server to display in angular
		   
		   	  function updateSiteInfoPage(){
	  
	  global $dbconnect ;
	  $sql_select= "SELECT * FROM website";
	  $result_select = $dbconnect->query($sql_select);
			
			if($result_select->num_rows > 0){
			   $encoded = fopen("json/rene.php","w");
			 
			 
			 while($row = $result_select->fetch_assoc()){		    
				
						 $array_to_encode []= $row;
				
			 } 
				 //write to file the envoded json array 
				 fwrite($encoded,'{"site":'.json_encode($array_to_encode)."}");
				 //confirm creation
		  }

	  
	  
	  }
	  
	   
   } 
	  
	   
	   
	   
	   
	   
	   
	   
?>