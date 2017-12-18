<?php 
	  include 'lib/Session.php';
	  Session::init();
	  spl_autoload_register(function($class){
	    include_once "classes/".$class.".php";
	  });
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Vehicle Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
  <div style="padding-bottom: 100px">
      <nav class="navbar navbar-default navbar-fixed-top" style="">   
          <div class="container">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>     
              </button>
               <a class="navbar-brand" href="#">Vehicle Booking Website</a>
                <div class="navbar-collapse collapse">
                   <ul class="nav navbar-nav navbar-right">
                     
                      <?php 
                      	if (Session::get("userlogin")!=true) 
                      		{
                      	?>
                      	<li class="#"><a href="signup.php">Sign Up</a></li>
                      	<li class="#"><a href="index.php">Log In</a></li>
                      	
                      <?php 
                          } 
                          	else {
                      ?>
                      <li class="active"><a href="profile.php"><?php echo Session::get("userName"); ?></a></li>
                      
                      <li class="active"><a href="booking.php">Home</a></li>
                      <li class="#"><a href="booking.php">Booking</a></li>
                      <?php } ?>
                  </ul>
               </div>
          </div>  
      </nav>
  </div>
