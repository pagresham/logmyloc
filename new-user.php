<?PHP
include "header.php";


$errors = array();
$f_name =$l_name =$u_name =$password1 =$password2 = "";

if(isset($_POST['create'])) {

	// Validate username
	if (!empty($_POST['u_name'])) {
		$u_name = trim($_POST['u_name']);
		if(strlen(trim($u_name)) === 0) {
			$errors['u_name'] = "Invalid Username1";
		}
		else {
			if(!preg_match("/^[a-zA-Z0-9'-.@_]{8,}$/", $u_name)) {
				$errors['u_name'] = "Invalid username2";
			}
			else if (strlen($u_name) > 45) {
				$error['u_name'] = "Invalid Username3";
			}
		}
	}
	else {
		$error['u_name'] = "Please enter a username";
	}

	// Validate First Name 
	if(!empty($_POST['f_name'])) {
		$f_name = trim($_POST['f_name']);
		if(strlen(trim($f_name)) === 0 || (strlen($f_name) > 45)) {
			$errors['f_name'] = "Please enter your first name";
		}
		else if (!preg_match("/^[a-zA-Z0-9]{1,45}$/", $f_name)) {
			$errors['f_name'] = "Names can only include standard letters and number.";
		}
	}
	else {
		$errors['f_name'] = "Please enter your first name";
	}
	// Validate last name
	if (!empty($_POST['l_name'])) {
		$l_name = trim($_POST['l_name']);
		if (strlen(trim($l_name)) === 0) {
			$errors['l_name'] = "No empty strings please";
		}
		else if (strlen($l_name) > 45) {
			$errors['l_name'] = "Last Name is too long";
		}
		else if (!preg_match("/^[a-zA-Z0-9]{1,45}$/", $l_name)) {
			$errors['l_name'] = "Names can only include standard letters and number.";
		}
	}
	else {
		$errors['l_name'] = "Please enter your last name";
	}

	// Validate 1st PW
  	if (!empty($_POST['password1'])) {
    	$password1 = $_POST['password1'];
    	if (strlen(trim($password1)) === 0) {
      		$errors['password'] = "Please enter a valid password";
    	}
    	// else  if (!preg_match ("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password1))  {
     //  		//print $password1;
     //  		$errors['password'] = "Password must contain at least 8 characters and include 1 lower case, 1 upper case, 1 number, and 1 special character";
    	// }
    	else  if (!preg_match ("/^[a-zA-Z0-9#?!@$%^&*-]{8,}$/", $password1))  {
      		//print $password1;
      		$errors['password'] = "Passwords may contain letters, numbers, and some special characters, and must have a min of 8 characters.";

    	}
  	}
  	else {
      $errors['password'] = "Password is a required field";
  	}
  	// Password 2
  	if (isset($_POST['password2'])) {
    	$password2 = $_POST['password2'];
    	if($password1 != $password2) {
      		$errors['password2'] = "Passwords do not match";
    	}
  	}
  	else {
    	$errors['password2'] = "Plese re-enter you password";
  	}

  	$errorCount = count($errors);
  	if ($errorCount > 0) {
  		// print "<small class='errorText'>There are errors. Please make corrections and try again</small>";
  	}
  	else { // check if username is available, then create the account
  		// print "<small class='Text'>Congrats, there are no errors</small>";
  		$uq = "SELECT * FROM users WHERE u_name = '$u_name'";
  		$uRs = $db->query($uq);
  		if(!$uRs) {
  			die("Connection Terminated at username Select: ".$db->error);
  		}
  		if($uRs->num_rows > 0) {
  			$error['u_name'] = "This Username is already in use.";
  		}
  		else {
  			$u_name = addslashes($u_name);
  			$f_name = addslashes($f_name);
  			$l_name = addslashes($l_name);
  			$hashedPW = password_hash($password1, 1);
  			$memsince = date("Y-m-d");
  			print $memsince;
  			$insertQuery = "INSERT INTO users
  					(f_name, l_name, u_name, p_word, memsince)
  					VALUES('$f_name', '$l_name', '$u_name', '$hashedPW', '$memsince')";

  			if ($db->query($insertQuery) == false) {
  				die("Connection Terminated at User Insert: " . $db->error);
  			}
  			else {
  				// print "new user submitted";
  				header("Location: index.php");
  			}
  		}
  	}
}

print "<body>";
include "navbar.php";
?>

<div ng-app="newUser" id="newuser-page">
	
	<div  id="createUser">
  <?PHP include "infoModal.php" ?>  

	<div class="container-fluid log-space" ng-controller='newUserCtl'>

		<form method="post" action="new-user.php" name="newUserForm" >
			<h2 class="text-center">Create a New User</h2>

			<p>
				<label for="u_name">User Name</label>
				<input class="form-control" type="text" name="u_name" id="u_name" value="<?PHP echo (isset($_POST['u_name'])) ? $_POST['u_name'] : "" ?>" required ng-model="u_name">

				<span style="color:black" ng-show="newUserForm.u_name.$dirty && newUserForm.u_name.$invalid">Required Field</span>

				<!-- <span ng-show="newUserForm.u_name.$error.required">Username is required.</span> -->

				<small class="errorText"><?PHP echo array_key_exists('u_name', $errors) ? $errors['u_name'] : '' ?></small>		
			</p>
			<p>
				<label for="f_name">First Name</label>
				<input class="form-control" type="text" name="f_name" id="f_name" value="<?PHP echo (isset($_POST['f_name'])) ? $_POST['f_name'] : "" ?>" required ng-model="f_name">
				<span style="color:red" ng-show="new-user-form.f_name.$dirty && new-user-form.f_name.$invalid">Required Field</span>

				<small class="errorText"><?PHP echo array_key_exists('f_name', $errors) ? $errors['f_name'] : '' ?></small>
			</p>
			<p>
				<label for="l_name">Last Name</label>
				<input class="form-control" type="text" name="l_name" id="l_name" value="<?PHP echo (isset($_POST['l_name'])) ? $_POST['l_name'] : "" ?>" required ng-model="l_name">

				<span style="color:red" ng-show="new-user-form.l_name.$dirty && new-user-form.l_name.$invalid">Required Field</span>           

				<small class="errorText"><?PHP echo array_key_exists('l_name', $errors) ? $errors['l_name'] : '' ?></small>
			</p>
			<p>
				<label for="password1">Password</label>
				<input class="form-control" type="password" name="password1" id="password1" required>	

				<span style="color:red" ng-show="new-user-form.password1.$dirty && new-user-form.password1.$invalid">Required Field</span>

				<small class="errorText"><?PHP echo array_key_exists('password', $errors) ? $errors['password'] : '' ?></small>
			</p>
			<p>
				<label for="password2">Re-enter Password</label>
				<input class="form-control" type="password" name="password2" id="password2" required>	
				<small class="errorText"><?PHP echo array_key_exists('password2', $errors) ? $errors['password2'] : '' ?></small>
				
			</p>
			<div class="text-center">
				<input class="btn btn-info" type="submit" name="create" value="Create User">
			</div>
			
		</form>
	</div>
	</div>
</div> 



</body>
</html>

<?PHP

?>
