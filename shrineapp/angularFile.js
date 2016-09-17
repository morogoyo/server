var app = angular.module ('calendarApp', []);

app.controller('calendar', function($scope,$http){

$http.get('calendar.php' ).then(function(response){
	
	$scope.calendar = response.data.resource;
	
	
	});



});



