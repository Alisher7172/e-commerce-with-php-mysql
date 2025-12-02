<?php
include('./includes/database.php');
include('./functions/common_functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
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
                        <a class="nav-link" href="#"><i class="fa-solid fa-cart-plus"></i><sup>0</sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: $0.00</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- login navbar -->

    <nav class="navbar navbar-expand-lg bg-body-light bg-white border border-bottom-dark">
        <div class="container-fluid">
            <h5>Welcome User</h5>
            <div class="collapse navbar-collapse" id="loginNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2 class="text-center">Maxima XXX</h2>
    <p class="text-center">dominating the market with top-notch products.</p>

    <!-- cards section -->
    <div class="row">
        <!-- main content: cards take 10/12 columns -->
        <div class="col-md-10">
            <!-- nested row so .col-md-3 children behave correctly -->
            <div class="row">
                <?php
                viewDetails() ;
                getUniqueCategories();
                getUniqueBrands();

                ?>

                <!-- row end -->
            </div>
            <!-- col end -->
        </div>
        <!-- sidenav: 2/12 columns (sibling to the main col) -->
        <div class="col-md-2 bg-dark p-0">
            <!-- sidenav -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-primary">
                    <a href="#" class="nav-link text-white">
                        <h4>Brands<i class="fa-solid fa-crown "></i></h4>
                    </a>
                </li>
                <?php
                getBrands();
                ?>

            </ul>
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-primary">
                    <a href="#" class="nav-link text-white">
                        <h4><i class="fa-solid fa-quote-left"></i>Categories<i class="fa-solid fa-quote-right"></i></h4>
                    </a>
                </li>
                <?php
                getCategories();
                ?>
            </ul>
        </div>
    </div>

    <!-- footer -->
    <?php include('./includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>