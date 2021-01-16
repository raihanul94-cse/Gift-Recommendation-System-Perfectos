<?php include 'includes/header.php'; ?>
<div class="alert alert-success" role="alert">
  <h5>Showing <strong><?=$_GET['cat'];?></strong> Category</h5>
</div>
<div class="container">
  <div class="d-flex p-2 bd-highlight">
  <div class="card-deck">
    <div class="row">
      <?php include 'backend/getcategoryitem.php';?>
  </div>   
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
<?php 
  $cust_id=session_id();
  $time=time();
  $time_check=$time-1220; // set for 10 minutes
  $delete = "DELETE FROM GUEST_CART WHERE temp_id='$cust_id' AND time_get<$time_check";
  mysqli_query($con,$delete);
 ?>