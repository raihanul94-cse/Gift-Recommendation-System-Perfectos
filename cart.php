<?php include 'includes/header.php'; ?>
<div class="alert alert-primary" role="alert">
    <marquee behavior="scroll" direction="left">Winter flash sell...Buy now and get 20% off</marquee>
</div>
<div class="container card-product">
    <div class="card">
        <div class="card-header">
           <h5>Cart Item List</h5>
        </div>
        <div class="card-body">
            <!-- Content here -->
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'backend/cartfetch.php'; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#checkoutModal" data-amount="<?=$amount;?>" data-user="<?=$cust_id;?>">Checkout</div>
            <div class="product-total">
                <p>Net Product Price: ৳ <?php echo $amount.'.00'?></p>
            </div>
        </div>
    </div>
</div>
<?php 
        $fname="";
        $mname="";
        $lname="";
        $contact="";
        $address="";
      IF(ISSET($_SESSION['name'])){
        include "database/db_con.php";
        $name=$_SESSION['name'];
        $cust_id=$_SESSION['cust_id'];
        $getInfo="SELECT * FROM CUSTOMER WHERE cust_id='$cust_id'";
        $cek=mysqli_query($con,$getInfo);
        $count=mysqli_num_rows($cek);
        $data=mysqli_fetch_array($cek);
        if($count == 1){
          $fname=$data['first_name'];
          $mname=$data['middle_name'];
          $lname=$data['last_name'];
          $contact=$data['contact'];
          $address=$data['address'];
        }
      }
      ?>
<!-- Modal Checkout -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">CHECKOUT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Shipping Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $fname.' '.$mname.' '.$lname;?> " required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputContact">Contact Number</label>
                        <input type="text" class="form-control" id="c-contact" name="number" value="<?php echo $contact;?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="c-address" name="address" placeholder="1234 Main St" value="<?php echo $address;?>" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="c-address2" name="address2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputPM">Payment Method</label>
                        <select id="pmethod" class="form-control" name="pmethod">
                            <option selected>Cash On Delivery</option>
                            <option>DBBL Rocket</option>
                            <option>Bkash</option>
                            <option>Nagad</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" id="checkout">CONFIRM ORDER</button>
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
