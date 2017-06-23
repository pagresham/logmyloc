
    
  // Make call to a php file that accesses my DB to get some info into JS
  var myApp = angular.module("admin", []);
  
  myApp.controller("admin.ctl1", function($scope, $http, $sce) {
    $scope.userArr;
    $http.get("getInfo.php")
      .then(function(response) {
        
        
        $scope.userArr = response.data.Users;
        console.log($scope.userArr);
        console.log($scope.userArr[0]) 
      })

      $scope.showUser = function(i){
        console.log($scope.userArr[i].First)
      }
    


  })

    