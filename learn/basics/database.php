<?php
//1. create a data base connection
   $dbhost= "localhost";
   $dbuser = "morogoyo";
   $dbpass = "perdon1979";
   $dbname= "widget_corp";
   $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

     if (mysql_errno()){
     	die("Data base connection failed:".
     		mysql_connect_error().
     		"(".mysqli_connect_errno().")"
     		);
     }
     else{

     	echo "sucess";
     }
?>
<?php 
//2. perform data base query

   $query = "SELECT * ";
   $query .= "FROM subjects ";
   $query .= "WHERE visible = 1 ";


   $result = mysqli_query($connection,$query);
      
      //test query error

       if (!$result){
       	die("data base query failed.");
       }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>data base connection</title>
	</head>
	<body>

     <?php 
      //3. use returned data (if any)

             while ( $row = mysqli_fetch_assoc($result)) {
             	var_dump($row);
             	echo "<hr />";
             }



     ?>

	</body>
</html>


<?php
//4. release the returned data
  mysqli_free_result($result);
//5. close the connection
mysqli_close($connection);

?>