<?php include 'inc/header.php';?>
<?php 
  include 'classes/vehicle.php';
?>
<?php
  $vehicle = new Vehicle();   
?>   
<div class="container-fluid pagehead pad " data-spy="scroll" data-target="#myScrollspy" data-offset="15">
      <div class="col-sm-2">
         <?php include 'inc/sidebar.php';?>
      </div>
      <div class="col-sm-2">
      </div>
      <?php
          if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))
          {
              $result = $vehicle->addVehicleBooking($_POST);
          }
      ?>
      <div class="col-sm-4">

        <form  role="form" method="post">
           <h2 style="color: #286090" >Booking a Vechile</h2>
                    <?php
                         if(isset($result))
                          echo $result;
                    ?>
           <table>
               <div class="form-group">  
                  <input type="text" name="currentcity" class="form-control" placeholder="Current City">
               </div>

                <div class="form-group">  
                  <input type="text" name="reachedcity" class="form-control" placeholder="Reached City">
               </div>

               <div class="form-group"> 
                  <input type="text" name="vechile" class="form-control" placeholder="Vachile">
               </div>

               <div class="form-group">
                  <input type="date" name="date" class="form-control" >
               </div>

               <div class="form-group">
                  <input name="submit" type="submit" value="Submit">
               </div>
           </table>
        </form>
        </div>
        <div class="col-sm-4">
        </div>

  </div>
<?php include 'inc/footer.php';?>