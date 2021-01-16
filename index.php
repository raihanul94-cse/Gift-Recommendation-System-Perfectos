<?php include 'includes/header.php'; ?>
<?php include 'includes/carousel.php'; ?>
<div class="alert alert-primary" role="alert">
    <marquee behavior="scroll" direction="left">Winter flash sell...Buy now and get 20% off</marquee>
</div>
<div class="container">
    <div class="d-flex p-2 bd-highlight">
        <div class="card-deck">
            <div class="row" id="item">
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