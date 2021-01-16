<?php 
include "db-con.php";
session_start();
if(isset($_SESSION['username'])){

$ord_status='Default';
if(isset($_POST['edit'])){
$ord_status=$_POST['ord-status'];
$ord_id=$_GET['OID'];
 if(mysqli_query($connect,"UPDATE `ORDERS` SET `order_status`='$ord_status' WHERE order_id='$ord_id'")){
  header("location:orderdetails.php?OID=".$ord_id);
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Panel</title>
  <!-- Fontawesome icon offline -->
   <link href="fontawesome/css/all.css" rel="stylesheet">
  <!-- Fontawsome icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>
    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
}
.grid-item {
  padding: 20px;
  text-align: center;
}
.dot {
  color: white;
  height: 25px;
  width: 25px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
.dot-text{
  color:green;
}
.dot-text-var{
  color:black;
  font-size: 20px;
}
.cust-details{
	padding-top: 20px;
	padding-left: 20px;
	padding-right: 20px;
}
.ord-details{
	padding-left: 20px;
	padding-right: 20px;
	padding-bottom: 20px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
  </style>
</head>

<body class="grey lighten-3">
  <!--Main Navigation-->
  <header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="" target="_blank">
          <strong class="blue-text">PERFECTOS</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <img src="img/logo1.png" class="img-fluid" style="width: 400px;" alt="">
      </a>

      <div class="list-group list-group-flush">
         <a href="index.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
          </a>
          <a href="user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-user mr-3"></i>User Control</a>
          <a href="stocks.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-table mr-3"></i>Stocks</a>
          <a href="products.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fab fa-product-hunt mr-3"></i>Products</a>
          <a href="category.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-tags mr-3"></i>Categories</a>
          <a href="customer.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-user-friends mr-3"></i>Customers</a>
          <a href="order.php" class="list-group-item list-group-item-action waves-effect">
          <i class="far fa-arrow-alt-circle-up mr-3"></i>Orders</a>
          <a href="logout.php?logout" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-sign-out-alt mr-3"></i>Logout</a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->
<?php
$ord_id=$_GET['OID'];
$getOrderInfo="SELECT CUSTOMER.first_name, CUSTOMER.middle_name, CUSTOMER.last_name, CUSTOMER.email, CUSTOMER.contact, CUSTOMER.address, ORDERS.order_id, ORDERS.order_status, ORDERS.issue_date, ORDERED_ITEM.quantity, ORDERED_ITEM.price, PAYMENTS.payment_id, PAYMENTS.payment_type, PRODUCTS.product_name FROM CUSTOMER INNER JOIN ORDERS ON CUSTOMER.cust_id=ORDERS.cust_id INNER JOIN PAYMENTS ON PAYMENTS.order_id=ORDERS.order_id INNER JOIN ORDERED_ITEM ON ORDERED_ITEM.order_id=ORDERS.order_id INNER JOIN PRODUCTS ON PRODUCTS.product_id=ORDERED_ITEM.product_id WHERE ORDERED_ITEM.order_id='$ord_id'";

  $exe_getOrderInfo=mysqli_query($connect,$getOrderInfo);

  $data = mysqli_fetch_array($exe_getOrderInfo);
  $cust_name=$data['first_name']." ".$data['middle_name']." ".$data['last_name'];
  $cust_email=$data['email'];
  $cust_contact=$data['contact'];
  $cust_address=$data['address'];
  $order_id=$data['order_id'];
  $payment_method=$data['payment_type'];
  $payment_id=$data['payment_id'];
  $order_status=$data['order_status'];
  $order_date=$data['issue_date'];
 
 ?>
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="">Order Details</a>
            <span>/</span>
            <span>OrderID: <?php echo $_GET['OID']; ?></span>
          </h4>
          <form class="d-flex justify-content-center" method="POST" action="">
            <!-- Default input -->
            <select id="orderStatus" class="form-control" name="ord-status">
              <option selected>Order Status</option>
              <option>Pending</option>
              <option>Confirmed</option>
              <option>Shipped</option>
              <option>Delivered</option>
              <option>Canceled</option>
            </select>
            <button class="btn btn-success btn-sm my-0 p" name="edit">
              <i class="fas fa-edit"></i>
            </button>
          </form>
        </div>
      </div>
      <!-- Heading -->
 </div>
 <div class="container-fluid mt-5">
      <div class="card mb-4">
      	<div class="cust-details">
    		Customer's Name: <?php echo $cust_name; ?>
    		<br>
    		Email: <?php echo $cust_email; ?>
    		<br>
    		Mobile: <?php echo $cust_contact; ?>
    		<br>
    		Address: <?php echo $cust_address; ?>
    		<br>
    		Order Status: <?php echo $order_status; ?>
    		<div style="float: right;">
    		<a href="invoice.php?v=<?php echo $_GET['OID'];?>">Generate Invoice</a>
    	    </div>
    		<hr>
    		OrderID: <?php echo $_GET['OID'];?>
    		<br>
    		Payment Method: <?php echo $payment_method; ?>
    		<br>
    		TxnID: <?php echo $payment_id; ?>
    		<br>
    		PlaceOnDate: <?php echo $order_date ?>
    		<hr>
    	</div>
    	
        <div class="card-body">
        <div style="font-weight: bold;font-size: 20px;">Ordered Products</div>
         <table>
         	<thead>
         		<tr>
         			<th>Product</th>
         			<th>UnitPrice</th>
         			<th>Quantity</th>
         			<th>TotalPrice</th>
         		</tr>
         	</thead>
         	<tbody>
            <?php 
            $getOrderInfo="SELECT quantity, price, product_name FROM ORDERED_ITEM WHERE order_id='$ord_id'";
            $netAmount=0;

            $exe_getOrderInfo=mysqli_query($connect,$getOrderInfo);
             while( $data2 = mysqli_fetch_array($exe_getOrderInfo)){
              $totalPrice=$data2['price']*$data2['quantity'];
              $netAmount=$netAmount+$totalPrice;
            ?>
            <tr>
              <td><?php echo $data2['product_name']; ?></td>
              <td><?php echo $data2['price'] ;?></td>
              <td><?php echo $data2['quantity']; ?></td>
              <td><?php echo $totalPrice.".000"; ?></td>
            </tr>
            <?php
             }
             $delvCharge=50;
             $vatCharget=$netAmount*.15;
             ?>
         	</tbody>
         </table>
         <hr>
        </div>
        <div class="ord-details">
        	Net Amount: <?php echo $netAmount.".000"; ?>
        	<br>
        	Delivery Charge: <?php echo $delvCharge.".000"; ?>
        	<br>
        	Vat Amount: <?php echo $vatCharget." (15%)"; ?>
        	<br>
        	Discount Amount: 0.000
        	<hr>
        	Total Amount: <?php echo $netAmount+$delvCharge+$vatCharget; ?>
        </div>
        
      </div>
 </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
    <hr class="my-4">
    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2020 Copyright:
      <a href="" target="_blank"> perfectos.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>
</html>
<?php 
}else{
  echo "<script language=\"javascript\">document.location.href='login.php';</script>";
}
 ?>
