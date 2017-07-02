
    
  // Make call to a php file that accesses my DB to get some info into JS
  var myApp = angular.module("admin", []);
  
  myApp.controller("admin.ctl1", function($scope, $http, $sce, $timeout) {
    $scope.userArr;
    $scope.friendsArr;

    // Get list of all users and store in $scope.userArr
    $http.get("getInfo.php")
      .then(function(response) {
        // console.log(response);
        // Get list of all users from php script //
        $scope.userArr = response.data.Users;
        console.log($scope.userArr);
        // console.log($scope.userArr[0]) 
      })

      // Get list of all users and store in $scope.friendsArr
      $http.get("getFriends.php")
        .then(function(response){
          // console.log(response);
          $scope.friendsArr = response.data.Friends;
          console.log($scope.friendsArr);
        })

      $scope.showUser = function(i){
        console.log($scope.userArr[i].First)
      }
      // Test function to display current user id
      $scope.showCurrentUser = function() {
        alert($scope.u_id)
        console.log($scope.u_id);
      }


      $('#showPermissions').click(function() {
        $('.userPermTable').toggle('blind');
      })
  
      $('[data-toggle="tooltip"]').tooltip(); 
    



  })

    