<?php
  include 'inc/header.php';
  include 'classes/vehicle.php';
?>
<?php
  $vehicle = new Vehicle();   
  $id = Session::get("id");

  if (isset($_GET['delvec'])) {
    $id     = $_GET['delvec'];
    $delVac = $vehicle->delVacById($id);
   }

?>
   
<div class="container-fluid pagehead pad " data-spy="scroll" data-target="#myScrollspy" data-offset="15">
      <div class="col-sm-2">
          <?php include 'inc/sidebar.php';?>
      </div>
      <div class="col-sm-2">
      </div>
        <div class="col-sm-5">
          <legend style="color: #286090;padding-left: 200px;padding-top: 30px">My Booking List</legend>
           <table class="table table-bordered">
              <tr class="success">
                  <td>#</td>
                  <td>Current City</td>
                  <td>Target City</td>
                  <td>Vehicle</td>
                  <td>Date</td>
                  <td>Edit</td>
                  <td>Delete</td>
              </tr>
              <?php 
              $getBookingList = $vehicle->getAllBooking($id);
              if ($getBookingList) {
                $i = 0;
                while ($result = $getBookingList->fetch_assoc()) {
                  $i++;
                ?>
              <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $result['CurrentCity']; ?></td>
                  <td><?php echo $result['ReachedCity']; ?></td>
                  <td><?php echo $result['Vehicle']; ?></td>
                  <td><?php echo $result['Date']; ?></td>
                  <td><a href="editbooking.php?vecid=<?php echo $result['ID']; ?>">Edit</a></td>
                  <td><a onclick="return confirm('Are you sure to delete!')" href="?delvec=<?php echo $result['ID']; ?>">Delete</a></td>
              </tr>
              <?php } } ?>
           </table>
        </div>
        <div class="col-sm-3">
        </div>

  </div>
<?php include 'inc/footer.php';?>
