<?php

session_start();

if (isset($_SESSION)) {
	
     var_dump($_SESSION);
	 echo "no session has started<br/>";
	 echo $_SESSION['userName'];
	header('Location: http://www.egyptshrine.org/administrator/login.php');
	}
		
echo'<form action="loggedout.php" method="get">
<input type="submit" name"unset" value="log out"/>
</form>';
  
include('include/files.php');


$search = new ADMINISTRATOR();

$search->form();

$search->edit_form();

$search->search();
$search->add_noble_form();
$search->edit_db();


include('include/footer.php');
?>