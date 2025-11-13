<?php
include('./includes/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
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
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="../images/product1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="../images/product2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="../images/product3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="../images/product5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="../images/product4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="../images/product6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">View</a>
                        </div>
                    </div>
                </div>
            </div>
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
                $select_brands = "SELECT * FROM brands";
                $result_brands = mysqli_query($dbcon, $select_brands);
                while ($row = mysqli_fetch_assoc($result_brands)) {
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<li class='nav-item'>
                            <a href='./index.php?brand=$brand_id' class='nav-link text-white'>$brand_title</a>
                          </li>";
                }
             ?>

            </ul>
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-primary">
                    <a href="#" class="nav-link text-white">
                        <h4><i class="fa-solid fa-quote-left"></i>Categories<i class="fa-solid fa-quote-right"></i></h4>
                    </a>
                </li>
                <?php
                $select_categories = "SELECT * FROM categories";
                $result_categories = mysqli_query($dbcon, $select_categories);
                while ($row = mysqli_fetch_assoc($result_categories)) {
                    $category_title = $row['category_title'];
                    echo "<li class='nav-item'>
                            <a href='#' class='nav-link text-white'>$category_title</a>
                          </li>";
                }
                ?>
            </ul>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</html>