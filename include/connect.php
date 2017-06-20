<?PHP
$connectMessage = '';
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($db->connect_error) {
	die("Connection failed: ". $db->connect_error);
}
else {
	// echo "Connected successfully";
}
?>