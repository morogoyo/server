<?php
//1. create a data base connection
   $dbhost= "localhost";
   $dbuser = "morogoyo";
   $dbpass = "******";
   $dbname= "widget_corp";
   $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

     if (mysql_errno()){
     	die("Data base connection failed:".
     		mysql_connect_error().
     		"(".mysqli_connect_errno().")"
     		);
     }
     else{

     	echo "sucessful connection <br/>";
     }
?>
<?php 
//2. perform data base query
     $menu_name = "Edit me";
     $position = 4;
     $visible = 1;
   

    $query = "INSERT INTO subjects (  ";
    $query .="menu_name,position,visible";
    $query .= ")  VALUE (";
    $query .= "'{$menu_name}',{$position},{$visible}";
    $query .=   ")";
   

   $result = mysqli_query($connection,$query);
      
      //test query error

       if ($result){
       	 echo "sucess";
       }else{

        die("data base query failed.". mysqli_connect_errno($connection));
       }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>data base connection</title>
	</head>
	<body>

   

	</body>
</html>


<?php
//4. release the data
 //mysqli_free_result($result);
//5. close the connection
mysqli_close($connection);

?>
