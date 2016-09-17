// JavaScript Document

//alert("this shit is working");
var p ;
var ul;
var input;
	var array = Array();
	function test(){
		
		var  relesase = document.getElementById("task");
		 input = document.getElementById("task").value;//Gets value from text imput
		 
		  console.log(input);
	      
		  array.push(input);
		  
		  console.log(array);
		  
		  }
	 
	 
	 function release(){
		 
		 //Selects the input and clears the text to make it ready for more text 
		 var  release = document.getElementById("task");
		    release.value="";
		 
		 
		 }
	 
	 function display(){	
	   // this is the created element wich will be the child to the ul list	   	 
	 var listItem = document.createElement("li");
	 //  set the content of the list itme 
	      listItem.innerText = input;
		  // grab the list to wich you will append the child 
		  var list = document.getElementById("ul");
		  // append the child
		  list.appendChild(listItem);
		
		  
		       }