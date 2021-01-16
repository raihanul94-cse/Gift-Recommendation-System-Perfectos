<?php include 'includes/header.php'; ?>
<?php
 $dc=100;
?>
<form id="form">
    <div class="container" style="width: 40%;">
        <div class="card">
            <div class="card-header">
                <h5>Payment Information</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                   <div class="form-row">
                        <p><strong>Payment Merchant: </strong><?=$_GET['soft'];?></p>
                    </div>
                    <div class="form-row">
                        <p><strong>Net Due Amount: </strong><?=$_GET['i'];?></p>
                    </div>
                    <div class="form-row">
                        <p><strong>Aditional Amount: </strong><?=$_GET['i']*0.02;?></p>
                    </div>
                    <div class="form-row">
                        <p><strong>Delivery Charge: </strong><?=$dc?></p>
                    </div>
                    <div class="form-row">
                        <p><strong>Total Payable Amount: </strong><?=($_GET['i']*0.02)+$_GET['i']+$dc;?></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a type="button" class="btn btn-warning" style="float:left;" href="index.php">Close</a>
                <a type="button" class="btn btn-success" style="float:right;" id="pay-proceed" data-amount="<?=($_GET['i']*0.02)+$_GET['i']+$dc;?>" data-order="<?=$_GET['oid'];?>" data-method="<?=$_GET['soft'];?>">Next</a>
            </div>
        </div>
    </div>
</form>
<?php include 'includes/footer.php'; ?>
<?php 
  $cust_id=session_id();
  $time=time();
  $time_check=$time-1220; // set for 10 minutes
  $delete = "DELETE FROM GUEST_CART WHERE temp_id='$cust_id' AND time_get<$time_check";
  mysqli_query($con,$delete);
 ?>
