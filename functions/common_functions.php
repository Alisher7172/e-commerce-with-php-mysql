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
                    <img class='cart-image' src='Admin/product_images/$product_image1' class='card-img-top' alt='{$product_title}'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'><strong>\$$product_price</strong></p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View</a>
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
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'><strong>\$$product_price</strong></p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View</a>
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
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View</a>
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
    if ($num_of_rows = mysqli_num_rows($result_query)==0) {
        echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = htmlspecialchars($row['product_id']);
        $product_title = htmlspecialchars($row['product_title']);
        $product_description = htmlspecialchars($row['product_description']);
        $product_image1 = htmlspecialchars($row['product_image1']);
        $product_price = htmlspecialchars($row['product_price']);
        echo "<div class='col-md-3 mb-4'>
                <div class='card'>
                    <img src='Admin/product_images/$product_image1' class='card-img-top' alt='{$product_title}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$product_title}</h5>
                        <p class='card-text'>{$product_description}</p>
                        <p class='card-text'><strong>\${$product_price}</strong></p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?product_id=$product_id' type='button' class='btn btn-secondary'>View</a>
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


    function viewDetails() {
        global $dbcon;

        // condition to check isset or not
        if (isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
        $result_query = mysqli_query($dbcon, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_title = htmlspecialchars($row['product_title']);
            $product_description = htmlspecialchars($row['product_description']);
            $product_image1 = htmlspecialchars($row['product_image1']);
            $product_image2 = htmlspecialchars($row['product_image2']);
            $product_image3 = htmlspecialchars($row['product_image3']);
            $product_price = htmlspecialchars($row['product_price']);
            echo "
              <div class='row px-1'>
    
    <div class='col-md-4 mb-4'>
        <div class='card'>
            <img src='Admin/product_images/$product_image1' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'><strong>$product_price</strong></p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                <a href='index.php' type='button' class='btn btn-secondary'>Back | Home</a>
            </div>
        </div>
    </div>
    
    <div class='col-md-8 mb-4'>
        <h4 class='text-center text-primary mb-4 mt-4'>Related Products</h4>

        <div class='row'>
            <div class='col-md-6 mb-3'>
                <div class='card'>
                    <img src='Admin/product_images/$product_image2' class='card-img-top' alt='Related Product 1'>
                </div>
            </div>
            
            <div class='col-md-6 mb-3'>
                 <div class='card'>
                    <img src='Admin/product_images/$product_image1' class='card-img-top' alt='Related Product 2'>
                </div>
            </div>
        </div>
    </div>

</div>
            ";
        }
       }
    }


 // get ip address function
  
function get_ip_address() {

    // Check for shared Internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // Check for IP addresses passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        // Check if multiple IP addresses exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        }
        else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // Return unreliable IP address since all else failed
    return $_SERVER['REMOTE_ADDR'];
}
 // Validate IP address function
function validate_ip($ip) {

    if (strtolower($ip) === 'unknown')
        return false;

    // Generate IPv4 network address
    $ip = ip2long($ip);

    // If the IP address is set and not equivalent to 255.255.255.255
    if ($ip !== false && $ip !== -1) {
        // Make sure to get unsigned long representation of IP address
        // due to discrepancies between 32 and 64 bit OSes and
        // signed numbers (ints default to signed in PHP)
        $ip = sprintf('%u', $ip);

        // Do private network range checking
        if ($ip >= 0 && $ip <= 50331647)
            return false;
        if ($ip >= 167772160 && $ip <= 184549375)
            return false;
        if ($ip >= 2130706432 && $ip <= 2147483647)
            return false;
        if ($ip >= 2851995648 && $ip <= 2852061183)
            return false;
        if ($ip >= 2886729728 && $ip <= 2887778303)
            return false;
        if ($ip >= 3221225984 && $ip <= 3221226239)
            return false;
        if ($ip >= 3232235520 && $ip <= 3232301055)
            return false;
        if ($ip >= 4294967040)
            return false;
    }
    return true;
}   

// get user cart function
function cart() {
    if (isset($_GET['add_to_cart'])) {
        global $dbcon;
        $get_ip_add = get_ip_address();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
        $result_query = mysqli_query($dbcon, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present in the cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 0)";
            $result_query = mysqli_query($dbcon, $insert_query);
            echo "<script>alert('Item added to cart successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// function to get cart item numbers
function cart_item() {
    if (isset($_GET['add_to_cart'])) {
        global $dbcon;
        $get_ip_add = get_ip_address();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($dbcon, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {   
        global $dbcon;
        $get_ip_add = get_ip_address();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
        $result_query = mysqli_query($dbcon, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// total price function
function total_cart_price() {
    global $dbcon;
    $get_ip_add = get_ip_address();
    $total_price = 0;
    $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
    $result_query = mysqli_query($dbcon, $select_query);
    while ($row = mysqli_fetch_array($result_query)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
        $result_products = mysqli_query($dbcon, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo "$" . $total_price;
}


?>