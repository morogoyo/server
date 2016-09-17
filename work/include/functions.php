  <?php
  
  include 'include/connectionsql.php';
  function addSiteForm(){
	  
	  ?>
	  
		   <div class="col-sm-4">
	 <form action="index.php" method="post">
	 <div class="form-group">
     <label>Name</label>
	    <input type="text" name="name" class="form-control" />
        </div>
        <div class="form-group">
	  <label>Website administrator address</label>
	    <input type="text" name="websiteAdmin"  class="form-control"/>
        </div>
        <div class="form-group">
	  <label>Website address</label>
	    <input type="text" name="website"  class="form-control"/>
        </div>
        <div class="form-group">
	  <label>Cpanel Address</label>
	    <input type="text" name="cpanel" class="form-control "/>
	    <input type="submit" name="submit" class="btn btn-default"/>     
	  
	  </div>  
	  </form>
      </div>
	  <?php
	  $name=$_POST['name'];
	  $website=$_POST['website'];
	  $websiteAdmin=$_POST['websiteAdmin'];
	  $cpanel="http://".$_POST['cpanel']."/cpanel";
			  
	  if ($name === "" || $website ==="" || $cpanel ==="" || $website ===""){
		   
		   echo "Name and Website can not be empty";
		   return ;
	  }else{
		  $sql= "INSERT INTO website (name,website,websiteAdmin,cpanel) VALUES ('$name','$website','$websiteAdmin','$cpanel')";
		  
		  global $dbconnect;
		   
		   $result= $dbconnect->query($sql);
		   	 updateSiteInfoPage();  
		if ($result === TRUE) {
	  echo "New record created successfully";
		  
  } else {
	 // echo "Error: " . $sql . "<br>" . $dbconnect->error;
		}
		
		  }
	   fclose($encoded);
		  //$dbconnect->close();
  }
  
  function removeSiteForm(){
	     ?>
          <div class="col-sm-4">
         <form action="index.php" method="get" >
  <div class="form-group">
    <label for="removeId">remove Id</label>
    <input type="text" class="form-control" id="removeId" name="id" placeholder="ID">
  </div>
 
  
  <button type="submit" name="remove_id" class="btn btn-default">Submit</button>
</form>
</div>
  <?php
         $id =$_GET['id'];
		  global $dbconnect;
		 if(!$id){
			 echo "no Id was entered";			 
			 
			 }else{
				 $sql_remove = "DELETE FROM website WHERE id = {$id}";
				   $result_remove = $dbconnect->query($sql_remove);
				   updateSiteInfoPage();
				  
				 
				 }
		  	  
	  }
	  
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
  
  ?>
	   
	 