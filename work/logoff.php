
<?php
session_start();
if (isset($_SESSION))
{
    unset($_SESSION);
    session_unset();
    session_destroy();
}
// unset($_SESSION);
//    session_unset();
//$_SESSION=array();
//session_destroy();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<h1>Thank you Come again !!!!!</h1>

<p><a href="http://hondacustomelite.com/working/login.php">log in</a></p>
</body>
</html>

