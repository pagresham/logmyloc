<?PHP
include "header.php";
print "<body>";
include "navbar.php";




?>
<div ng-app="admin">
	<div ng-controller="admin.ctl1">
		<p>{{ userArr[0].First }}</p>
		<!-- <button ng-click="showUser(0)">here</button> -->
		<ul >
			<li ng-repeat="user in userArr">{{ user.First }} {{ user.Last }} {{ user.Id }} {{ user.Username }}</li>
		</ul>
	</div>
	
</div>




</body>
</html>