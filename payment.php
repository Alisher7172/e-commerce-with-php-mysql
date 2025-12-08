<?php
include('database.php');
include('functions/common_functions.php');  
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php 
  $user_ip = get_ip_address();
  $get_user = "SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
  $result = mysqli_query($dbcon, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
  ?>

    <h2>Payment Page</h2>
    <p>This is the payment page.</p>
    <div class="container">
        <h3>Select Payment Method</h3>
        <div class="payment-methods">
            <a href="https://www.paypal.com" target="_blank" class="btn btn-primary m-2">PayPal</a>
            <a href="https://www.stripe.com" target="_blank" class="btn btn-info m-2">Stripe</a>
            <a href="cash_on_delivery.php?user_id=<?php echo $user_id; ?>" class="btn btn-success m-2">Cash on Delivery</a>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>