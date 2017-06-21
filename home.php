

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
	print_r($_POST);
	print_r($u_id);
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
			<div>
				<form name="locForm" method="post" action="home.php" id="locForm">
					<p>
						<label for="title">Log Title:</label>
						<input type="text" name="title" id="title" ng-model="title" placeholder="Enter a title for you loc">
					</p>
					
					<p>
						<label for="lat">Latitude:</label>
						<input type="text" name="lat" id="lat" ng-model="lat2" required>
						<label for="lng">Longitude:</label>
						<input type="text" name="lng" id="lng" ng-model="lng" required>
						<!-- <input type="text" name="" ng-model='test1'>
						<input type="text" name="" ng-model='test'> -->
					</p>
					<p>
						<label for="city">City:</label>
						<input type="text" name="city" id="city" ng-model="city">
						<label for="state">State:</label>
						<input type="text" name="state" id="state" ng-model="state">
					</p>
					<p>
						<label for="country">Country:</label>
						<input type="text" name="country" id="country" ng-model="country">
						<label for="zip">Zip Code:</label>
						<input type="text" name="zip" id="zip" ng-model="zip">
					</p>
					<p>
						<label for="comments">Comments:</label>
						<textarea ng-model="comments" id="comments" name="comments"></textarea>
					</p>
					
						<button type="submit" class="btn btn-success" name="submitLoc" id="submitLoc">LogMyLoc!</button>
					
					
				</form>
				<button class="btn btn-info" id="scopeBtn">Check Scope Contents</button>
				<p id="errorMsg"></p>
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