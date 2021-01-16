<?php include 'includes/header.php'; ?>
<?php 
IF(ISSET($_SESSION['name'])){
  include "database/db_con.php";
  $name=$_SESSION['name'];
  $cust_id=$_SESSION['cust_id'];
    $fname=" ";
    $mname=" ";
    $lname=" ";
    $contact=" ";
    $address=" ";
    $username=$_SESSION['username'];
  $getInfo="SELECT * FROM CUSTOMER WHERE cust_id='$cust_id'";
  $cek=mysqli_query($con,$getInfo);
  $count=mysqli_num_rows($cek);
  $data=mysqli_fetch_array($cek);
  if($count == 1){
    $cust_id=$data['cust_id'];
    $firstname=$data['first_name'];
    $middlename=$data['middle_name'];
    $lastname=$data['last_name'];
    $contact=$data['contact'];
    $gender=$data['gender'];
    $email=$data['email'];
    $address=$data['address'];
  }

  $countOrder=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `ORDERS` WHERE `cust_id`='$cust_id'"));

  $countPending=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `ORDERS` WHERE `cust_id`='$cust_id' AND `order_status`='Pending'"));

  $lastOrder="NO ORDER";

  //$getDate=mysqli_fetch_array(mysqli_query($con,"SELECT issue_date FROM `ORDERS` WHERE `cust_id`='$cust_id' AND `order_status`='Delivered'  ORDER BY issue_date desc"));

  $getLast=mysqli_fetch_array(mysqli_query($con,"SELECT issue_date FROM `ORDERS` WHERE `cust_id`='$cust_id' ORDER BY issue_date desc"));
  if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM `ORDERS` WHERE `cust_id`='$cust_id'")) > 0){
     $lastOrder=$getLast['issue_date'];
  }

  $totalPaid=0.00;
  $query=mysqli_query($con,"SELECT PAYMENTS.amount FROM `PAYMENTS` INNER JOIN `ORDERS` ON PAYMENTS.order_id=ORDERS.order_id INNER JOIN `CUSTOMER` ON CUSTOMER.cust_id=ORDERS.cust_id WHERE CUSTOMER.cust_id='$cust_id'");
  if(mysqli_num_rows($query) > 0){
    while($paid=mysqli_fetch_array($query)){
        $pay=$paid['amount'];
        $totalPaid=$totalPaid+$pay;
    }
  }
    
 $queryDue=mysqli_query($con,"SELECT DISTINCT ORDERED_ITEM.quantity,ORDERED_ITEM.price,ORDERED_ITEM.product_id, ORDERS.order_id FROM ORDERED_ITEM INNER JOIN ORDERS ON ORDERED_ITEM.order_id=ORDERS.order_id INNER JOIN PAYMENTS WHERE PAYMENTS.order_id!=ORDERS.order_id AND ORDERS.cust_id='{$cust_id}'");
        

    $countDue=mysqli_num_rows($queryDue);
    //echo $countDue;
    $temp;
    $due=0;
    while($row=mysqli_fetch_array($queryDue)){
        $temp = $row['price'] * $row['quantity'];
        $due=$due+$temp;
    }
}
?>
<div id="page">
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <?php 
                             if($_SESSION['gender']=="Male"){
                                ?>
                            <img src="image/avatar-male.jpg" alt=""/>
                                <?php
                             }else if($_SESSION['gender']=="Female"){
                             ?>
                             <img src="image/avatar-female.jpg" alt=""/>
                             <?php
                         }
                         ?>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?=$firstname." ".$middlename." ".$lastname;?>
                                    </h5>
                                    <h6>
                                        Rookie
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>MY ACCOUNT</p>
                            <a href="">Change Password</a><br/>
                            <a href="">My Offers</a><br/>
                            <a href="">My Orders</a><br>
                            <a href="">Coupons</a><br/>
                            <a href="">Order Invoices</a><br/>
                            <a href="">Wishlist</a><br/>
                            <a href="">Back Orders</a><br/>
                            <a href="">Cancelled Orders</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$cust_id;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$username;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$firstname." ".$middlename." ".$lastname;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$email;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$contact;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$address;?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Order Pending</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$countPending?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Payment Due</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$due;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Order</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$countOrder?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Paid</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>৳ <?=$totalPaid?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Last Order</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$lastOrder?></p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Order Information</label><br/>
                                        <a type="button" id="ord-det" style="font-weight: 600;color: #0062cc;">Your previous order description</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
    </div>
<?php include 'includes/footer.php'; ?>