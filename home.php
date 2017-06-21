

<?PHP

// Home 
// Contains Map, that is constantly updated with you current location.
// One touch, will store location information to DB under logged in user.
// Optional info can be added to location info.
// Manual information could be added, if user was not confident about returned results



// Other page, allow access to my past locations, and friends locations
// Map those, and display info about.


include "header.php";
print "<body>";
include "navbar.php"; 

$lat =$lng =$title =$city =$state =$country =$comments =$zip =$timeDate = "";
 
// need to error check all of this!!! 
if(isset($_POST['submitLoc'])) {
	if(isset($_SESSION['u_id'])) {
		$u_id = $_SESSION['u_id'];
	}

	$lat = addslashes($_POST['lat']);
	$lng = addslashes($_POST['lng']);
	$city = addslashes($_POST['city']);
	$state = addslashes($_POST['state']);
	$country = addslashes($_POST['country']);
	$zip = addslashes($_POST['zip']);
	$title = addslashes($_POST['title']);
	$comments = addslashes($_POST['comments']);
	$dateTime = date( 'y-m-d h:m:s');
	$_POST['dateTime'] = $dateTime;
	// Check array value, but causes header problems when included
	// print_r($_POST);
	// print_r($u_id);
	$insertQ = "INSERT INTO logs
				(u_id, lat, lng, city, state, country, zip, comments, title)
				VALUES('$u_id', $lat, $lng, '$city', '$state', '$country', '$zip', 
					'$comments', '$title')";
	if($db->query($insertQ) == true) {
		print_r("Successful Insert!");
	}
	else {
		print_r("<br>There was an error at the insert!");
		echo "<br>Error: " . $insertQ . "<br>" . $db->error;
	}
	header("Location: unset.php");
}

if(!isLoggedIn()) {
	header("Location: index.php");
} else {
?>
<div ng-app="homeModule">
	<div>
		<!-- <div ng-controller="home.formCtl">
			
		</div> -->

		<div ng-controller='home.mapCtl'>

			

			<div class="home-form-div">
				<div class="log-space" id="locform">
					<form name="locForm" method="post" action="home.php" id="locForm">
						
						<div class="text-center">
							<p><b>Location:</b> {{ city }}{{ comma }}  {{ state }}</p>
							<a id="more-detail-btn" class="btn btn-default btn-xs">Details</a>
						</div>
						<div id="loc-details">
							<div class="well text-center loc-well">
							
							
							
							
								<p><b>Lat:</b> {{ lat2 }}</p>
								<p><b>Lng:</b> {{ lng }}</p>
								<p>{{ city }}, {{ state }}</p>
								<p>{{ country }} {{ zip }}</p>


								<p class="form-group">
									<input type="hidden" name="lat" id="lat" ng-model="lat2" required readonly style="width: 4em;">
									
									<input type="hidden" name="lng" id="lng" ng-model="lng" required readonly style="width: 4em;">
								</p>

								<div>
									<input type="hidden" name="city" id="city" ng-model="city" readonly style="width: 8em;">
									
									<input type="hidden" name="state" id="state" ng-model="state" readonly style="width: 8em;">
									
									<input type="hidden" name="country" id="country" ng-model="country" readonly style="width: 8em;">
									
									<input type="hidden" name="zip" id="zip" ng-model="zip" readonly style="width: 6em;">
								</div>

								<div>
									<label for="title">Loc Title:</label>
									<input class="form-control" type="text" name="title" id="title" ng-model="title" placeholder="Optional Title">
								
									<label for="comments">Comments:</label>
									<textarea class="form-control" ng-model="comments" id="comments" name="comments" placeholder="Optional Comments"></textarea>
								</div>
							</div>
							
						</div>
						
						<div class="text-center">
							<button type="submit" class="btn btn-primary btn-sm" name="submitLoc" id="submitLoc">LogMyLoc!</button>
						</div>
						
							
						
						
					</form>
					<p id="errorMsg"></p>
				</div>
			</div>
			
			<div id="map1" style="position: relative">
				<div id="spinner" style="display: none">
					<img id="img-spinner" src="ajax-loader.gif" alt="Loading/">
				</div>
			</div>
			

			
		</div>
		
		
	</div>
</div>




<?PHP
}


?>



	
</body>
</html>