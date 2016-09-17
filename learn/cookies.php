
<?php
$name = "test";
       $value = 3000;
       $expire = time() + (60*60*24*7);
       setcookie($name,$value,$expire);
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Setting cookies</title>
	</head>
	<body>
		<p>testing output</p>
     <?php
     echo "test2";
     ?>
       <pre>
       <?php  

         $test=isset($_COOKIE["test"])? $_COOKIE["test"] : "";
        echo "$test";
       ?>
        </pre>
	</body>
</html>
