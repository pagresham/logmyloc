var view = angular.module('view', []);

view.controller('view.ctl1', function($scope, $timeout) {
	$scope.firstName;
	$scope.lastName;
	$scope.fLocs = [];

	// Figure why this query isnt working right
	// $scope.show = function(ev) {
	// 	// alert("Viewing locations for : " + $scope.firstName + " " + $scope.lastName);
	// 	alert($scope.fLocs.length)
	// 	console.log(ev.target.id)
	// 	// console.log($scope.fLocs[this.$id]);
	// 	// alert(this)
	// }

	$('.showLocBtn').each(function() {

		this.addEventListener('click', function() {
			
			var latLng = new google.maps.LatLng($scope.fLocs[this.id].lat, $scope.fLocs[this.id].lng);
			
			// Issue !! Marker title is incorrect
			// 
			mapInit(latLng);
		})


		
	})

	// function show() {
		
	// }






	$('#spinner').show();

	$timeout(function() {
		$('#friendLocTbl').show('slide');
	}, 500);

	if (navigator.geolocation) {
		// navigator.geolocation.getCurrentPosition(showPosition, showError);
		navigator.geolocation.watchPosition(showPosition, showError);
	}
	else {
		$('#map1').html("<h3>Darn</h3><p>It looks like the HTML Geolocation Service is not available at this time.</p>")
	}










	var x = document.getElementById('errorMsg');

	function showError(error) {
		console.log("Error Code: " + error.code)
	}

	function showPosition(position) {
		
		var lt = position.coords.latitude;
		var ln = position.coords.longitude;
		var latLng = new google.maps.LatLng(lt,ln);
		
		$scope.comma = ','
		$scope.lat = lt;
		$scope.lng = ln;
		$scope.lat2 = lt;


		// create new geocoder
		var geocoder = new google.maps.Geocoder();
		// request geo info for given latLng
		geocoder.geocode({'location': latLng}, function(results, status) {
			
			if (status == google.maps.GeocoderStatus.OK) {
				// console.log(results);
				var addCompArry = results[0].address_components;
				// console.log(addCompArry)
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
				$scope.lat = lt;
				$scope.lng = ln;
				mapInit(latLng);
				$('#spinner').hide();
			}
		})
	}


	
	function mapInit(loc, city) {
		var mapOptions = {
			zoom: 10,
			scrollwheel: false,
			center: loc
		}

		var map = new google.maps.Map($('#map1').get(0), mapOptions);

		var marker = new google.maps.Marker({
          position: loc,
          map: map,
          title: $scope.city + ", " + $scope.state
        });
        // 1 define content
        // 2 create new InfoWindow
        // 3 create listener that will display window
        var infoContent = "<h4>" + $scope.city + ", " + $scope.state + "</h4>"

        var infoWindow = new google.maps.InfoWindow({
        	content: infoContent
        })

        // I should decide on which style of selection I like here
        // Mobile touch, and mouse action feel different
        marker.addListener('mouseover', function () {
        	infoWindow.open(map, marker)
        })
        marker.addListener('mouseout', function () {
        	infoWindow.close()
        })
        
        // Possible add the functionality where the map re-centers on screen resize.
        map.addListener('resize', function() {
        	console.log('im melting!!!')
        });
      
      	// Listeners to re-center map when screen size changes  
        var center;
        google.maps.event.addDomListener(map, 'idle', function() {
			center = map.getCenter();
			// console.log(center.lat())
		});
		google.maps.event.addDomListener(window, 'resize', function() {
			map.setCenter(center);
		});
	}








})