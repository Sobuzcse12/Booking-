<?php include 'inc/header.php';?>
<?php 
  include 'classes/user.php';
?>
<?php 
    $user = new User();
?>  
<?php
    if($_SERVER['REQUEST_METHOD']='POST' && isset($_POST['submit']))
    {
        $result = $user->changepassword($_POST);
    }
?> 
<div class="container-fluid pagehead pad " data-spy="scroll" data-target="#myScrollspy" data-offset="15">
      <div class="col-sm-2">
         <?php include 'inc/sidebar.php';?>
      </div>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4">

        <form  role="form" method="post">
           <h2 style="color: #286090" >Change Password</h2>
                    <?php
                         if(isset($result))
                          echo $result;
                    ?>
           <table>
               <div class="form-group"> 
                  <label>Old Password : </label> 
                  <input type="password" name="oldpass" class="form-control" placeholder="Old Password">
               </div>

                <div class="form-group"> 
                  <label>New Password : </label>  
                  <input type="password" name="newpass" class="form-control" placeholder="New Password">
               </div>
               <div class="form-group">
                  <input type="submit" name="submit" Value="change password" />
               </div>
           </table>
        </form>
        </div>
        <div class="col-sm-4">
        </div>

  </div>
<?php include 'inc/footer.php';?>