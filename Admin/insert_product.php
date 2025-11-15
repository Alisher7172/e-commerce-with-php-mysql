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
                <select name="product_categories"  id="" class="form-select mb-4">
                    <option value="">Select a Category</option>
                </select>

                <!-- brands -->
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brand</option>
                </select>
            </div> 

                <! -- Product Images -->
            <div class="form-outline mb-4  ">
                    <label for="product_image" class="form-label">Product Image 1</label>
                    <input type="file" id="product_image" name="product_image" class="form-control" required>
            </div>
            <div class="form-outline mb-4  ">
                    <label for="product_image" class="form-label">Product Image 2</label>
                    <input type="file" id="product_image" name="product_image" class="form-control" required>
            </div>
            <div class="form-outline mb-4  ">
                    <label for="product_image" class="form-label">Product Image 3</label>
                    <input type="file" id="product_image" name="product_image" class="form-control" required>
            </div>
            <div class="form-outline mb-4  ">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" placeholder="Enter product price" autocomplete="off" id="product_price" name="product_price" class="form-control" required>
            </div>
            <div class="form-outline mb-4  ">
                <input type="submit" class="btn btn-info mb-3 px-3 text-light" value="Insert Product" name="insert_product">    
            </div>
        </form>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>