var app = angular.module('workPage',[]); 


  app.controller('tableController', function($scope,$http){ 
        
  
	     // $scope.greeting = 'hello';
		 
		  
   $http.get("http://hondacustomelite.com/working/json/rene.php")
  .success( function(response){$scope.sites= response.site;});
    
 
 

});







    