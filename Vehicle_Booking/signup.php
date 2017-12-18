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
 
  <div class="container">
      <div class="col-sm-4">
        
      </div>
    <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_register'])) {
             $result = $user->userRegistration($_POST);
        }
    ?>
      <div class="col-sm-5">

        <h2 style="color: #286090" >Creat a new account</h2>
        <?php 
          if (isset($result)) {
            echo $result;
          }
        ?>
        <form  method="post">     
           <table>
               <div class="form-group">  
                  <input type="text" name="name" class="form-control" placeholder="Full Name">
               </div>

               <div class="form-group">  
                  <input type="text" name="email" class="form-control" placeholder="Email">
               </div>

               <div class="form-group"> 
                  <input type="password" name="password" class="form-control" placeholder="Password">
               </div>

               <div class="form-group">
                  <input type="text" name="address" class="form-control" placeholder="Address">
               </div>
           </table>
           <button class="btn btn-success" name="user_register">Create Account</button>
           <button style="margin-left: 50px" type="button" name="#" class="btn btn-success"><a style="color: #fff" href="userlogin.php">Log In</a></button>
          <div class="clear"></div>
        </form>
        <?php 
           echo date("d/m/Y");
           echo date("l");
         ?>
        </div>
        <div class="col-sm-3">
        </div>

  </div>

<?php include 'inc/footer.php'; ?>