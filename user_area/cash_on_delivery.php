<?php 
include('../database.php');
include('../functions/common_functions.php');

@session_start();
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

}

// getting total items and total price functions
$get_ip_add = get_ip_address();
$total_price = 0;
$cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result = mysqli_query($dbcon, $cart_query);
$invoice_number = mt_rand();
$status = 'pending';
$count_products = mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $result_products = mysqli_query($dbcon, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }
}

 // geetting quantity of the product
$select_cart = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result_cart = mysqli_query($dbcon, $select_cart);
$row_cart = mysqli_fetch_array($result_cart);
$quantity = $row_cart['quantity'];
if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

// inserting order details into user_orders table
$insert_orders = "INSERT INTO `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_orders = mysqli_query($dbcon, $insert_orders);
if ($result_orders) {
    echo "<script>alert('Order placed successfully')</script>";
    echo "<script>window.open('../profile.php','_self')</script>";
}
// inserting order details into pending_orders table
$insert_pending_orders = "INSERT INTO `orders_pending` (user_id,invoice_number,product_id,quantity,order_status) VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_orders = mysqli_query($dbcon, $insert_pending_orders);

// delete items from cart
$delete_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result_delete_cart = mysqli_query($dbcon, $delete_cart);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>