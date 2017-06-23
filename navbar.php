<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a href="index.php" class="navbar-brand"><img id="nav-logo" src="img/logo3.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav">

        <?PHP
        print (isLoggedIn()) ? "<li ><a href='home.php'>Home</a></li>" : "";
        

        ?>
        </ul> 



        

        <?PHP

        // I could make this work, but I would rather have it be a nice dropdown, or some other cleaner UI component. Tomorrow, Tomorrow, I love you Tomorrow.

        if (isLoggedIn()) {
              $uid = $_SESSION['u_id'];
              print "<form action='view.php' method='post' name='anotherForm' class='navbar-form navbar-left'>";
              $sql = "SELECT u.f_name, u.l_name, u.u_name, u.u_id
                      FROM users u
                      JOIN friends f
                      ON u.u_id = f.f_2
                      WHERE f.f_1 = '$uid'";
              $rs = $db->query($sql);
              if (!$rs) {
                die("Connection Terminated at SELECT friends: " . $db->error);
              } 
              else {

                print "<div class='form-group'><select class='form-control'>";

                while($row = mysqli_fetch_assoc($rs)) {
                  print_r($row);
                  print "<option value='".$row['u_id']."'>".$row['f_name'] . " " .$row['l_name'].$row['u_id']."</option>";
                }
                print "</select></div>";
                print "<button  class='btn btn-default ' type='submit' name='submit_friend'>Check On Friends</button>";

              }
              print "</form>";
            }
        ?>

          
        
        <ul class="nav navbar-nav navbar-right">
          
          <?PHP 
          if(isLoggedIn()) {
            print "<li><a id='detailsModalA' data-toggle='modal' data-target='#detailsModal'><span class='glyphicon glyphicon-modal-window'></span> Details</a></li>";

            print "<li><a type='submit' value='logout' href='logout.php'><span class='glyphicon glyphicon-log-out'></span> LogOut</a></li>";
            print "<li ><a href='admin.php'>Admin</a></li>";
            }
            else {
              print "<li><a href='new-user.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
              print "<li><a href='index.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
            }
           ?>
         
          

        </ul>
      </div>
    </div>
  </nav>
  <div id="detailsModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="text-center">
                   
                </div>
                  <p><span class="glyphicon glyphicon-user"></span> User: <?PHP echo (isset($_SESSION['user_name'])) ? $_SESSION['user_name'] : "" ?></p>
                  <p><span class="glyphicon glyphicon-globe"></span> Geolocation Supported: <span id="geoSupported"></span></p>
                  <p><span class="glyphicon glyphicon-calendar"></span> Date: <span id="tDate"></span></p>
                </div>
                <div class="modal-body">
                  
                
                </div>
              </div>
            </div>
          </div>
