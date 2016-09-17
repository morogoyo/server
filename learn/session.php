<?php 
// cookies and sessions are used by the header and must be declared
// at the beginning of each file
       session_start();

     ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Sessions</title>
	</head>
	<body>

     <?php
        $_SESSION["firstName"] = "Rene";
        $name = $_SESSION["firstName"];
        echo $name;
     ?>

	</body>
</html>
