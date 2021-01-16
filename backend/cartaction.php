<?php
if( isset( $_POST['cust_id'] ) ) {
    $cust_id = $_POST['cust_id'];
    if ( isset( $_POST['update'] ) ) {
        include '../database/db_con.php';
        $qty = $_POST['qty'];
        $p_id = $_POST['id'];

        $query = "UPDATE CART SET quantity='$qty' WHERE product_id='$p_id'";
        if ( mysqli_query( $con, $query ) ) {
            echo json_encode( array( 'status'=>200, 'action'=>'update' ) );
        } else {
            echo json_encode( array( 'status'=>201, 'action'=>'update' ) );
        }
    } else if ( isset( $_POST['delete'] ) ) {
        include '../database/db_con.php';
        $p_id = $_POST['id'];
        
        $query = "DELETE FROM CART WHERE product_id='$p_id' AND cust_id='$cust_id'";
        if ( mysqli_query( $con, $query ) ) {
            echo json_encode( array( 'status'=>200, 'action'=>'delete' ) );
        } else {
            echo json_encode( array( 'status'=>201, 'action'=>'delete' ) );
        }
    }
}
?>