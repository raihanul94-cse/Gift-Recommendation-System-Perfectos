<?php
$countCart = 0;
$countWish = 0;
include 'database/db_con.php';
IF( isset( $_SESSION['name'] ) ) {

    $cust_id = $_SESSION['cust_id'];

    $check_for_cart = "SELECT * FROM cart WHERE cust_id='$cust_id'";
    $check_for_wish = "SELECT * FROM wishlist WHERE cust_id='$cust_id'";

    $run_query_cart = mysqli_query( $con, $check_for_cart );
    $count_rows_cart = mysqli_num_rows( $run_query_cart );
    if ( $count_rows_cart > 0 ) {
        while( $row = mysqli_fetch_array( $run_query_cart ) ) {
            $countCart = $countCart+$row['quantity'];
        }
    }

    $run_query_wish = mysqli_query( $con, $check_for_wish );
    $count_rows_wish = mysqli_num_rows( $run_query_wish );
    if ( $count_rows_wish > 0 ) {

        $countWish = $count_rows_wish;

    }

    echo '
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php" data-toggle="tooltip" data-placement="bottom" title="Cart"><i class="fa fa-cart-plus ic" aria-hidden="true"></i><span class="badge badge-secondary" id="cart-count">'.$countCart.'</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="wishlist.php" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><i class="fa fa-heart-o ic" aria-hidden="true"></i><span class="badge badge-secondary" id="cart-count">'.$countWish.'</span></a>
                    </li>
                </ul>
    ';

} else {

    echo '
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="wishlist.php" data-toggle="tooltip" data-placement="bottom" title="Wishlist"><i class="fa fa-heart-o ic" aria-hidden="true"></i><span class="badge badge-secondary" id="cart-count">'.$countWish.'</span></a>
                    </li>
                </ul>   
    ';

}
?>
