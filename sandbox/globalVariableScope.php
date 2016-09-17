<?php


$a = 10; // global scope

function myFunctionScope() {
    
	    /* using variable a will cause an error if used inside of
		myFunctionScope() function */                                              
	

    echo "<p>Variable a inside function is: $a </p>";
	
          } 


		  
		  myFunctionScope ();

     echo "<p>Variable a outside function is: $a</p>";





?> 