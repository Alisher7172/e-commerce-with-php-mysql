<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Navigation Bar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="logo" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link fw-medium">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <div class="bg-success mb-3">
            <h3 class="text-center p-2 text-light">Admin Dashboard</h3>
        </div>

        <div class="row">
            <div class="col-md-12 bg-success p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/product1.jpg" alt="pic1" class="admin-img"></a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                    <div class="button text-center flex-grow-1">
                    <button class="my-3 bg-primary p-2"><a href="insert_product.php" class="nav-link text-light bg-primary my-1">Insert Products</a></button>
                    <button class="my-3 bg-primary p-2"><a href="index.php?view_products" class="nav-link text-light bg-primary my-1">View Products</a></button>
                    <button class="my-3 bg-primary p-2"><a href="index.php?insert_category" class="nav-link text-light bg-primary my-1">Insert Categories</a></button>
                    <button class="my-3 bg-primary p-2"><a href="index.php?view_categories" class="nav-link text-light bg-primary my-1">View Categories</a></button>
                    <button class="my-3 bg-primary p-2"><a href="index.php?insert_brand" class="nav-link text-light bg-primary my-1">Insert Brands</a></button>
                    <button class="my-3 bg-primary p-2"><a href="index.php?view_brands" class="nav-link text-light bg-primary my-1">View Brands</a></button>
                    <button class="my-3 bg-primary p-2"><a href="index.php?view_orders" class="nav-link text-light bg-primary my-1">All Orders</a></button>
                    <button class="my-3 bg-primary p-2"><a href="index.php?view_payments" class="nav-link text-light bg-primary my-1">All Payments</a></button>
                    <button class="my-3 bg-primary p-2"><a href="index.php?list_users" class="nav-link text-light bg-primary my-1">List Users</a></button>
                    <button class="my-3 bg-primary p-2"><a href="../index.php" class="nav-link text-light bg-primary my-1">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_category.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brand.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['view_orders'])) {
                include('view_orders.php');
            }
            if (isset($_GET['view_payments'])) {
                include('view_payments.php');
            }
            ?>
        </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>