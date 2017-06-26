<!DOCTYPE html>
<?PHP
require("include/config.php");
require("include/connect.php");
include "helpers/log_helpers.php";
session_start();
?>
<html lang="en">
<head>
	<title>LogMyLoc</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" /> -->
  <?PHP
  print "<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCZKcRqn5KoDKyEWv9bGqBt_t7-t9-C6vk'></script>";
  ?>  
	
	<!-- CDNs -->
	<!-- AngularJS -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> -->

	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

	<!-- jQuery library -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

	<!-- Latest compiled JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	
	

	<!-- Local Files -->
	
	<link rel="stylesheet" href="lib/Bootstrap/css/bootstrap.min.css">
	<script src="lib/jquery-3.2.1.js"></script>
	<script src="lib/angular-1.6.4/angular.min.js"></script>
	<script src="lib/Bootstrap/js/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script
	  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
	  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
	  crossorigin="anonymous">  	
	</script>


	<!-- <script type="text/javascript" src="js/app.js"></script> -->
	
	<?PHP print (strpos($_SERVER['PHP_SELF'], '/index.php')) ? "<script type='text/javascript' src='js/app1.js'>
	</script>" : ""; ?>
	<?PHP print (strpos($_SERVER['PHP_SELF'], '/new-user.php')) ? "<script type='text/javascript' src='js/newUser.js'>
	</script>" : ""; ?>
	<?PHP print (strpos($_SERVER['PHP_SELF'], '/home.php')) ? "<script type='text/javascript' src='js/home.js'>
	</script>" : ""; ?>
	<?PHP print (strpos($_SERVER['PHP_SELF'], '/admin.php')) ? "<script type='text/javascript' src='js/admin.js'>
	</script>" : ""; ?>
	<?PHP print (strpos($_SERVER['PHP_SELF'], '/view.php')) ? "<script type='text/javascript' src='js/view.js'>
	</script>" : ""; ?>
	
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>





