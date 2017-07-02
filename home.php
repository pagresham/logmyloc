

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

$dbError =$lat =$lng =$title =$city =$state =$country =$comments =$zip =$timeDate = "";
$errors = array();
// need to error check all of this!!! 
if(isset($_POST['submitLoc'])) {
	if(isset($_SESSION['u_id'])) {
		$u_id = $_SESSION['u_id'];
	}
	else { $errors['u_id'] = "There is a problem with your user ID."; }


	if(!empty($_POST['lat'])) {
		$lat = trim($_POST['lat']);
		if (strlen($lat) !== 0  && strlen($lat) <= 45) {
			$lat = addslashes($lat);
		} else $errors['lat'] = "There was a problem with the Latitude value.";
	}
	if(!empty($_POST['lng'])) {
		$lng = trim($_POST['lng']);
		if (strlen($lng) !== 0  && strlen($lng) <= 45) {
			$lng = addslashes($lng);
		} else $errors['lng'] = "There was a problem with the Longitude value.";
	} 
	
	if(!empty($_POST['city'])) {
		$city = trim($_POST['city']);
		if (strlen($city) !== 0  && strlen($city) <= 45) {
			$city = addslashes($city);
		} else $city = "";
	} 

	if(!empty($_POST['state'])) {
		$state = trim($_POST['state']);
		if (strlen($state) !== 0  && strlen($state) <= 45) {
			$state = addslashes($state);
		} else $state = "";
	} 

	if(!empty($_POST['country'])) {
		$country = trim($_POST['country']);
		if (strlen($country) !== 0  && strlen($country) <= 45) {
			$country = addslashes($country);
		} else $country = "";
	} 

	if(!empty($_POST['zip'])) {
		$zip = trim($_POST['zip']);
		if (strlen($zip) !== 0 && strlen($zip) <= 16) {
			$zip = addslashes($zip);
		} else $zip = "";
	}

	// Cant get error to show!!!
	if(!empty($_POST['title'])) {
		$title = trim($_POST['title']);
		if (strlen($title) !== 0  && strlen($title) <= 45) {
			$title = addslashes($title);
		} else $errors['title'] = "There was an error with the title";
	} 
	
	if(!empty($_POST['comments'])) {
		$comments = trim($_POST['comments']);	
		if(!strlen($comments) !== 0 && strlen($comments) <= 255) {
			$comments = addslashes($comments);
		} else $errors['comments'] = "There was a problem with the comments you entered. Max 255 characters.";
	}
	
	$dateTime = date( 'y-m-d h:m:s');

	
	$errorCount = count($errors);

	if(count($errors) == 0) {
		$insertQ = "INSERT INTO logs
				(u_id, lat, lng, city, state, country, zip, comments, title)
				VALUES('$u_id', $lat, $lng, '$city', '$state', '$country', '$zip', 
					'$comments', '$title')";

		if($db->query($insertQ) == true) {
			// print_r("Successful Insert!");
			header("Location: unset.php");
		}
		else {
			$dbError = "There was an error at the insert!<br>";
			$dbError .= "<br>Error: " . $insertQ . "<br>" . $db->error;
		}
	} 

	
	
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

			

			<div class="home-form-div  map-bkg">
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


								<p style="display: none">
									<input type="text" name="lat" id="lat" ng-model="lat2" required readonly style="width: 4em;">
									
									<input type="text" name="lng" id="lng" ng-model="lng" required readonly style="width: 4em;">
								</p>

								<div style="display: none">
									<input type="text" name="city" id="city" ng-model="city" readonly style="width: 8em;">
									
									<input type="text" name="state" id="state" ng-model="state" readonly style="width: 8em;">
									
									<input type="text" name="country" id="country" ng-model="country" readonly style="width: 8em;">
									
									<input type="text" name="zip" id="zip" ng-model="zip" readonly style="width: 6em;">
								</div>

								<div>
									<label for="title">Loc Title:</label>
									<input class="form-control" type="text" name="title" id="title" ng-model="title" placeholder="Optional Title" maxlength="47">
								
									<label for="comments">Comments:</label>
									<textarea class="form-control" ng-model="comments" id="comments" name="comments" placeholder="Optional Comments" maxlength="255"></textarea>
								</div>
							</div>
							
						</div>
						
						<div class="text-center">
							<button type="submit" class="btn btn-primary btn-sm" name="submitLoc" id="submitLoc" ng-disabled="locForm.lat.$invalid || locForm.lng.$invalid">LogMyLoc!</button>
						</div>
						
							
						
						
					</form>
					
				</div>
			</div>
			<div style="color:red">
				<small id="errorMsg"></small>
				<small id="db-error"><?PHP echo $dbError; ?></small>
				<small><?PHP echo (count($errors) > 0) ? reset($errors) : ""; ?></small>	
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