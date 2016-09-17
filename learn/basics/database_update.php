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

     	echo "sucess Data base connected <br/>";
     }
?>
<?php 
// hard coded variables

$id = 5;
$menu_name= "Delete me";
$position = 4;
$visible = 1 ;




//2. perform data base query

   $query = "UPDATE subjects SET ";
   $query .= "menu_name = '{$menu_name}', ";
   $query .= "position = {$position}, ";
   $query .= "visible = {$visible} ";
   $query .= " WHERE id = {$id}";

    // $query ="UPDATE subjects SET menu_name = '{$menu_name}', position = {$position},
    // visible = {$visible}, WHERE id = {$id}";

    var_dump($query);
    
    echo "this is a test of  $visible  <br/>";

   $result = mysqli_query($connection, $query);
      
      //test query error

       if ($result){
        echo "Sucess<br/>";
      }else{
        
       	die("data base query failed.<br/>".mysqli_error($connection)); 
        
       }


     $query2 = "SELECT * FROM subjects";

     $result2 = mysqli_query($connection, $query2);

        

              
        


     
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>data base connection</title>
	</head>
	<body>
<?php
    // while ($row = mysqli_fetch_assoc($result)){

    // var_dump($row); 
    // echo '<hr/>';
  //}

      while ($subjects = mysqli_fetch_assoc($result2)) {
        ?>
                <li><?php echo "id: ".$subjects['id']." menu name: 
                ".$subjects['menu_name']."<br/>";?></li>
    <?php      } 

?>
	</body>
</html>


<?php

//5. close the connection
mysqli_close($connection);

?>