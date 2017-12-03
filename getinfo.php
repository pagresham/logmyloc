<?PHP
// This script returns a json object of all of the users in the database. // 

require('include/config.php');

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_error) {
	die("Connection failed: ". $conn->connect_error);
}
else {
	//$result = mysqli_query($db, "SELECT * from users");
	$result = $conn->query("SELECT * from users");
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
	    $outp .= '"u_id":"'   . $rs["u_id"] . '"}';
	}

	$outp ='{"Users":['.$outp.']}';
	$conn->close();
	echo $outp;
	
}


	

?>