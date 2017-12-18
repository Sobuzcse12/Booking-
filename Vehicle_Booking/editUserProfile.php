<?php include 'inc/header.php';?>
<?php 
  include 'classes/user.php';
?>
<?php
  $user = new User();  
?> 
<?php
   $uId = Session::get("id");
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
         $updateUser = $user->userUpdate($_POST, $uId);
    }
?>  
<div class="container-fluid pagehead pad " data-spy="scroll" data-target="#myScrollspy" data-offset="15">
      <div class="col-sm-2">
         <?php include 'inc/sidebar.php';?>
      </div>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4">
        
      <?php  
        $uid     = Session::get("id");
        $getdata = $user->getUserData($uid);
        if ($getdata) {
          while ($result = $getdata->fetch_assoc()) {
       ?>
        <form  role="form" method="post">
           <h2 style="color: #286090" >Update Your Profile</h2>
                    <?php
                         if(isset($updateUser))
                          echo $updateUser;
                    ?>
           <table>
               <div class="form-group">  
                  <input type="text" name="name" class="form-control" value="<?php echo $result['FullName']; ?>">
               </div>

                <div class="form-group">  
                  <input type="text" name="email" class="form-control" value="<?php echo $result['Email']; ?>">
               </div>

               <div class="form-group"> 
                  <input type="text" name="address" class="form-control" value="<?php echo $result['Address']; ?>">
               </div>

               <div class="form-group">
                  <input name="submit" type="submit" value="Update">
               </div>
           </table>
        </form>
        <?php } } ?>
        </div>
        <div class="col-sm-4">
        </div>

  </div>
<?php include 'inc/footer.php';?>