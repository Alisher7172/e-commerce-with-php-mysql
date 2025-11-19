<?php
include('../includes/database.php');

if (isset($_POST['insert_category'])) {
    $category_title = trim($_POST['category_title']);

    // use prepared statements to avoid SQL injection
    $stmt = mysqli_prepare($dbcon, "SELECT 1 FROM categories WHERE category_title = ?");
    mysqli_stmt_bind_param($stmt, 's', $category_title);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script>alert('Category already exists')</script>";
    } else {
        mysqli_stmt_close($stmt);
        $stmt = mysqli_prepare($dbcon, "INSERT INTO categories (category_title) VALUES (?)");
        mysqli_stmt_bind_param($stmt, 's', $category_title);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Category inserted successfully')</script>";
        } else {
            echo "<script>alert('Failed to insert category')</script>";
        }
    }
    mysqli_stmt_close($stmt);
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