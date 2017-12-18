<?php include 'inc/header.php';?>
<?php 
  include 'classes/vehicle.php';
?>
<?php
  
  if (!isset($_GET['vecid']) || $_GET['vecid'] == NULL ) {
        echo "<script>window.location = 'mybookinglist.php'</script>";
     } else{
        $id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['vecid']);
     }
     
     $vehicle = new Vehicle(); 
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
     $updateVehicle = $vehicle->VecUpdate($_POST,$id);
    }  
?>   
<div class="container-fluid pagehead pad " data-spy="scroll" data-target="#myScrollspy" data-offset="15">
      <div class="col-sm-2">
         <?php include 'inc/sidebar.php';?>
      </div>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4">
         <h2 style="color: #286090" >Update Your Booking List</h2>
             <?php 
                    if (isset($updateVehicle)) {
                       echo $updateVehicle; 
                    }
                ?>
                <?php 
                    $getVec = $vehicle->getVecById($id);
                    if ($getVec) {
                        $i = 0;
                        while ($result = $getVec->fetch_assoc()) {
                            $i++;
                 ?>
        <form  role="form" method="post">    
           <table>
               <div class="form-group">  
                  <input type="text" name="currentcity" class="form-control" value="<?php echo $result['CurrentCity']; ?>">
               </div>

                <div class="form-group">  
                  <input type="text" name="reachedcity" class="form-control" value="<?php echo $result['ReachedCity']; ?>">
               </div>

               <div class="form-group"> 
                  <input type="text" name="vechile" class="form-control" value="<?php echo $result['Vehicle']; ?>">
               </div>

               <div class="form-group">
                  <input type="date" name="date" class="form-control" value="<?php echo $result['Date']; ?>" >
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