<?php include 'includes/header.php'; ?>
<?php
 $dc=100;
?>
<form id="form">
    <div class="container" style="width: 40%;">
        <div class="card">
            <div class="card-header">
                <h5>Payment Gateway - <?=$_GET['p'];?></h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="">Account No</label>
                        <input type="text" class="form-control" id="p_account" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" id="p_password" required>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a type="button" class="btn btn-warning" style="float:left;" href="payment.php?soft=<?=$_GET['p'];?>&oid=<?=$_GET['oid'];?>">Previous</a>
                <a type="button" class="btn btn-success" style="float:right;" id="confirm-payment" data-order="<?=$_GET['oid'];?>" data-method="<?=$_GET['p'];?>" data-amount="<?=$_GET['amt'];?>">Pay:- Tk <?=$_GET['amt'].'.00';?></a>
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
