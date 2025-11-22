<?php 
  // including database connection
  include('./includes/database.php');

  // getting products
    function getProducts() {
    global $dbcon;

    // condition to check isset or not
    if (!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query = "SELECT * FROM `products` order by rand() LIMIT 0,12";
    $result_query = mysqli_query($dbcon, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = htmlspecialchars($row['product_id']);
        $product_title = htmlspecialchars($row['product_title']);
        $product_description = htmlspecialchars($row['product_description']);
        $product_image1 = htmlspecialchars($row['product_image1']);
        $product_price = htmlspecialchars($row['product_price']);
        echo "<div class='col-md-3 mb-4'>
                <div class='card h-100'>
                    <img src='Admin/product_images/$product_image1' class='card-img-top' alt='{$product_title}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$product_title}</h5>
                        <p class='card-text'>{$product_description}</p>
                        <p class='card-text'><strong>\${$product_price}</strong></p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='#' class='btn btn-secondary'>View</a>
                    </div>
                </div>
              </div>";
    }
   }}
}


 // getting all products

 function getAllProducts() {
    global $dbcon;

    $select_query = "SELECT * FROM `products` order by rand()";
    $result_query = mysqli_query($dbcon, $select_query);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = htmlspecialchars($row['product_id']);
        $product_title = htmlspecialchars($row['product_title']);
        $product_description = htmlspecialchars($row['product_description']);
        $product_image1 = htmlspecialchars($row['product_image1']);
        $product_price = htmlspecialchars($row['product_price']);
        echo "<div class='col-md-3 mb-4'>
                <div class='card h-100'>
                    <img src='Admin/product_images/$product_image1' class='card-img-top' alt='{$product_title}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$product_title}</h5>
                        <p class='card-text'>{$product_description}</p>
                        <p class='card-text'><strong>\${$product_price}</strong></p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='#' class='btn btn-secondary'>View</a>
                    </div>
                </div>
              </div>";
    }
   } 
// getting unique categories
function getUniqueCategories() {
    global $dbcon;

    // condition to check isset or not
    if (isset($_GET['category'])){
        $category_id = $_GET['category'];
    $select_query = "SELECT * FROM `products` WHERE category_id=$category_id";
    $result_query = mysqli_query($dbcon, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = htmlspecialchars($row['product_id']);
        $product_title = htmlspecialchars($row['product_title']);
        $product_description = htmlspecialchars($row['product_description']);
        $product_image1 = htmlspecialchars($row['product_image1']);
        $product_price = htmlspecialchars($row['product_price']);
        echo "<div class='col-md-3 mb-4'>
                <div class='card h-100'>
                    <img src='Admin/product_images/$product_image1' class='card-img-top' alt='{$product_title}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$product_title}</h5>
                        <p class='card-text'>{$product_description}</p>
                        <p class='card-text'><strong>\${$product_price}</strong></p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='#' class='btn btn-secondary'>View</a>
                    </div>
                </div>
              </div>";
    }
   }
}
// getting unique categories
function getUniqueBrands() {
    global $dbcon;

    // condition to check isset or not
    if (isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
    $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
    $result_query = mysqli_query($dbcon, $select_query);
    if ($num_of_rows = mysqli_num_rows($result_query)) {
        echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = htmlspecialchars($row['product_id']);
        $product_title = htmlspecialchars($row['product_title']);
        $product_description = htmlspecialchars($row['product_description']);
        $product_image1 = htmlspecialchars($row['product_image1']);
        $product_price = htmlspecialchars($row['product_price']);
        echo "<div class='col-md-3 mb-4'>
                <div class='card h-100'>
                    <img src='Admin/product_images/$product_image1' class='card-img-top' alt='{$product_title}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$product_title}</h5>
                        <p class='card-text'>{$product_description}</p>
                        <p class='card-text'><strong>\${$product_price}</strong></p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='#' class='btn btn-secondary'>View</a>
                    </div>
                </div>
              </div>";
    }
   }
}

    // getting brands
    function getBrands() {
                global $dbcon;
                $select_brands = "SELECT * FROM brands";
                $result_brands = mysqli_query($dbcon, $select_brands);
                while ($row = mysqli_fetch_assoc($result_brands)) {
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<li class='nav-item'>
                            <a href='./index.php?brand=$brand_id' class='nav-link text-white'>$brand_title</a>
                          </li>";
                }
    }

    // getting categories
    function getCategories() {
                global $dbcon;
                $select_categories = "SELECT * FROM categories";
                $result_categories = mysqli_query($dbcon, $select_categories);
                while ($row = mysqli_fetch_assoc($result_categories)) {
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<li class='nav-item'>
                            <a href='./index.php?category=$category_id' class='nav-link text-white'>$category_title</a>
                          </li>";
                }
    }
?>