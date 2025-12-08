<?php
    // including database connection
    include('../database.php');
    include('../functions/common_functions.php');
    @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" class="btn btn-primary btn-block mb-4" value="Login" name="user_login"/>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_signup.php">Sign Up</a></p>
                    </div>
                </form>
            </div>
    </div>

        <!-- footer -->
    <?php include('../includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


 <?php
    // user login
    if (isset($_POST['user_login'])) {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $select_query = "SELECT * FROM `user_table` WHERE user_email='$user_email'";
        $result = mysqli_query($dbcon, $select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);

        // card items
        $user_ip = get_ip_address();
        $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
        $result_cart = mysqli_query($dbcon, $select_cart_items);
        $cart_row_count = mysqli_num_rows($result_cart);
        if ($cart_row_count > 0) {
            $_SESSION['username'] = $row_data['username'];
            $_SESSION['user_email'] = $row_data['user_email'];
            echo "<script>alert('Login successful!')</script>";
            echo "<script>window.open('../payment.php','_self')</script>";
            }


        if ($row_count > 0) {
            if (password_verify($user_password, $row_data['user_password'])) {
                // successful login
                $_SESSION['username'] = $row_data['username'];
                $_SESSION['user_email'] = $row_data['user_email'];
                echo "<script>alert('Login successful!')</script>";
                if ($cart_row_count == 0 and $row_count == 1) {
                    echo "<script>window.open('profile.php','_self')</script>";
                } else {
                    echo "<script>window.open('../payment.php','_self')</script>";
                }
            } else {
                echo "<script>alert('Invalid password. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Invalid email. Please try again.')</script>";
        }
    }
    ?>
</body>
</html>