$(function() {

	$('#detailsModalA').click(function() {
		var supported = checkGeo();
		$('#geoSupported').html(supported);
		var now = new Date();
		$('#tDate').html(setTime())
	})

	function checkGeo() {
		if (navigator.geolocation) {
			return "True";
		}
		else return "False";
	}

	function setTime() {

		var date = new Date();
		var today = date.toDateString();
		var h = date.getHours();
		var m = date.getMinutes();
		var s = date.getSeconds();
		var amPm = (h < 12) ? " AM" : " PM";
		m = checkTime(m);
		s = checkTime(s);
		h = checkHour(h);
		
		console.log('this is app1.js')
		return today + "  " + h + ":" + m + amPm;
	}

	function checkTime(i) {
	    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	    return i;
	}

	function checkHour(i) {
		if (i > 12) {
			i =  i - 12;
		}
		if (i == 0) {
			i = 12;
		}
		if (i < 10) { 
			i = "0" + i; 
		}
		return i;
	}

})


// alert()
var app1 = angular.module('app1', []);

app1.controller('loginFormCtl', function($scope){
	$scope.username = "";
	console.log($scope.username)
});














//  End Clock functions  //

