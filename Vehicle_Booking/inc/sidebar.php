<nav  id="myScrollspy">
  <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
    <li class="active"><a href="#">All Aption</a></li>
      <li><a href="aboutus.php">About Us</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="mybookinglist.php">My Booking</a></li>
      <li><a href="changepassword">Change Password</a></li>
          <?php 
              if (isset($_GET['action']) && ($_GET['action']=="logout")) {
                  Session::destroy();
              }
            ?> 
      <li><a href="?action=logout">Logout</a></li>
  </ul>
</nav>