<?PHP
include "header.php";
print "<body>";
include "navbar.php";

$testMessage = "";
$fLocs = [];

if(isset($_POST['submit_friend'])) {
	// $testMessage = "you came here with post submit_friend";
	if(isset($_POST['friendId'])) {
		$friendId = $_POST['friendId'];
		// $testMessage .= "  " . $friendId;


		// Rewrite this query to get also the name of the friend

		$qe = "SELECT time, city, state, lng, lat, logs.u_id, u.f_name, u.l_name 
				FROM logs 
				JOIN users u
				ON logs.u_id = u.u_id 
				WHERE logs.u_id = '$friendId'";



		$rs = $db->query($qe);
		if (!$rs) {
			die("Connection Terminated at friend log SELECT: " . $db->error);
		}
		else {
			if ($rs->num_rows > 0){
				
				while ($row = mysqli_fetch_assoc($rs)) {
					$fLocs[] = $row;
				}
			}
			else {
				$errorMsg = "Sorry, this User hasn't recorded any locations yet.";
			}
			
		}
	}
}

// [log_id] => 64 [u_id] => 12 [lat] => 44.3383324 [lng] => -72.7597778 [city] => Waterbury [state] => Vermont [country] => United States [zip] => 05676 [time] => 2017-06-21 12:24:00 [comments] => I live here with my family [title] => Home )

?>
<div ng-app="view">
	<div ng-controller="view.ctl1">
	<div class="home-form-div map-bkg">
		<div class="log-space" id="friendLocTbl">
			<?PHP
				
			
				
				
				
				if(count($fLocs) > 0) {
					$first =$last = "";
					$dateRangeQuery = "SELECT date(min(time)) AS first, date(max(time)) AS last from logs
						WHERE u_id = $friendId";

					$rs = $db->query($dateRangeQuery);

					if(!$rs) {
						die("Connection Terminatedat Select min/max date: " . $db->error);
					}
					else {
						$row = mysqli_fetch_assoc($rs);
						$first = $row['first'];
						$last = $row['last'];
					}


					$f_name = $fLocs[0]['f_name'];
					$l_name = $fLocs[0]['l_name'];
					print "<div class=''>Locations for: <b><span ng-init='firstName=\"" . $f_name . "\"'>{{ firstName }} </span><span ng-init='lastName=\"" . $l_name . "\"'>{{ lastName }}</span></b></div><div class='text-right'><b>From: </b>" . $first . " <b>To: </b>" . $last . "</div>";

					print "<div style='padding: 0 1em; margin: .5em 1em; '><table style=''><tr><th>City</th><th>State</th><th>Time</th><th>this</th></tr></table></div>";
					print "<div class='well friendLocWell'>";
				
					$id = "";
					print "<table>";

					for($i = 0; $i < count($fLocs); $i++){
						$id = $i;
						print "<tr>";
						print "<td ng-init='fLocs[".$id ."].city=\"".$fLocs[$id]['city']."\"'>".$fLocs[$id]['city']."</td>";

						print "<td ng-init='fLocs[".$id ."].state=\"".$fLocs[$id]['state']."\"'>".$fLocs[$id]['state']."</td>";

						print "<td ng-init='fLocs[".$id ."].time=\"".$fLocs[$id]['time']."\"'>".$fLocs[$id]['time']."</td>";

						print "<td class='hide' ng-init='fLocs[".$id ."].lat=\"".$fLocs[$id]['lat']."\"'>".$fLocs[$id]['lat']."</td>";

						print "<td class='hide' ng-init='fLocs[".$id ."].lng=\"".$fLocs[$id]['lng']."\"'>".$fLocs[$id]['lng']."</td>";


						print "<td><button class='showLocBtn mapMe btn btn-default btn-xs' id='".$id."'>MapMe</button></td>";


						print "</tr>";
					}
					print "</table>";
				}
				else {
					print "<div>";
					if (!empty($errorMsg)) {
						print "<p>" . $errorMsg . "</p>";
					}
				}

				
				?>
				
			</div>
		</div>
	</div>
	
	
		<!-- <p>{{ userArr[0].First }}</p> -->
		<!-- <button ng-click="showUser(0)">here</button> -->
		<!-- <ul >
			<li ng-repeat="user in userArr">{{ user.First }} {{ user.Last }} {{ user.Id }} {{ user.Username }}</li>
		</ul> -->
	</div>
	<div><?PHP echo !empty($testMessage) ? $testMessage : ""; ?></div>

	<div id="map1" style="position: relative">
		<div id="spinner" style="display: none">
			<img id="img-spinner" src="ajax-loader.gif" alt="Loading/">
		</div>
	</div>

</div>




</body>
</html>