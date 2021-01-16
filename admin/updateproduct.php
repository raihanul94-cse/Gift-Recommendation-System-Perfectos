<?php 
if(isset($_GET['upload'])){
	include 'db-con.php';
   $productname=$_GET['productname'];
   $productidget=$_GET['productid'];
   $productdetails=$_GET['productdetails'];
   $category=$_GET['category'];
   $sub_category=$_GET['sub-category'];
   $sellprice=$_GET['sellprice'];
   $buyprice=$_GET['buyprice'];
   $quantity=$_GET['p_quantity'];
   
   $updateProductQuery=mysqli_query($connect,"UPDATE `PRODUCTS` SET `product_name`='$productname',`product_category`='$category',`sub_category`='$sub_category',`product_details`='$productdetails',`sell_price`='$sellprice',`buy_price`='$buyprice' WHERE `product_id`='$productidget'");
   $updateStockQuery=mysqli_query($connect,"UPDATE `STOCKS` SET `in_stock`='$quantity' WHERE `product_id`='$productidget'");
  // mysqli_query($connect2,"INSERT INTO `PRODUCTS`(`product_id`, `sub_category`) VALUES ('$productidget','$subcategory')");
   if($updateProductQuery && $updateStockQuery){
    if(mysqli_query($connect2,"UPDATE `PRODUCTS` SET `sub_category`='$sub_category' WHERE `product_id`='$productidget'")){
      header("location:modifyproduct.php?pid=".$productidget."&status=200");
    }
   }else{
    echo "error update";
   }
}else{
  echo "error button";
}

 ?>