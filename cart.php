<?php
include('database.php');
include('functions/common_functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        .cart-img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-light bg-white border border-bottom-dark">
        <div class="container-fluid">
            <img src="../images/logo.jpg" alt="logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-plus"></i><sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?></a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- table to display cart items -->
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <div class="col-md-12">
                <div class="table-responsive">
                    
                    <table class="table table-bordered text-center">
                        
                        <tbody>
                            <!-- cart display function -->
                            <?php
                            function display_cart_items()
                            {
                                global $dbcon;
                                $get_ip_add = get_ip_address();
                                $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                                $result_query = mysqli_query($dbcon, $select_query);
                                $result_count = mysqli_num_rows($result_query);

                                $get_ip_add = get_ip_address();
                                if ($result_count == 0) {
                                    echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                                }else {
                                echo "<tr>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove Item</th>
                                        <th>Remove</th>
                                        <th>Update Cart</th>
                                    </tr>";
                                while ($row = mysqli_fetch_array($result_query)) {
                                    $product_id = $row['product_id'];
                                    $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
                                    $result_products = mysqli_query($dbcon, $select_products);
                                   
                                    while ($row_product = mysqli_fetch_array($result_products)) {
                                        $product_title = $row_product['product_title'];
                                        $product_image1 = $row_product['product_image1'];
                                        $product_price = $row_product['product_price'];
                                        echo "<tr>
                                                <td>$product_title</td>
                                                <td><img src='Admin/product_images/$product_image1' class='cart-img'></td>
                                                <td><input type='number' name='quantity' class='form-input w-50' value='1'></td>
                                               
                                                <td>\$$product_price</td>
                                                <td><input type='checkbox' name='removeItem[]' value='$product_id'></td>
                                                <td><input type='submit' value='Remove' class='btn btn-secondary' name='remove_item'></td>
                                                <td><a href='edit.php?product_id=$product_id'><button type='submit' value='Update Cart' class='btn btn-secondary' name='update_cart'>Update</button></a></td>
                                            </tr>";
                                            
                                    }
                                }
                            }}
                            ?>
                            <?php display_cart_items(); ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                  $get_ip_add = get_ip_address();
                  $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                  $result_query = mysqli_query($dbcon, $select_query);
                  $result_count = mysqli_num_rows($result_query);
                  $product_price = $row['product_price'] ?? 0;
                  if (isset($_POST['update_cart'])) {
                          $quantity = $_POST['quantity'];
                          $update_cart = "UPDATE `cart_details` SET quantity=$quantity WHERE ip_address='$get_ip_add'";
                          $result_quantity = mysqli_query($dbcon, $update_cart);
                          $_SESSION['quantity'] = $quantity;
                          $total_price = $product_price * $quantity;
                  }
                  $get_ip_add = get_ip_address();
                  if ($result_count == 0) {
                  echo "
                  <div class='d-flex justify-content-center'>
                      <a href='display_all.php' class='btn btn-primary mb-3'>Continue Shopping</a>
                  </div>";
                  } else {
                      echo "
                      <div class='d-flex justify-content-center'>
                          <a href='display_all.php' class='btn btn-primary mb-3 me-3'>Continue Shopping</a>
                          <a href='user_area/checkout.php' class='btn btn-success mb-3'>Checkout</a>
                      </div>
                      ";
                  }
                ?>
                
                </div>
                </div>
            </form>
            </div>
        </div>
<?php
// remove item function
function remove_cart_item(){
    global $dbcon;
    $get_ip_add = get_ip_address();
    if (isset($_POST['remove_item'])) {
        foreach ($_POST['removeItem'] as $remove_id) {
            $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id AND ip_address='$get_ip_add'";
            $run_delete = mysqli_query($dbcon, $delete_query);
            if ($run_delete) {
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item = remove_cart_item();
?>


        <!-- footer -->
        <?php include('./includes/footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>