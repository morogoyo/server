<?php
 
try{
	$userName = "hondacus_mega";
	$dbPass = "perdon1979";
	
$db = new PDO('mysql:host=localhost; dbname=hondacus_test',$userName,$dbPass);
 $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $db->exec("SET NAMES 'utf8' ");


}
catch(Exception $e){
	
	echo "this shit is busted";
	exit;
}
var_dump($db);

 try{
	
	$result = $db->query("SELECT * FROM  customers");
	echo " querry should have execute </br>";
}
catch(Exception $e){
	echo $e;
	exit;
}
echo "<pre>";
var_dump($result->fetchall(PDO::FETCH_ASSOC));
?>