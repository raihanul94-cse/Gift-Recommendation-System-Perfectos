<?php 
if (isset($_POST['upload'])) {
  include "db-con.php";
   $productname=$_POST['productname'];
   $productidget=$_POST['productid'];
   $productdetails=$_POST['productdetails'];
   $category=$_POST['category'];
   $subcategory=$_POST['sub-category'];
   $sellprice=$_POST['sellprice'];
   $buyprice=$_POST['buyprice'];
   $quantity=$_POST['p_quantity'];
   $image_name=$category.$productidget;
        

    $productLoad="INSERT INTO `products`(`product_id`, `product_name`, `product_category`,`sub_category` , `product_details`, `sell_price`, `buy_price`) VALUES ('$productidget','$productname','$category', '$subcategory','$productdetails','$sellprice','$buyprice')";

    $exeProductLoad=mysqli_query($connect,$productLoad);

    if($exeProductLoad){

       $stockLoad="INSERT INTO `stocks`(`product_id`, `in_stock`) VALUES ('$productidget','$quantity')";

       $exeStockLoad=mysqli_query($connect,$stockLoad);
       if($exeStockLoad){
          $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));  
          $query = "INSERT INTO PRODUCT_IMAGE(product_id, image_name, image) VALUES ('$productidget','$image_name','$file')";  
          if(mysqli_query($connect, $query)){  
            if(mysqli_query($connect2,"INSERT INTO `PRODUCTS`(`product_id`, `sub_category`) VALUES ('$productidget','$subcategory')")){
              header("location:products.php");
            }
           }else {
              echo "Error: <br>" . mysqli_error($connect);
           }
            mysqli_close($connect);
       }
    }else{
      echo "Error: <br>" . mysqli_error($connect);
      echo "Error: <br>" . mysqli_error($connect2);
      //header("location:products.php");
    }
   }

 ?>