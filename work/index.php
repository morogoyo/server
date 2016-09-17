<?php 

session_start();
print_r($_SESSION['userName']);

     		if(isset($_SESSION['userName'])){
			echo "the session is not true</br>";
			//redirect();
				}else{
		    // redirect();
				}
		function redirect(){
			
			echo "<script type='text/javascript'>window.location = 'http://www.hondacustomelite.com/working/login.php'</script>";
			
			}
			
           // this code is to allow crossing to different script
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }  
	
	
	?>
 
<html>

<head>
	<title>
workPage
	</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="workstyle.css">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script type="text/javascript" src="app.js"></script>
<script type="text/javascript" src="working.js"></script>

</head>

<body>

	<!--  this are the buttons -->
   
	<?php include "buttons.php"; ?>

	<!--  end of buttons -->

	<!--  json create -->
    <div>
    <div ></div>
	<?php 
	include 'include/database.class.php';
	include "include/functions.php";
      addSiteForm(); 
	  removeSiteForm();
	  updateSiteInfoPage();
	  $dbm = new DataBase();
	  $dbm->replaceSiteName();
	  
	  ?>
     </div>
    <!--  json create -->
     <div class="col-sm-12"></div>
    <div class="col-sm-12"  ng-app='workPage'>
<div><p id="p"></p><p>the writing should be here</p></div>
<div><form>&nbsp;<label>Search Bar</label>&nbsp;<input type="text" id="search"  ng-model="look" value=" "/>
<input type="reset" value="erase" onclick="searchErase"/>
</form>
</div>
<div ng-controller='tableController' class="col-lg-8">
{{greeting}} 
<table class="table table-bordered table-hover table-striped"  >

<th>Site Id</th><th>Site Administrator addresses </th><th >Actual site</th><th >CPanel  </th>
<tr ng-repeat="x in sites| filter: look | orderBy:'name'" >
    <td >{{x.id }}&nbsp;&nbsp;</a></td>
  	<td ><a href = '{{x.websiteAdmin}}' target=_blank >{{x.name }}&nbsp;&nbsp;</a></td>
    <td ><a href = '{{x.website}}' target=_blank >{{x.name }}&nbsp;&nbsp;</a></td>
  <td><a href = '{{x.cpanel}}' target=_blank >{{x.name}}&nbsp;&nbsp;</a></td> 	
  
</tr>


</div>
 

	
</table>

</div>

</div>

</br></br></br></br>

<!-- <div ng-controller="internet">

<div ng-repeat='x in name'>

	<p > Name: {{x.response.name}},Type:{{x.type}}</p>

	<p>this is testing the stuff</p> -->

</div>

</div>
</div>

</body>
 
</html>