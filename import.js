export function mapInit(loc, city) {
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
        // marker.addListener('click', function () {
        // 	infoWindow.open(map, marker)
        // })
        
        // Possible add the functionality where the map re-centers on screen resize.
        map.addListener('resize', function() {
        	console.log('im melting!!!')
        });

        // marker.addListener('click', function() {
        // 	map.setZoom(12);
        // })
      
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