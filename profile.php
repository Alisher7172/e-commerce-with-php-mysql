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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>User Profile Page</h2>
    <p>Welcome to your profile!</p>
    <div class="row m-0">
        <!-- sidenav: 2/12 columns (sibling to the main col) -->
        <div class="col-md-2 bg-dark p-0">
            <!-- sidenav -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-primary">
                    <img src="images/product2.jpg" alt="cat" class="profile-image my-3 rounded-circle w-75">
                </li>
                <li class="nav-item bg-primary">
                    <a href="profile.php?edit_account" class="nav-link text-light border border-white rounded-5 m-2">Edit Account</a>
                </li>
                <li class="nav-item bg-primary">
                    <a href="profile.php?my_orders" class="nav-link text-light border border-white rounded-5 m-2">My Orders</a>
                </li>
                <li class="nav-item bg-primary">
                    <a href="profile.php" class="nav-link text-light border border-white rounded-5 m-2">Pending orders</a>
                </li>
                <li class="nav-item bg-primary">
                    <a href="profile.php?delete_account" class="nav-link text-light border border-white rounded-5 m-2">Delete Account</a>
                </li>
                <li class="nav-item bg-primary">
                    <a href="user_logout.php" class="nav-link text-light border border-white rounded-5 m-2">Logout</a>
                </li>
            </ul>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>