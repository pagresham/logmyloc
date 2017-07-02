<?PHP

/**
 * Check is user is logged in... Whether $_SESSION['user_name'] is set
 * @return boolean 
 */
function isLoggedIn() {
	if(isset($_SESSION['user_name'])) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Default top nav
 * @param  [type] $title [description]
 * @return [type]        [description]
 */
function logmyloc_header($title){
	print "<div data-role='header'>";
	print "<h1>".$title."</h1>";
	print "</div>"; // End data-role="header"
} 


// A function to return an object containing a list of friends of the currently logged user
// @currendId - currently logged in user - as seen in $_SESSION('u_id')
// $db - the database hook
function getFriends($currentId, $db) {
	$query = "SELECT * from users 
		JOIN friends
		ON friends.f_2 = users.u_id
		WHERE friends.f_1 = $currentId";

	$result = $db->query($query);
	if(!$result) {
		die("Terminated" . $db->error);
	}
	$outArr = array();
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		$outArr[] = $rs;
	}
	return $outArr;
}



function getUsers($db) {
	$result = $db->query("SELECT * from users ORDER BY u_name");
	if(!$result) {
		die("Terminated" . $db->error);
	}
	
	$outArr = array();
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		$outArr[] = $rs;   
	}
	return $outArr;
}

?>