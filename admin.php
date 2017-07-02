<?PHP
include "header.php";
print "<body>";
include "navbar.php";

$friendsArr = array();
$usersArr = array();
$grant = array();

// $_SESSION['u_id'] == currently logged in user
// $_POST['accessRemove/add'] = id of user whose permissions to change

if(isLoggedIn()) {
	$friendsArr = getFriends($_SESSION['u_id'], $db);	
	// print_r($friendsArr);
	$usersArr = getUsers($db);
	// print_r($usersArr);
	// If the form submit is pressed...
	if(isset($_POST['accessAdd'])) { // users pressed submit to update permissions
		$u = $_POST['accessAdd'];
		// print_r($u." is the user id in question - Add<br>");
		
		$sql = "INSERT INTO friends
						(f_1, f_2)
						VALUES('".$_SESSION['u_id']."', '".$u."')";

		$rs = $db->query($sql);
		if(!$rs) {
			die("Connection Terminated at INSERT friend: " . $db->error);
		}  else header("Location: admin.php");
	}
	else if (isset($_POST['accessRemove'])) {
		$u = $_POST['accessRemove'];
		// print_r($u." is the user id in question- Remove<br>");
		
		$sql = "DELETE FROM friends 
						WHERE f_1 = '". $_SESSION['u_id'] ."'
						AND f_2 = '" . $u . "'"; 

		$rs = $db->query($sql);
		if(!$rs) {
			die("Connection Terminated at DELETE friend: " . $db->error);
		}  else header("Location: admin.php");

	}
	else if (isset($_POST['removeUser'])) {
		$userId = $_POST['removeUser'];

		// Dont select 12, or Pierce
		$sql1 = "DELETE FROM logs WHERE u_id = '$userId'";
		$sql2 = "DELETE FROM friends WHERE f_1 = '$userId'";
		$sql3 = "DELETE FROM users WHERE u_id = '$userId'";

		$rs = $db->query($sql1);
		if(!$rs) {
			die("Connection Terminated: " . $db->error);
		}
		$rs = $db->query($sql2);
		if(!$rs) {
			die("Connection Terminated: " . $db->error);
		}
		$rs = $db->query($sql3);
		if(!$rs) {
			die("Connection Terminated: " . $db->error);
		}
		else { 
			header("Location: admin.php");
			print "sql was true";
			print $userId."<br>";
			}
	}

}



?>
<div ng-app="admin">
	<div ng-controller="admin.ctl1">
		
		
		
		<!-- Add a component to allow a user to grant / recind permission to a friend -->
		<!-- For them to see the users locations. 'make them a friend' -->
		<!-- Show a list of all users, and show whether or not they are already friends -->
		<!-- Then allow logged in user to friend or unfriend them -->
		
		<div class='home-form-div map-bkg'>
			
			<div class="log-space text-center" id="adminTable">
				<h3><a href="#" id="showPermissions">Update Permissions</a></h3>
				<form style='' method="post" action="admin.php" class="text-left" >
					<table class="userPermTable">
					<tr><th class="hide750">First</th><th class="hide750">Last</th><th>Username</th><th>Action</th></tr>
					
					<?PHP
					// go through all users, print their info, and a check box
					// indicating whether they already have permissions or not. 
					// Allow user to select users, and add them to their Granted list.
					foreach ($usersArr as $user) {
						
						if($user['u_id'] != $_SESSION['u_id']) {
							// Find out if $user['u_id'] is already in $friendsArr //
							// If so mark the check box checked //
							$checked = "";
							$addClass = "noFriendClass";
							$friendBool = false;

							foreach ($friendsArr as $friend) {
								
								if($friend['u_id'] == $user['u_id']) {
									$checked = 'checked';
									$addClass = 'friendClass';
									$friendBool = true;
								}
							}

							print "<tr class='" . $addClass . "'>";
							print "<td class='hide750'>". $user['f_name'] ."</td>";
							print "<td class='hide750'>". $user['l_name'] ."</td>";
							print "<td>" . $user['u_name'] . "</td>";
							// print "<td><input type='checkbox' name='grant[]' ". $checked ." disabled></td>";
							if($friendBool) {
								print "<td><button class='btn btn-xs btn-warning' type='submit' name='accessRemove' value='". $user['u_id'] ."'>Remove</button></td>";
							} else {
								print "<td><button style='width:100%'   class='btn btn-xs btn-success' type='submit' name='accessAdd' value='". $user['u_id'] ."'>Add</button></td>";
							}
							print "</tr>";
						}
					}

					print "</table>";
				
					//<!-- <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a>  -->
				print "</form>";	
				

				//<!-- Modal -->
			  
				$count2 = 0;
			  foreach ($usersArr as $key => $user) {

			  	print "<div class='modal fade' id='mod" . $count2 . "' role='dialog'>
			   	 <div class='modal-dialog'>";
			  	$count2++;
			    	
			      
			      //<!-- Modal content-->
			      print "<div class='modal-content text-left'>";
			        print "<div class='modal-header'>";
			          print "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
			          print "<h4>User Info<h4>";
			        print "</div>";
			        print "<div class='modal-body'>";
			        	print "<p>UserName: ". $user['u_name'] ."</p>";
			        	print "<p>UserId: ". $user['u_id'] ."</p>";
			          print "<p>Name: ". $user['f_name'] ." ". $user['l_name'] ."</p>";
			        print "</div>";
			      print "</div>";
			      
			    print "</div></div>";	
			  }


				print "<div>";
					
				if($_SESSION['u_id'] == 12) {
				?>
				<h3><a href="#" id="">Remove User</a></h3>
					<form method="post" action="admin.php" class="text-left">
						<table class="userPermTable" >
							<tr><th>Username</th><th class="hide750"></th><th class="hide750">
							</th><th class="hide750"></th><th>Remove User</th></tr>
						<?PHP
						$count = 0;
						foreach ($usersArr as $key => $user) {
							print "<tr>";
							print "<td><a href='#' data-toggle='modal' data-target='#mod".$count."' >". $user['u_name'] ."</a></td>";
							$count++;
							print "<td class='hide750'>" . $user['f_name'] . "</td>";
							print "<td class='hide750'>" . $user['l_name'] . "</td>";
							
							print "<td class='hide750'>" . $user['u_id'] . "</td>";
							print "<td><button type='submit' class='btn btn-xs btn-danger' 
							value='" . $user['u_id'] . "' name='removeUser'>Remove</button></td>";
							print "</tr>";
						}
						?>
						</table>
						
					</form>



				<?PHP
				}
				?>
					
				</div>
				
				<h3><a href="#" id="">Next Admin Task</a></h3>
			</div>
			
		</div>
		<!-- Error message -->
		<div style="color:red">
		</div>
		
		<!-- Potential map div -->
		<!-- <div id="map1" style="position: relative">
			<div id="spinner" style="display: none">
				<img id="img-spinner" src="ajax-loader.gif" alt="Loading/">
			</div>
		</div> -->

	</div>
	
</div>




</body>
</html>