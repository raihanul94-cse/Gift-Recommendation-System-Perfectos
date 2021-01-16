<?php
include "database/db_con.php";
  $userid=$_GET['uid'];
  $time=$_GET['t'];
  $product_query = "SELECT DISTINCT PRODUCTS.product_id, PRODUCTS.product_name, PRODUCTS.product_details, PRODUCTS.sell_price,PRODUCT_IMAGE.image, STOCKS.in_stock FROM PRODUCTS INNER JOIN PRODUCT_IMAGE ON PRODUCTS.product_id = PRODUCT_IMAGE.product_id INNER JOIN STOCKS ON STOCKS.product_id=PRODUCTS.product_id INNER JOIN `RECOM_PRODUCTS` ON RECOM_PRODUCTS.product_id=PRODUCTS.product_id INNER JOIN `RECOMMENDATION` ON RECOMMENDATION.gift=RECOM_PRODUCTS.id INNER JOIN `SCORE` ON SCORE.scoreid=RECOMMENDATION.scoreid WHERE PRODUCTS.sub_category=RECOM_PRODUCTS.sub_category AND SCORE.userid='$userid' AND SCORE.time='$time' ORDER BY SCORE.score asc LIMIT 5";
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
        
		$output.="<div class='col-6 col-sm-4'>
			<div class='card'>
			 	<img src='data:image/jpeg;base64,".base64_encode($image)."' height='300' width='200' class='card-img-top'/>
				<div class='card-body card-item'>
					<h5 class='card-title'>".$product_name."</h5>
					<p>In-Stock: ".$instock."</p>
					<p class='card-text' >৳ ".$product_price." x  Qty. <input class='input-quantity' value='1'/> </p>
					<a type='button' class='btn btn-danger' id='addToCart' data-id='".$product_id."' data-price='".$product_price."'>AddToCart</a>
				</div>
			</div>
		</div>";
  }
}else{
      $output='
        <div class="jumbotron">
            <h1 class="display-4">NO PRODUCT FOUND!</h1>
              <p class="lead">The category you have search is currently empty.</p>
              <hr class="my-4">
              <p>You can see our other products. </p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Continue Shopping</a>
        </div>
      ';
  }
echo $output;
?>