<?php
include('../includes/database.php');

if (isset($_POST['insert_category'])) {
    $category_title = $_POST['category_title'];
    $select_category = "SELECT * FROM categories WHERE category_title='$category_title'";
    $result_category = mysqli_query($dbcon, $select_category);
    if (mysqli_num_rows($result_category) > 0) {
        echo "<script>alert('Category already exists')</script>";
    } else {
        $insert_category = "INSERT INTO categories (category_title) VALUES ('$category_title')";
        $result = mysqli_query($dbcon, $insert_category);
        if ($result) {
            echo "<script>alert('Category inserted successfully')</script>";
        } else {
            echo "<script>alert('Failed to insert category')</script>";
        }
    }
}
?>

<form action="" method="post" class="mb-2" id="form">
    <div class="input-group w-90 mb-2">
        <input type="text" class="form-control" placeholder="Insert Category" id="input" name="category_title" aria-label="Insert Category" aria-describedby="basic-addon2" required>
        <div class="input-group-append m-1">
            <button class="btn btn-outline-secondary bg-info text-light" type="submit" name="insert_category">Insert Category</button>
        </div>
    </div>
</form>