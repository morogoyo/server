<?php
session_start();

if (!isset($_SESSION)) {
	
     var_dump($_SESSION);
	 echo "no session has started<br/>";
	 echo $_SESSION['userName'];
	header('Location: http://tunerhonda.com');
	}
		
echo'<form action="loggedout.php" method="get">
<input type="submit" name"unset"/>
</form>';
  ?>
