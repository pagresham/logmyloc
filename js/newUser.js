// alert('hello')
var newUser = angular.module('newUser', []);
newUser.controller('newUserCtl', function($scope) {

	setTimeout(function() {
		$('#newuser').show('slide');
	}, 1000)
	
})

