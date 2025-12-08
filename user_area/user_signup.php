<?php
include('../database.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center">User Sign Up</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="confirm_password"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" class="btn btn-primary btn-block mb-4" value="Sign Up" name="user_register"/>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php">Login</a></p>
                    </div>
                </form>
            </div>
    </div>
       






    <!-- footer -->
    <?php include('../includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_image=$_FILES['user_image']['name'];
    $user_password=$_POST['user_password'];
    $confirm_password=$_POST['confirm_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=get_ip_address();

    // select query
    $select_query="SELECT * FROM `user_table` WHERE user_email='$user_email'";
    $result=mysqli_query($dbcon,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Email already exists')</script>";
    }else if($user_password!=$confirm_password){
        echo "<script>alert('Passwords do not match')</script>";
    }else{
        // insert query
        move_uploaded_file($user_image_tmp,"../Admin/user_images/$user_image");
        $insert_query="INSERT INTO `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($dbcon,$insert_query);
        if($sql_execute){
            echo "<script>alert('Registration successful')</script>";
        }else{
            die(mysqli_error($dbcon));
        }
    }


    // cart items
    $select_cart_items="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $result_cart=mysqli_query($dbcon,$select_cart_items);
    $rows_count_cart=mysqli_num_rows($result_cart);
    if($rows_count_cart>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>