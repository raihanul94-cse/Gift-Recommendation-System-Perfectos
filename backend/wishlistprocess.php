<?php
IF ( $_POST['action'] == 'reguser' ) {
    include '../database/db_con.php';
    $id = $_POST['id'];
    $cust_id = $_POST['custid'];

    $check_for = "SELECT * FROM wishlist WHERE product_id='$id' AND cust_id='$cust_id'";

    $run_query = mysqli_query( $con, $check_for );

    $count = mysqli_num_rows( $run_query );
    
    if ( $count > 0 ) {
        echo json_encode( array( 'status'=>200, 'action'=>'exists' ) );
    } else {

        $insert_query = "INSERT INTO wishlist(product_id, cust_id) VALUES ('$id','$cust_id')";

        if ( mysqli_query( $con, $insert_query ) ) {
            echo json_encode( array( 'status'=>200, 'action'=>'insert' ) );
        } else {
            echo json_encode( array( 'status'=>201, 'action'=>'insert' ) );
        }
    }
} else {
    include '../database/db_con.php';
    session_start();
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $cust_id = session_id();
    $time = time();

    $check_for2 = "SELECT * FROM GUEST_CART WHERE product_id='$id' AND temp_id='$cust_id'";

    $run_query2 = mysqli_query( $con, $check_for2 );

    $count = mysqli_num_rows( $run_query2 );
    $newQty = 0;

    if ( $count > 0 ) {
        $newQty = $count + $qty;
        $update_query = "UPDATE GUEST_CART SET quantity='$newQty',time_get='$time' WHERE product_id='$id' AND temp_id='$cust_id'";

        if ( mysqli_query( $con, $update_query ) ) {
            echo json_encode( array( 'status'=>200, 'action'=>'update' ) );
        } else {
            echo json_encode( array( 'status'=>201, 'action'=>'update' ) );
        }
    } else {

        $insert_query = "INSERT INTO GUEST_CART(product_id, temp_id, quantity, time_get) VALUES ('$id','$cust_id','$qty','$time')";

        if ( mysqli_query( $con, $insert_query ) ) {
            echo json_encode( array( 'status'=>200, 'action'=>'insert' ) );
        } else {
            echo json_encode( array( 'status'=>201, 'action'=>'insert' ) );
        }
    }
}
?>