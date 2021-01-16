<?php
include '../database/db_con.php';
$i_date = date( 'Y-m-d' );
$trans = $_POST['account'];
$trans = "DOP:".$trans;
$pmethod = $_POST['method'];
$amount = $_POST['amount'];
$order_id = $_POST['orderid'];


$insertIntoPayment = "INSERT INTO `PAYMENTS`(`payment_id`, `payment_type`, `paid_date`, `amount`, `order_id`) VALUES ('$trans','$pmethod','$i_date','$amount','$order_id')";

$queryForPayment = mysqli_query( $con, $insertIntoPayment );

if($queryForPayment){
    echo json_encode(array("status"=>200));
}else{
    echo json_encode(array("status"=>201));
}
?>