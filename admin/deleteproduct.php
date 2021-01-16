<?php 
if (isset($_GET['action']) && $_GET['action']=="delete" && isset($_GET['pid'])) {
  	include "db-con.php";
		$productid=$_GET['pid'];
           if(mysqli_query($connect,"DELETE FROM STOCKS WHERE product_id='$productid'")){
            if(mysqli_query($connect,"DELETE FROM PRODUCT_IMAGE WHERE product_id='$productid'")){
            	if(mysqli_query($connect,"DELETE FROM PRODUCTS WHERE product_id='$productid'")){
			       header("location:products.php");
		          }
		     }
		 }
		 mysqli_close($connect);
	}
 ?>