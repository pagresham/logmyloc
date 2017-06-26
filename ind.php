<?PHP



?>

<!DOCTYPE html>
<html>
<head>
	<title>A test</title>
	<link rel="stylesheet" href="lib/Bootstrap/css/bootstrap.min.css">
	<script src="lib/jquery-3.2.1.js"></script>
	<script src="lib/angular-1.6.4/angular.min.js"></script>
	<script src="lib/Bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src='app.js'></script>
	<style type="text/css">
		body {
			background-color: #333;
			color: #ccc;
		}
	</style>
	
	<!-- jQuery UI -->
	<!-- <script
	  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
	  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
	  crossorigin="anonymous">  	
	</script> -->
</head>
<body>
	<div ng-app='app' >
	<div ng-controller='ctl1'>
		<p ng-bind='test'></p>
		<p>{{ test }}</p>
		<ul>
		<script type="text/javascript">
		    name = "<?PHP echo 'Pierce' ?>"
			// alert(name)
		</script>
		<?PHP
		// $i = 0;
		$myarr = ['those', 'that', 'theother', 'things'];
		for ($i = 0; $i < 4; $i++) {
			print "<li ng-init='arr[".$i."]=\"".$myarr[$i]."\"'></li>";
			
			print "<li>{{ arr[".$i."] }}</li>";


			print "<li ng-init='users.age=\"".$i."\"'></li>";
			print "<li>{{ users.age }}</li>";
			// $i++;
		}
		

		?>
			
		</ul>

		<button ng-click="go()">GO</button>
	</div>
	
	</div>
</body>
</html>