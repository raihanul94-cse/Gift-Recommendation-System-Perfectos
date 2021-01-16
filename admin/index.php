<?php 
session_start();
include "db-con.php";
if(isset($_SESSION['username'])){
   $pending=0;
   $confirmed=0;
   $shipped=0;
   $delivered=0;
   $todayOrder=0;
   $totalOrder=0;
   $todayDate=date('Y-m-d');

   $pending=mysqli_num_rows(mysqli_query($connect,"SELECT CUSTOMER.first_name, CUSTOMER.middle_name, CUSTOMER.cust_id, ORDERS.cust_id, ORDERS.order_id, ORDERS.order_status, ORDERS.issue_date, PAYMENTS.order_id, PAYMENTS.payment_type FROM CUSTOMER INNER JOIN ORDERS ON CUSTOMER.cust_id=ORDERS.cust_id INNER JOIN PAYMENTS ON PAYMENTS.order_id=ORDERS.order_id WHERE `order_status`='Pending'"));

   $confirmed=mysqli_num_rows(mysqli_query($connect,"SELECT CUSTOMER.first_name, CUSTOMER.middle_name, CUSTOMER.cust_id, ORDERS.cust_id, ORDERS.order_id, ORDERS.order_status, ORDERS.issue_date, PAYMENTS.order_id, PAYMENTS.payment_type FROM CUSTOMER INNER JOIN ORDERS ON CUSTOMER.cust_id=ORDERS.cust_id INNER JOIN PAYMENTS ON PAYMENTS.order_id=ORDERS.order_id WHERE `order_status`='Confirmed'"));
   $delivered=mysqli_num_rows(mysqli_query($connect,"SELECT CUSTOMER.first_name, CUSTOMER.middle_name, CUSTOMER.cust_id, ORDERS.cust_id, ORDERS.order_id, ORDERS.order_status, ORDERS.issue_date, PAYMENTS.order_id, PAYMENTS.payment_type FROM CUSTOMER INNER JOIN ORDERS ON CUSTOMER.cust_id=ORDERS.cust_id INNER JOIN PAYMENTS ON PAYMENTS.order_id=ORDERS.order_id WHERE `order_status`='Delivered'"));
   $totalOrder=mysqli_num_rows(mysqli_query($connect,"SELECT CUSTOMER.first_name, CUSTOMER.middle_name, CUSTOMER.cust_id, ORDERS.cust_id, ORDERS.order_id, ORDERS.order_status, ORDERS.issue_date, PAYMENTS.order_id, PAYMENTS.payment_type FROM CUSTOMER INNER JOIN ORDERS ON CUSTOMER.cust_id=ORDERS.cust_id INNER JOIN PAYMENTS ON PAYMENTS.order_id=ORDERS.order_id"));
   $todayOrder=mysqli_num_rows(mysqli_query($connect,"SELECT CUSTOMER.first_name, CUSTOMER.middle_name, CUSTOMER.cust_id, ORDERS.cust_id, ORDERS.order_id, ORDERS.order_status, ORDERS.issue_date, PAYMENTS.order_id, PAYMENTS.payment_type FROM CUSTOMER INNER JOIN ORDERS ON CUSTOMER.cust_id=ORDERS.cust_id INNER JOIN PAYMENTS ON PAYMENTS.order_id=ORDERS.order_id WHERE `issue_date`='$todayDate'"));
   $shipped=mysqli_num_rows(mysqli_query($connect,"SELECT CUSTOMER.first_name, CUSTOMER.middle_name, CUSTOMER.cust_id, ORDERS.cust_id, ORDERS.order_id, ORDERS.order_status, ORDERS.issue_date, PAYMENTS.order_id, PAYMENTS.payment_type FROM CUSTOMER INNER JOIN ORDERS ON CUSTOMER.cust_id=ORDERS.cust_id INNER JOIN PAYMENTS ON PAYMENTS.order_id=ORDERS.order_id WHERE `order_status`='Shipped'"));
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
  <!-- Sweet Alert -->
  <script src="sweetalert/sweetalert.js"></script>
  <link rel="stylesheet" href="sweetalert/sweetalert.css">
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
tr:hover {background-color:#f5f5f5;}
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
        <a class="navbar-brand waves-effect" href="">
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
       <div class="mr-3">
         Logged in as: Admin
       </div>
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

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="" target="_blank">Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>

          <form class="d-flex justify-content-center">
            <!-- Default input -->
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>

          </form>

        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-7 mb-6">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">
              <div class="row">
                <div class="grid-container">

                  <div class="grid-item">
                    <span class="dot badge-success">
                     <i class="far fa-pause-circle"></i>
                    </span>
                    <span class="dot-text danger">
                      Pending Orders <div class="dot-text-var"><?=$pending;?></div>
                    </span>
                  </div>
                  <div class="grid-item">
                    <span class="dot badge-success">
                     <i class="far fa-check-circle"></i>
                    </span>
                    <span class="dot-text success">
                      Confirmed<div class="dot-text-var"><?=$confirmed;?></div>
                    </span>
                  </div>
                  <div class="grid-item">
                    <span class="dot badge-success">
                     <i class="fas fa-shipping-fast"></i>
                    </span>
                    <span class="dot-text">
                      Shipped Orders<div class="dot-text-var"><?=$shipped;?></div>
                    </span>
                  </div>
                  <div class="grid-item">
                    <span class="dot badge-success">
                     <i class="fas fa-truck-loading"></i>
                    </span>
                    <span class="dot-text">
                      Delivered Orders<div class="dot-text-var"><?=$delivered;?></div>
                    </span>
                  </div>
                  <div class="grid-item">
                    <span class="dot badge-success">
                     <i class="fas fa-calendar-day"></i>
                    </span>
                    <span class="dot-text">
                      Today Orders<div class="dot-text-var"><?=$todayOrder?></div>
                    </span>
                  </div>
                  <div class="grid-item">
                    <span class="dot badge-success">
                     <i class="fas fa-equals"></i>
                    </span>
                    <span class="dot-text">
                      Total Orders <div class="dot-text-var"><?=$totalOrder;?></div>
                    </span>
                  </div>

                </div> 
              </div>
            </div>
          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">
          <!--Card-->
          
          <!--/.Card-->

          <!--Card-->
          <div class="card mb-4">

            <!--Card content-->
            <div class="card-body">

              <!-- List group links -->
              <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action waves-effect">Sales
                  <span class="badge badge-success badge-pill pull-right">22%
                    <i class="fas fa-arrow-up ml-1"></i>
                  </span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Traffic
                  <span class="badge badge-danger badge-pill pull-right">5%
                    <i class="fas fa-arrow-down ml-1"></i>
                  </span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Issues
                  <span class="badge badge-primary badge-pill pull-right">123</span>
                </a>
                <a class="list-group-item list-group-item-action waves-effect">Messages
                  <span class="badge badge-primary badge-pill pull-right">8</span>
                </a>
              </div>
              <!-- List group links -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
<div class="container" style="font-size: 25px;font-weight: bold;">Recent Orders</div>
<div class="container">
 <table>
  <tr>
    <th>OrderID</th>
    <th>CustomerName</th>
    <th>PaymentMethod</th>
    <th>OrderStatus</th>
    <th>OrderDate</th>
  </tr>
<?php
include "db-con.php";
$getRecentOrder="SELECT CUSTOMER.first_name, CUSTOMER.middle_name, CUSTOMER.cust_id, ORDERS.cust_id, ORDERS.order_id, ORDERS.order_status, ORDERS.issue_date, PAYMENTS.order_id, PAYMENTS.payment_type FROM CUSTOMER INNER JOIN ORDERS ON CUSTOMER.cust_id=ORDERS.cust_id INNER JOIN PAYMENTS ON PAYMENTS.order_id=ORDERS.order_id ORDER BY ORDERS.issue_date desc";

$exe_getRecentOrder=mysqli_query($connect,$getRecentOrder);

while($data = mysqli_fetch_array($exe_getRecentOrder)){
  $cust_name=$data['first_name']." ".$data['middle_name'];
  $order_id=$data['order_id'];
  $payment_method=$data['payment_type'];
  $order_status=$data['order_status'];
  $order_date=$data['issue_date'];
  ?>
   <tr onclick="window.location='orderdetails.php?OID=<?php echo $order_id; ?>';">
      <td><?php echo $order_id ;?></td>
      <td><?php echo $cust_name ;?></td>
      <td><?php echo $payment_method ;?></td>
      <td><?php echo $order_status ;?></td>
      <td><?php echo $order_date ;?></td>
    </tr>
<?php
}
 ?>
</table>
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
