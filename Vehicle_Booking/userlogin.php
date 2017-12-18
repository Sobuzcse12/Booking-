<?php include 'inc/header.php';?>
<?php 
  include 'classes/user.php';
?>
<?php 
  
  // $login = Session::get("userlogin");
  // if ($login == true) {
  //   header("Location:404.php");
  // }
    $user = new User();
    
?>
<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_login'])) {
        $result = $user->userLogin($_POST);
    }
?> 
  <div class="container">
      <div class="col-sm-4">
        
      </div>
      <div class="col-sm-5">
           
                 <div style="background-color: #ddd;height: 300px;">

        <form class="form" method="post" style="margin-top: 80px;padding-top: 20px;padding-left: 20px;padding-right: 20px">
                  <legend style="color: #286090" >Log In</legend>
                   <?php 
                      if (isset($result)) {
                        echo $result;
                      }
                    ?>              
                 <table>
                     <div class="form-group" style="padding-right: 10px">            
                        <input type="text" name="email" class="form-control" placeholder="Email">
                     </div>

                     <div class="form-group" style="padding-right: 10px">           
                        <input type="password" name="password" class="form-control" placeholder="Password">
                     </div>
                    
                     <div class="form-group">
                        <button type="submit" name="user_login" class="btn btn-success">Log in</button>
                        <button style="margin-left: 50px" type="button" name="#" class="btn btn-success"><a style="color: #fff" href="signup.php">Sign Up</a></button>
                     </div>

                      <br><a style="padding-left: 200px; padding-top: 4px;color:#fff " href="#">Forgotten password?</a>                   
                 </table>     
        </form>
      </div>
     
        </div>
        <div class="col-sm-3">
        </div>

  </div>
<?php include 'inc/footer.php'; ?>