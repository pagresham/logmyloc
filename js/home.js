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
		console.log(h)
		var m = date.getMinutes();
		var s = date.getSeconds();
		var amPm = (parseInt(h) < 12) ? " pM" : " PM";

		m = checkTime(m);
		s = checkTime(s);
		h = checkHour(h);
		
		// return  h + ":" + m + ":" + s;
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


var homeModule = angular.module('homeModule', []);

homeModule.controller('home.formCtl', function($scope){
	console.log('home.formCtl')
});

homeModule.controller('testctl', function($scope, $timeout, $interval) {
	// $scope.testinfo = 0;
	// $interval(function(){
	// 	$scope.testinfo += 1;
	// 	if($scope.testinfo % 2 == 0) {console.log('thats odd' + $scope.testinfo)}
	// }, 1000)
})


homeModule.controller('home.mapCtl', function($scope, $interval, $timeout) {
	$scope.lat = "";
	$scope.lng = "";
	var lt = "";
	var ln = "";

	// while lat is empty, check for updates
	if($scope.lat == "") {
		$interval(function() {
				$scope.lat = lt;
		}, 100)
	}
	
	// listener for update info button
	$('#scopeBtn').click(function() {
		console.log($scope)
	})



	if (navigator.geolocation) {
		// navigator.geolocation.getCurrentPosition(showPosition, showError);
		navigator.geolocation.watchPosition(showPosition, showError);

	}
	else {
		$('#map1').html("<h3>Darn</h3><p>It looks like the HTML Geolocation Service is not available at this time.</p>")
	}

	function showPosition(position) {
		
		lt = position.coords.latitude;
		ln = position.coords.longitude;
		var latLng = new google.maps.LatLng(lt,ln);
		
		// var marker = new google.maps.Marker()

		$scope.lat = lt;
		$scope.lng = ln;

		// create new geocoder
		var geocoder = new google.maps.Geocoder();
		// request geo info for given latLng
		geocoder.geocode({'location': latLng}, function(results, status) {
			
			if (status == google.maps.GeocoderStatus.OK) {
				// console.log(results);
				var addCompArry = results[0].address_components;
				console.log(addCompArry)
				for(var i = 0; i < addCompArry.length; i++) {
					if(addCompArry[i].types[0] == 'locality') {
						// console.log(addCompArry[i].long_name)
						$scope.city = addCompArry[i].long_name;
					}
					if(addCompArry[i].types[0] == 'administrative_area_level_1') {
						// console.log(addCompArry[i].long_name);
						$scope.state = addCompArry[i].long_name;
					}
					if(addCompArry[i].types[0] == 'country') {
						// console.log(addCompArry[i].long_name);
						$scope.country = addCompArry[i].long_name;
					}
					if(addCompArry[i].types[0] == 'postal_code') {
						// console.log(addCompArry[i].long_name);
						$scope.zip = addCompArry[i].long_name;
					}
				}
			}
		})

		mapInit(latLng);
	}


	var x = document.getElementById('errorMsg');
	
	function showError() {
		switch(error.code) {
	        case error.PERMISSION_DENIED:
	            x.innerHTML = "User denied the request for Geolocation."
	            break;
	        case error.POSITION_UNAVAILABLE:
	            x.innerHTML = "Location information is unavailable."
	            break;
	        case error.TIMEOUT:
	            x.innerHTML = "The request to get user location timed out."
	            break;
	        case error.UNKNOWN_ERROR:
	            x.innerHTML = "An unknown error occurred."
	            break;
	    }
	}

	function mapInit(loc) {
		var mapOptions = {
			zoom: 10,
			// center: new google.maps.LatLng(51.508742,-0.120850)
			center: loc
		}

		var map = new google.maps.Map($('#map1').get(0), mapOptions);

	}


});













