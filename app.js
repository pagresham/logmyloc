var app = angular.module('app', []);
app.controller('ctl1', function($scope) {
	$scope.test = 'testing';
	$scope.arr = [];
	$scope.users = {};

	

	// $scope.arr[0] = 'hello';
	$scope.go = function() {
		alert($scope.arr)
		alert($scope.users)
		
	}
 })