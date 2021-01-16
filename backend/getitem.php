<?php
session_start();
include "../database/db_con.php";
  $product_query = "SELECT PRODUCTS.product_id, PRODUCTS.product_name, PRODUCTS.product_details, PRODUCTS.sell_price,PRODUCT_IMAGE.image, STOCKS.in_stock FROM PRODUCTS INNER JOIN PRODUCT_IMAGE ON PRODUCTS.product_id = PRODUCT_IMAGE.product_id INNER JOIN STOCKS ON STOCKS.product_id=PRODUCTS.product_id";
$output="";
  $run_query = mysqli_query($con,$product_query);
  if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
      $product_id    = $row["product_id"];
      $product_name   = $row["product_name"];
      $product_details = $row['product_details'];
      $product_price = $row['sell_price'];
      $image = $row['image'];
      $instock = $row['in_stock'];
        if(isset($_SESSION['username'])){
            $output.="<div class='col-6 col-sm-4'>
                <div class='card'>
                    <img src='data:image/jpeg;base64,".base64_encode($image)."' height='300' width='200' class='card-img-top'/>
                    <div class='card-body card-item'>
                        <h5 class='card-title'>".$product_name."</h5>
                        <p>In-Stock: ".$instock."</p>
                        <p class='card-text' >৳ ".$product_price." x  Qty. <input class='input-quantity' value='1'/> </p>
                        <button type='button' class='btn btn-danger' id='addToCart' data-id='".$product_id."' data-price='".$product_price."'><i class='fa fa-plus'></i> Cart</button>
                        <button type='button' class='btn btn-secondary' id='addToWishlist' data-id='".$product_id."'><i class='fa fa-plus'></i> Wishlist</button>
                    </div>
                </div>
            </div>";
        }else{
            $output.="<div class='col-6 col-sm-4'>
                <div class='card'>
                    <img src='data:image/jpeg;base64,".base64_encode($image)."' height='300' width='200' class='card-img-top'/>
                    <div class='card-body card-item'>
                        <h5 class='card-title'>".$product_name."</h5>
                        <p>In-Stock: ".$instock."</p>
                        <p class='card-text' >৳ ".$product_price."</p>
                        <button type='button' class='btn btn-secondary' id='addToWishlist' data-id='".$product_id."'><i class='fa fa-plus'></i> Wishlist</button>
                    </div>
                </div>
            </div>";
        }
  }
}
echo $output;
?>