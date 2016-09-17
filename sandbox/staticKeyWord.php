 <?php


// show the static keyword in front of the variable

function testFunction() {
    static  $a = 0;
     echo $a;
     $a++;
}

testFunction ();
echo "<br>";
testFunction ();
echo "<br>";
testFunction ();
echo "<br>";
testFunction ();
echo "<br>";
testFunction ();


?>