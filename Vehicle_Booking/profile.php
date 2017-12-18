<?php include 'inc/header.php';?>
<?php 
  include 'classes/user.php';
?>
<?php
  $user = new User();  
?>   
<div class="container-fluid pagehead pad " data-spy="scroll" data-target="#myScrollspy" data-offset="15">
      <div class="col-sm-2">
         <?php include 'inc/sidebar.php';?>
      </div>
      <div class="col-sm-2">
      </div>

      <div class="col-sm-4">

       
           <h2 style="color: #286090" >Your Profile Details</h2>
         <?php  
        $uid     = Session::get("id");
        $getdata = $user->getUserData($uid);
        if ($getdata) {
          while ($result = $getdata->fetch_assoc()) {
       ?>
           <table>
               <div class="form-group"> 
                    <label style="color: #286090">Full Name :</label> 
                    <div class="form-control"><?php echo $result['FullName']; ?></div> 
               </div>

                <div class="form-group">
                    <label style="color: #286090">Email :</label> 
                    <div class="form-control"><?php echo $result['Email']; ?></div>  
               </div>

               <div class="form-group">
                    <label style="color: #286090">Address :</label> 
                    <div class="form-control"><?php echo $result['Address']; ?></div>  
               </div>

               <div class="form-group">
                  <td><a href="editUserProfile.php">Update profile</a></td>
               </div>
           </table>
       <?php } } ?>
        </div>
        <div class="col-sm-4">
        </div>

  </div>
<?php include 'inc/footer.php';?>