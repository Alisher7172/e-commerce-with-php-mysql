<?php
include('../includes/database.php');
if(isset($_POST['insert_product'])) {
    // sanitize text inputs
    $product_title = mysqli_real_escape_string($dbcon, trim($_POST['product_title']));
    $product_description = mysqli_real_escape_string($dbcon, trim($_POST['description']));
    $product_keywords = mysqli_real_escape_string($dbcon, trim($_POST['product_keywords']));
    $product_category = (int) $_POST['product_categories'];
    $product_brand = (int) $_POST['product_brands'];
    $product_price = floatval($_POST['product_price']);
    $product_status = 'true';

    // Getting the image filenames
    $product_image1 = basename($_FILES['product_image1']['name']);
    $product_image2 = basename($_FILES['product_image2']['name']);
    $product_image3 = basename($_FILES['product_image3']['name']);

    // Getting the image temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Basic empty check
    if ($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category==0 or $product_brand==0 or $product_price==0 or $product_image1=='' or $product_image2=='' or $product_image3=='') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        // TODO: validate file types and sizes, generate unique filenames (e.g. using time()/uniqid)
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // use escaped values already
        $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) VALUES ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";
        $result_query = mysqli_query($dbcon, $insert_products);
        if ($result_query) {
            echo "<script>alert('Successfully inserted the product')</script>";
        } else {
            echo "<script>alert('DB insert failed: ". mysqli_error($dbcon) ."')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container mt-3 w-50 m-auto">
        <h2 class="text-center">Insert New Product</h2>

        <!-- Product Insertion Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Product Title -->
            <div class="form-outline mb-4  ">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" placeholder="Enter product title" autocomplete="off" id="product_title" name="product_title" class="form-control" required>
            </div>

            <!-- Product Description -->
            <div class="form-outline mb-4  ">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" placeholder="Enter product description" autocomplete="off" id="description" name="description" class="form-control" required>
            </div>

            <!-- Product Keywords -->
            <div class="form-outline mb-4  ">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" placeholder="Enter product keywords" autocomplete="off" id="product_keywords" name="product_keywords" class="form-control" required>
            </div>

            <!-- Product Category -->
            <div class="form-outline mb-4  ">
                <select name="product_categories"  id="product_categories" class="form-select mb-4">
                    <option value="">Select a Category</option>
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $result_query = mysqli_query($dbcon, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_id = $row['category_id'];
                        $category_title = $row['category_title'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>

                <!-- brands -->
                <select name="product_brands" id="product_brands" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                    $select_query = "SELECT * FROM `brands`";
                    $result_query = mysqli_query($dbcon, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_id = $row['brand_id'];
                        $brand_title = $row['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div> 

                <! -- Product Images -->
            <div class="form-outline mb-4  ">
                    <label for="product_image1" class="form-label">Product Image 1</label>
                    <input type="file" id="product_image1" name="product_image1" class="form-control" required>
            </div>
            <div class="form-outline mb-4  ">
                    <label for="product_image2" class="form-label">Product Image 2</label>
                    <input type="file" id="product_image2" name="product_image2" class="form-control" required>
            </div>
            <div class="form-outline mb-4  ">
                    <label for="product_image3" class="form-label">Product Image 3</label>
                    <input type="file" id="product_image3" name="product_image3" class="form-control" required>
            </div>
            <div class="form-outline mb-4  ">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" placeholder="Enter product price" autocomplete="off" id="product_price" name="product_price" class="form-control" required>
            </div>
            <div class="form-outline mb-4  ">
                <input type="submit" class="btn btn-primary mb-3 px-3 text-light" value="Insert Product" name="insert_product">    
            </div>
        </form>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>