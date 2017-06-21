
<?PHP
include "header.php";

$logInError = false;
$username =$password = "";

if(isset($_POST['login'])) {
  // Start username processing
  if(!empty($_POST['username'])) {
    $username = addslashes(trim($_POST['username']));

    if(!strlen(trim($username)) == 0) {
      
      if(!preg_match("/^[a-zA-Z-.@_]{8,}$/", $username) || (strlen($username) > 45)) {
        $logInError = true;
      }
    }
    else{
      $logInError = true;
      print 'strlen is 0';
    } 
  }
  else {
    $logInError = true;
  }
  // End username processing
  
  // Start password processing
  if(!empty($_POST['password'])) {
    $password = $_POST['password'];
    print_r($password."<br>");
    if(!strlen(trim($password)) === 0 || (strlen($password) > 45)) {
      $logInError = true;
    }
  }
  else {
    $logInError = true;
  }
  // end password processing
  
  if(!$logInError) {

    $lq = "SELECT u_id, u_name, f_name, l_name, p_word
            FROM users
            WHERE u_name = '$username'";

    $rs = $db->query($lq);
    if (!$rs) {
      die("Connection Terminated at User Login Select: " . $db->error);
    }
    else {

      // die("Things are good ");
      // check password, with password validate function 
      $row = $rs->fetch_assoc();
      if ($row) {

        if (password_verify($password, $row['p_word'])) {
          print_r("Things are really good ");
          $_SESSION['user_name'] = $username;
          $_SESSION['u_id'] = $row['u_id'];
          $_SESSION['f_name'] = $row['f_name'];
          $_SESSION['l_name'] = $row['l_name'];
          unset($_POST);
          header("Location: home.php");
        }
      }
      else {
        print_r("Things are bad ");
        $logInError = true;
      }
  
    }

  }


}




include "navbar.php";
?>
  
  <!--  -->
  <div ng-app="app1" id="index-page">

    <div  id="log-in">
      
      <?PHP include "infoModal.php" ?>

      <div class="container-fluid log-space" id="login">
        <form name="login-form" action="index.php" method="post" id="login-form" ng-controller="loginFormCtl">
          <h2 class="text-center">Log In</h2>
          <p>
            <label for="username">Username:</label>
            <input class="form-control" type="text" name="username" id="username" required value="<?PHP echo (isset($_POST['username'])) ? $_POST['username'] : "" ?>" ng-model="username">
          </p>
          <p>
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password" required ng=model="password">
            <?PHP print ($logInError) ? "<small class='errorText'>There was a problem with your login information.</small>" : "" ?>
          </p>
          <p class="text-center">
            <input class="btn btn-info" type="submit" name="login" value="Login">
            <a href="new-user.php" class="btn btn-info" type="submit" name="newUser">New User</a>
          </p>
        </form>
      </div>

    </div>

  </div>





</body>
</html>