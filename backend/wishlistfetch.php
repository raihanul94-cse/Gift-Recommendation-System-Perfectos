<?php
$i = 1;
$output = '';
IF( isset( $_SESSION['name'] ) ) {
    include 'database/db_con.php';
    $cust_id = $_SESSION['cust_id'];
    $query_for_cart = "SELECT PRODUCTS.product_id, PRODUCTS.product_name,PRODUCTS.sell_price, WISHLIST.product_id, WISHLIST.cust_id FROM WISHLIST INNER JOIN PRODUCTS ON PRODUCTS.product_id=WISHLIST.product_id AND WISHLIST.cust_id='$cust_id'";

    $has_value = mysqli_query( $con, $query_for_cart );


    if ( mysqli_num_rows( $has_value ) > 0 ) {
        while( $row = mysqli_fetch_array( $has_value ) ) {
            $product_id    = $row['product_id'];
            $product_name   = $row['product_name'];
            $product_price = $row['sell_price'];
            $output .= '<tr>
                          <th scope="row">'.$i++.'</th>
                          <td>'.$product_name.'</td>
                          <td> ৳ '.$product_price.'</td>
                          <form>
                          <td><input type="text" id="qty" value="1" class="input-quantity" data-qty="1"</td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                               <button type="button" class="btn btn-primary" id="addToCart" data-userid="'.$cust_id.'" data-id="'.$product_id.'" data-price="'.$product_price.'"><i class="fa fa-plus"></i> Cart</button>
                               <button type="button" class="btn btn-danger" id="deleteWish" data-userid="'.$cust_id.'" data-product="'.$product_id.'"><i class="fa fa-trash-o"></i> delete</button>
                            </form>
                            </div>
                          </td>
                        </tr>';
        }
    }
    $getProductPrice = "SELECT PRODUCTS.sell_price, CART.quantity FROM PRODUCTS INNER JOIN CART ON PRODUCTS.product_id=CART.product_id AND CART.cust_id='$cust_id'";

    $queryForProductPrice = mysqli_query( $con, $getProductPrice );

    $amount = 0;
    if ( mysqli_num_rows( $queryForProductPrice ) > 0 ) {
        while ( $row = mysqli_fetch_array( $queryForProductPrice ) ) {
            $price_per_item = $row['sell_price'] * $row['quantity'];
            $amount = $amount+$price_per_item;
        }
    }

} else {
    include 'database/db_con.php';
    $cust_id = session_id();

    $query_for_cart = "SELECT PRODUCTS.product_id, PRODUCTS.product_name,PRODUCTS.sell_price, GUEST_CART.product_id, GUEST_CART.quantity, GUEST_CART.temp_id FROM GUEST_CART INNER JOIN PRODUCTS ON PRODUCTS.product_id=GUEST_CART.product_id AND GUEST_CART.temp_id='$cust_id'";

    $has_value = mysqli_query( $con, $query_for_cart );

    if ( mysqli_num_rows( $has_value ) > 0 ) {
        while( $row = mysqli_fetch_array( $has_value ) ) {
            $product_id    = $row['product_id'];
            $product_name   = $row['product_name'];
            $product_price = $row['sell_price'];
            $qty = $row['quantity'];

            $output .= '<tr>
                          <th scope="row">'.$i++.'</th>
                          <td>'.$product_name.'</td>
                          <td> ৳ '.$product_price.'</td>
                          <form id="cart-item">
                          <td><input type="text" id="qty" value="'.$qty.'" class="input-quantity" data-qty="'.$qty.'" name="qty"></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                               <button type="button" class="btn btn-primary" id="update" data-userid="'.$cust_id.'" data-product="'.$product_id.'">update</button>
                               <button type="button" class="btn btn-danger" id="delete" data-userid="'.$cust_id.'" data-product="'.$product_id.'">delete</button>
                            </div>
                            </form>
                          </td>
                        </tr>';
        }
    }
    $getProductPrice = "SELECT PRODUCTS.sell_price, GUEST_CART.quantity FROM PRODUCTS INNER JOIN GUEST_CART ON PRODUCTS.product_id=GUEST_CART.product_id AND GUEST_CART.temp_id='$cust_id'";

    $queryForProductPrice = mysqli_query( $con, $getProductPrice );

    $amount = 0;
    if ( mysqli_num_rows( $queryForProductPrice ) > 0 ) {
        while ( $row = mysqli_fetch_array( $queryForProductPrice ) ) {

            $price_per_item = $row['sell_price'] * $row['quantity'];
            $amount = $amount+$price_per_item;

        }
    }
}
echo $output;
?>
