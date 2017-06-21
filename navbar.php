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
          
          <!-- <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li> -->
          <!-- <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li> -->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          
          <?PHP 
          if(isLoggedIn()) {
            print "<li><a id='detailsModalA' data-toggle='modal' data-target='#detailsModal'><span class='glyphicon glyphicon-modal-window'></span> Details</a></li>";

            print "<li><a type='submit' value='logout' href='logout.php'><span class='glyphicon glyphicon-log-out'></span> LogOut</a></li>";
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