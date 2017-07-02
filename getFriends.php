<?PHP
// This script returns an object containing all of the friends of the 'current user'  //

require('include/config.php');

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_error) {
	die("Connection failed: ". $conn->connect_error);
}
else {
	//$result = mysqli_query($db, "SELECT * from users");
	$currentUser = 13;
	$query = "SELECT * from users 
		JOIN friends
		ON friends.f_2 = users.u_id
		WHERE friends.f_1 = $currentUser";

	$result = $conn->query($query);
	if(!$result) {
		die("Terminated" . $conn->error);
	}
	$outp = "";
	$outArr = array();
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		$outArr[] = $rs;
	    
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"f_name":"' . $rs["f_name"] . '",';
	    $outp .= '"l_name":"'  . $rs["l_name"] . '",';
	    $outp .= '"u_name":"'  . $rs["u_name"] . '",';
	    $outp .= '"friend_id":"'   . $rs["u_id"] . '"}';
	}

	$outp ='{"Friends":['.$outp.']}';
	$conn->close();
	echo $outp;
}













?>