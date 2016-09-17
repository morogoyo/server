

<?php 

$arrayToConvert;

function updateNumber($username,$password,$dbname,$table){
$servername ='216.172.165.115';
$username = $username;
$password = $password;
$dbname = $dbname;  
$table = $table;

$link = mysqli_connect($servername, $username, $password,$dbname);
if (!$link) {
   
    // comented this line out as it was topping the whole script from running for other methods

    die('Could not connect: ' . mysqli_error());

}

echo 'Connected</br>';

//mysqli_select_db($dbname,$link) or die ("could not open db".mysqli_error());
   $sqlUpdates = "SELECT name,type FROM $table";
   $sqlbackups = "SELECT name,type FROM $table";

$result = mysqli_query($link, $sqlUpdates);
          //header('Content-Type: application/json');
         
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
          // converts $row in to an array so that it can be used in  json_encode()
          
          //$arrayToConvert[]=$row;
      
          // echo "resourse".json_encode($arrayToConvert);
         
         // this code writes the file in to json data to be used by angular directive or controller
       // $jsf = fopen('updates.php', 'w');
       // fwrite($jsf, '{"resourse":'.json_encode($arrayToConvert)."}");
         //     fclose($jsf);
            
         // just if statement to filter database info
    	if($row['detailsurl'] != 'http://update.joomla.org/language'){
        echo  "</br>".mysqli_num_rows($result)."  Updates Requiered ";//$row['index']."</br></br>";
            echo $row['detailsurl'];
            echo $row["id"];
            echo $row['element'];
            echo $row ;
         $arrayToConvert[]=$row;
        break;
        }
    
} }
else {
    echo "0 results";
}


$jsf = fopen('db/'.$dbname.'.php', 'w');
        fwrite($jsf, '{"resourse":'.json_encode($arrayToConvert)."}");
              fclose($jsf);


mysqli_close($link);




}



?>

