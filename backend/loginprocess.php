<?php
if(isset($_POST['login'])){
include "../database/db_con.php";
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    
    
    $cek = mysqli_num_rows(mysqli_query($con,"SELECT CUSTOMER.first_name, CUSTOMER.cust_id, LOGIN.cust_id, LOGIN.username, LOGIN.password, CUSTOMER.email, CUSTOMER.gender FROM LOGIN INNER JOIN CUSTOMER ON CUSTOMER.cust_id=LOGIN.cust_id AND (CUSTOMER.email='$username' AND LOGIN.password='$password') OR (LOGIN.username='$username' AND LOGIN.password='$password')"));

    $data = mysqli_fetch_array(mysqli_query($con,"SELECT CUSTOMER.first_name, CUSTOMER.cust_id, LOGIN.cust_id, LOGIN.username, LOGIN.password, CUSTOMER.email, CUSTOMER.gender FROM LOGIN INNER JOIN CUSTOMER ON CUSTOMER.cust_id=LOGIN.cust_id AND (CUSTOMER.email='$username' AND LOGIN.password='$password') OR (LOGIN.username='$username' AND LOGIN.password='$password')"));

    IF($cek > 0){
        session_start();
        $_SESSION['username'] = $data['username'];
        $_SESSION['cust_id']= $data['cust_id'];
        $_SESSION['name'] = $data['first_name'];
        $_SESSION['gender']=$data['gender'];

        echo json_encode(array("statusCode"=>200));
      //   $temp_id=session_id();

      //   $checkGuestCart="SELECT * FROM GUEST_CART WHERE temp_id='$temp_id'";
      //   $chk=mysqli_num_rows(mysqli_query($con,$checkGuestCart));
      //   $get=mysqli_fetch_array(mysqli_query($con,$checkGuestCart));

      //   $getDataGuestCart=mysqli_query($con,$checkGuestCart);



      //   if($chk>0){
      //       $id=$get['product_id'];
      //       $cust_id=$_SESSION['username'];
            
      //       $checkCart=mysqli_query($con,"SELECT * FROM CART WHERE product_id='$id' AND cust_id='$cust_id'");
      //       $cntCart=mysqli_num_rows($checkCart);
      //       $getOldCart=mysqli_fetch_array($checkCart);
      //       $newQty=0;
      //   if($cntCart > 0){
      //     while($rowUp=mysqli_fetch_array($getDataGuestCart)){
      //       $newQty=$getOldCart['quantity']+$rowUp['quantity'];
      //       $pid=$rowUp['product_id'];
      //       $update_query="UPDATE CART SET quantity='$newQty' WHERE product_id='$pid' AND cust_id='$cust_id'";

      //       if (mysqli_query($con,$update_query)) {
      //           // $delete = "DELETE FROM GUEST_CART WHERE temp_id='$temp_id' AND product_id='$pid'";
      //           // mysqli_query($con,$delete);    
      //        }

      //      }

      //     }else{
      //      while($rowUp1=mysqli_fetch_array($getDataGuestCart)){
      //       $qty=$rowUp1['quantity'];
      //       $pid=$rowUp1['product_id'];
      //       $insert_query="INSERT INTO CART(product_id, cust_id, quantity) VALUES ('$pid','$cust_id','$qty')";

      //       if (mysqli_query($con,$insert_query)) {
      //           // $delete = "DELETE FROM GUEST_CART WHERE temp_id='$temp_id' AND product_id='$pid'";
      //           // mysqli_query($con,$delete);
      //       }
      //      }   
      //     }
      //     $delete = "DELETE FROM GUEST_CART WHERE temp_id='$temp_id' AND product_id='$pid'";
      //           mysqli_query($con,$delete);
      //     echo "<script language=\"javascript\">document.location.href='index.php';</script>";

      //   }else{
      //   echo "<script language=\"javascript\">document.location.href='index.php';</script>";
      // }

    }
    else{
        echo json_encode(array("statusCode"=>201));
    }
  }
?>