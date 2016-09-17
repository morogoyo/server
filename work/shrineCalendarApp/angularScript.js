// JavaScript Document
(function(){
var app = angular.module('calendarApp',[]);



app.controller('readController',['$http',function($http){
	this.rene=" test";
	 var calendar = this;// calendar is doing the function of the $scope varible 
	 calendar.array =[];// initializing empty array to avoid errors of page not loading
	 


	$http.get('http://hondacustomelite.com/working/shrineCalendarApp/calendar.php').then(function(response){
		
		/*response is the variable passed in by the function
		data is what was returned and resourse is the variable 
		that contains the json array */
		
		calendar.array = response.data.resourse;
		
					
			console.log(calendar.array);
		
		
		//console.log(response); // this was just for console testing purposes
		
		
		
	});
	
	}]);
	
	
	})();// end enclosure