<!DOCTYPE html> 
<html> 
<head> 
	<title>My Page</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>Customer Info</h1>
	</div><!-- /header -->
    <!-- BEGINNING OF FORM  -->
<form action="form.php" method="post">
  <div data-role="fieldcontain">
    <label for="date">Today's Date:</label>
     <p id="today"></p>
    <script>
       var d= new Date();
       document.getElementById("today").innerHTML= d.toString() ;
	   var name = document.getElementById("name");
	    var phone = document.getElementById("phone");
		 var email = document.getElementById("email");
		  var address = document.getElementById("address");
		   var city = document.getElementById("city");
		    var state = document.getElementById("state");
			 var zip = document.getElementById("zip");
			  var applydate = document.getElementById("applydate");
			   var applicator = document.getElementById("applicator");
			    var c_name = document.getElementById("c_name");
				 var c_phone = document.getElementById("c_phone");
				  var today = document.getElementById("today");
				 
				   
	</script>
     <?php
				  echo "this shit is working";
				  ?>
  </div>
	<div data-role="content"> 
	  <div data-role="fieldcontain">
	    <label for="name">Name:</label>
	    <input type="text" name="name" id="name" value=""  />
        <div data-role="fieldcontain">
          <label for="phone">Customer Phone #:</label>
          <input type="text" name="textinput" id="phone" value=""  />
        </div>
	  </div>
      <div data-role="fieldcontain">
        <label for="email">Customer Email:</label>
        <input type="text" name="email" id="email" value=""  />
      </div>
      <div data-role="fieldcontain">
        <label for="address">Customer Address:</label>
        <input type="text" name="address" id="address" value=""  />
      </div>
      <div data-role="fieldcontain">
        <label for="city">City:</label>
        <input type="text" name="city" id="city" value=""  />
      </div>
       <div data-role="fieldcontain">
        <label for="state">State:</label>
        <input type="text" name="state" id="state" value=""  />
      </div>
       <div data-role="fieldcontain">
        <label for="zip">Zip Code:</label>
       
<input type="text" name="zip" id="zip" value=""  />
      </div>
       <div data-role="fieldcontain">
         <label for="applydate">Application Date:</label>
         <input type="date" name="applydate" id="applydate" value=""  />
       </div>
       
       <div data-role="fieldcontain">
         <label for="applicator">GS Authorized Applicator:</label>
         <input type="text" name="applicator" id="applicator" value=""  />
       </div>
       
       <div data-role="fieldcontain">
         <label for="c_name">Company Name:</label>
         <input type="text" name="c_name" id="c_name" value=""  />
       </div> <div data-role="fieldcontain">
         <label for="c_phone">company Phone Number:</label>
         <input type="text" name="c_phone" id="c_phone" value=""  />
       </div> <div data-role="fieldcontain">
         <label for="c_address">Company Address:</label>
         <input type="text" name="c_address" id="c_address" value=""  />
       </div>
       <input type="submit" value="Submit" />
    </div>
    
    
    <!-- /END OF FORM -->
    </form>
	<!-- /content -->

</div><!-- /page -->

</body>
</html>