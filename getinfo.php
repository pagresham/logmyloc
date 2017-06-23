<?PHP
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

	    $outp .= '{"First":"' . $rs["f_name"] . '",';
	    $outp .= '"Last":"'  . $rs["l_name"] . '",';
	    $outp .= '"Username":"'  . $rs["u_name"] . '",';
	    $outp .= '"Id":"'   . $rs["u_id"] . '"}';
	    
	   
	}

	$outp ='{"Users":['.$outp.']}';
	$conn->close();
	echo $outp;
	

}



?>