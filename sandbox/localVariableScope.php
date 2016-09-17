 <?php




function testfunction() {
   
   $a = 100; // This is the local scope
   
   echo "<p>Variable a inside function is: $a</p>";
       
	   } 

//function being called

testFunction();



// using a varibale outside the function will generate an error


echo "<p>Variable a outside function is: $a</p>";






?>