 <?php

//String operators


/* . 

.= */


$a = "Hello";
$b = "world!";
echo $a. " ". $b;


echo "<br>";


$a = "Hello";
$b = " world!";
$c = " this is really great";
$a .= $b;
$a .= $c;
echo $a;

echo "<br>";

// echo with double quotes

$x = "the variable has been translated to its value";

echo "NORMAL TEXT INSIDE OF A STRING,  $x";


// echo in single quotes
echo "<br>";

// Single quotes will the display the value with out being interpreted

echo 'NORMAL TEXT INSIDE OF A STRING, '.  $x;

echo 'NORMAL TEXT INSIDE OF A STRING, '.  $x . ' other string';













?>