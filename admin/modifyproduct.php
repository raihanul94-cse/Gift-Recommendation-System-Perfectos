<?php 
session_start();
if(isset($_SESSION['username'])){
  $status="";
  include 'db-con.php';
  $pid=$_GET['pid'];
 if (isset($_GET['pid'])) {
  $sql="SELECT * FROM `products` INNER JOIN `stocks` ON PRODUCTS.product_id=STOCKS.product_id INNER JOIN PRODUCT_IMAGE ON PRODUCTS.product_id = PRODUCT_IMAGE.product_id WHERE PRODUCTS.product_id='$pid'";
  $query=mysqli_query($connect,$sql);
  $data=mysqli_fetch_array($query);
  $cek=mysqli_num_rows($query);
  if($cek>0){
  $productname= $data['product_name'];
  $productdetails= $data['product_details'];
  $productCategory= $data['product_category'];
  $productSubCategory= $data['sub_category'];
  $sellprice= $data['sell_price'];
  $buyprice= $data['buy_price'];
  $quantity= $data['in_stock'];
  $image = $data['image'];
 }
}else{
  $productname= "";
  $productdetails= "";
  $productCategory= "";
  $productSubCategoryr= "";
  $sellprice= "";
  $buyprice= "";
  $quantity= "";
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
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
  .table-head{
    font-size:20px;
    text-align: center;
    color: white;
  }
  .card-head{
    padding-top: 20px;
    padding-left: 20px;
    font-size: 20px;
  }
  .img {
  padding: 5px;
  width: 300px;
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

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="" target="_blank">Products</a>
            <span>/</span>
            <span>Modify Product</span>
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
          <!--Card-->
          <div class="card">
            <!--Card content-->
            <div class="card-body">
          <form action="updateproduct.php" enctype="multipart/form-data" method="GET">
            <div id="id-data" hidden>
              <input type="text" name="productid" value="<?php echo $pid; ?>">
            </div>
          <div class="form-group>
            <label for="inputEmail4">Product Name:</label>
            <input type="text" class="form-control" id="" name="productname" value="<?php echo $productname; ?>">
          </div>
          <div class="form-group">
            <label for="inputPassword4">Description:</label>
            <textarea rows="4" cols="50" class="form-control" id="" name="productdetails"><?php echo $productdetails; ?></textarea>
          </div>
          <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputAddress">Sell Price:</label>
          <input type="text" class="form-control" id="" name="sellprice" value="<?php echo $sellprice; ?>">
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress2">Buy Price:</label>
          <input type="text" class="form-control" id="" name="buyprice" value="<?php echo $buyprice; ?>">
        </div>
      </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Category:</label>
            <select id="inputState" class="form-control" name="category" onchange="showProductCode(this.value)">
              <option selected><?php echo $productCategory; ?></option>
              <?php 
                 $getCat="SELECT * FROM category WHERE `category_name` != '$productCategory'";
                 $getCatQuery=mysqli_query($connect,$getCat);
                 while($get=mysqli_fetch_array($getCatQuery)){
                      echo '<option>'.$get["category_name"].'</option>';
                 }
               ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Sub-category:</label>
            <select id="sub-category" class="form-control" name="sub-category">
              <option selected><?=$productSubCategory;?></option>
              <option>Accessories</option>
              <option>Ornaments</option>
              <option>Paintings</option>
              <option>Craftings</option>
              <option>Sport Clothings</option>
              <option>Makeups</option>
              <option>Writings</option>
              <option>Readings</option>
              <option>Clothings</option>
              <option>Gadgets</option>
            </select>
          </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
             <div class="custom-file">
             <input type="file" class="custom-file-input" name="image" id="image">
             <label class="custom-file-label" for="customFile">Choose photo</label>
            </div>
           </div>
           <div class="form-group col-md-6">
          <input type="text" class="form-control" id="inputAddress" name="p_quantity" placeholder="Product Quantity" value="<?php echo $quantity; ?>">
        </div>
          </div>
        <button class="btn btn-primary" name="upload">Upload</button>
      </form>  
      </div>
    </div>
    <br>
    <!--Card-->
  <div class="card">

    <!--Card content-->
    <div class="card-body">
      <h4>ProductID: <b><?php echo $pid; ?></b></h4>
      <div class="row">
      <div class="img col-md-4">
         <img src='data:image/jpeg;base64,<?php echo base64_encode($image); ?>' class='card-img-top'/>
      </div>
      <div class="col-md-8">
         <ul style="list-style-type:square;">
           <li><b>Product Name:</b> <?php echo $productname; ?></li>
           <li><b>Product Details:</b> <?php echo $productdetails; ?></li>
           <li><b>Sell Price:</b> <?php echo $sellprice; ?></li>
           <li><b>Buy Price:</b> <?php echo $buyprice; ?></li>
           <li><b>Category:</b> <?php echo $productCategory; ?></li>
           <li><b>Sub-Category:</b> <?php echo $productSubCategory; ?></li>
           <li><b>In Stock:</b> <?php echo $quantity; ?></li>
         </ul>
      </div>
      </div>
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

</body>
</html>

<?php 
}else{
  echo "<script language=\"javascript\">document.location.href='login.php';</script>";
}
 ?>
