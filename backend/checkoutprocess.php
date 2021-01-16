<?php
session_start();
include '../database/db_con.php';
IF( isset( $_SESSION['name'] ) ) {
    if ( isset( $_POST['oconfirm'] ) && $_POST['oconfirm'] == 'COD' ) {
        $name = $_POST['name'];
        $cust_id = $_SESSION['cust_id'];
        $address2 = ' ';
        $address = $_POST['address'];
        if ( isset( $_POST['address2'] ) ) {
            $address2 = $_POST['address2'];
        }
        $cust_number = $_POST['contact'];
        $pmethod = $_POST['pmethod'];
        $trans = $_POST['trans'];
        $order_id = uniqid();
        $done = false;
        $_SESSION['order_id'] = $order_id;
        $i_date = date( 'Y-m-d' );
        $d_date = date( 'Y-m-d' );

        $insertIntoOrder = "INSERT INTO `ORDERS`(`order_id`, `issue_date`, `delivery_date`, `cust_id`,`order_status`) VALUES ('$order_id','$i_date','$d_date','$cust_id','Pending')";

        $getProductPrice = "SELECT PRODUCTS.sell_price, CART.quantity FROM PRODUCTS INNER JOIN CART ON PRODUCTS.product_id=CART.product_id AND CART.cust_id='$cust_id'";

        $queryForProductPrice = mysqli_query( $con, $getProductPrice );

        $amount = 0;
        if ( mysqli_num_rows( $queryForProductPrice ) > 0 ) {
            while ( $row = mysqli_fetch_array( $queryForProductPrice ) ) {

                $price_per_item = $row['sell_price'] * $row['quantity'];
                $amount = $amount+$price_per_item;

            }
        }

        $insertIntoPayment = "INSERT INTO `PAYMENTS`(`payment_id`, `payment_type`, `paid_date`, `amount`, `order_id`) VALUES ('$trans','$pmethod','$i_date','$amount','$order_id')";

        $queryForOrder = mysqli_query( $con, $insertIntoOrder );
        $queryForPayment = mysqli_query( $con, $insertIntoPayment );

        if ( $queryForOrder && $queryForPayment ) {

            $getCartItem = "SELECT PRODUCTS.sell_price, PRODUCTS.product_name, CART.quantity, CART.product_id FROM PRODUCTS INNER JOIN CART ON PRODUCTS.product_id=CART.product_id AND CART.cust_id='$cust_id'";

            if ( mysqli_num_rows( mysqli_query( $con, $getCartItem ) ) > 0 ) {
                while( $arr = mysqli_fetch_array( mysqli_query( $con, $getCartItem ) ) ) {

                    $product_id = $arr['product_id'];
                    $quantity = $arr['quantity'];
                    $price = $arr['sell_price'];
                    $product_name = $arr['product_name'];
                    $moveItemToOrderdedItem = "INSERT INTO `ORDERED_ITEM`(`order_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES ('$order_id','$product_id','$product_name','$quantity','$price')";

                    if ( mysqli_query( $con, $moveItemToOrderdedItem ) ) {
                        $deleteCart = "DELETE FROM CART WHERE cust_id='$cust_id' AND product_id='$product_id'";
                        if ( mysqli_query( $con, $deleteCart ) ) {
                            $_SESSION['cust_name'] = $name;
                            $_SESSION['address'] = $address.' '.$address2;
                            $_SESSION['contact'] = $cust_number;
                            $done = true;
                        }
                    }
                }
                if ( $done == true ) {
                    echo json_encode( array( 'statusCode'=>200 ) );
                } else {
                    echo json_encode( array( 'statusCode'=>201 ) );
                }
            } else {
                echo json_encode( array( 'statusCode'=>201 ) );
            }
        } else {
            echo json_encode( array( 'statusCode'=>201 ) );
        }
    } else if ( isset( $_POST['oconfirm'] ) && $_POST['oconfirm'] == 'DOP' ) {
        $name = $_POST['name'];
        $cust_id = $_SESSION['cust_id'];
        $address2 = ' ';
        $address = $_POST['address'];
        if ( isset( $_POST['address2'] ) ) {
            $address2 = $_POST['address2'];
        }
        $cust_number = $_POST['contact'];
        $order_id = uniqid();
        $done = false;
        $_SESSION['order_id'] = $order_id;
        $i_date = date( 'Y-m-d' );
        $d_date = date( 'Y-m-d' );

        $insertIntoOrder = "INSERT INTO `ORDERS`(`order_id`, `issue_date`, `delivery_date`, `cust_id`,`order_status`) VALUES ('$order_id','$i_date','$d_date','$cust_id','Pending')";

        $getProductPrice = "SELECT PRODUCTS.sell_price, CART.quantity FROM PRODUCTS INNER JOIN CART ON PRODUCTS.product_id=CART.product_id AND CART.cust_id='$cust_id'";

        $queryForProductPrice = mysqli_query( $con, $getProductPrice );

        $amount = 0;
        if ( mysqli_num_rows( $queryForProductPrice ) > 0 ) {
            while ( $row = mysqli_fetch_array( $queryForProductPrice ) ) {

                $price_per_item = $row['sell_price'] * $row['quantity'];
                $amount = $amount+$price_per_item;

            }
        }

        $queryForOrder = mysqli_query( $con, $insertIntoOrder );
        if ( $queryForOrder) {

            $getCartItem = "SELECT PRODUCTS.sell_price, PRODUCTS.product_name, CART.quantity, CART.product_id FROM PRODUCTS INNER JOIN CART ON PRODUCTS.product_id=CART.product_id AND CART.cust_id='$cust_id'";

            if ( mysqli_num_rows( mysqli_query( $con, $getCartItem ) ) > 0 ) {
                while( $arr = mysqli_fetch_array( mysqli_query( $con, $getCartItem ) ) ) {

                    $product_id = $arr['product_id'];
                    $quantity = $arr['quantity'];
                    $price = $arr['sell_price'];
                    $product_name = $arr['product_name'];
                    $moveItemToOrderdedItem = "INSERT INTO `ORDERED_ITEM`(`order_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES ('$order_id','$product_id','$product_name','$quantity','$price')";

                    if ( mysqli_query( $con, $moveItemToOrderdedItem ) ) {
                        $deleteCart = "DELETE FROM CART WHERE cust_id='$cust_id' AND product_id='$product_id'";
                        if ( mysqli_query( $con, $deleteCart ) ) {
                            $_SESSION['cust_name'] = $name;
                            $_SESSION['address'] = $address.' '.$address2;
                            $_SESSION['contact'] = $cust_number;
                            $done = true;
                        }
                    }
                }

                if ( $done == true ) {
                    echo json_encode( array( 'statusCode'=>200,"oid"=>$order_id,"i"=>$amount ) );
                } else {
                    echo json_encode( array( 'statusCode'=>201 ) );
                }
            } else {
                echo json_encode( array( 'statusCode'=>201 ) );
            }
        } else {
            echo json_encode( array( 'statusCode'=>201 ) );
        }
    }
}
?>