<?php 
require_once('include/functions.php');



//echo "this is the id number from joomla user table ".$_POST['customer']."<br/>";

  $selected = $_POST['customer'] ;
  echo $selected ."<br/><br/><br/><br/><br/>";

//connection();

selected_info_pro_akeebasubs_subscriptions($selected);

?>