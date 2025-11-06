<?php
include('../includes/database.php');
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];
    $insert_brand = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
    $result = mysqli_query($dbcon, $insert_brand);
    if ($result) {
        echo "<script>alert('Brand inserted successfully')</script>";
    } else {
        echo "<script>alert('Failed to insert brand')</script>";
    }
}   
?>

<form action="" method="post" class="mb-2" id="form">
    <div class="input-group w-90 mb-2">
        <input type="text" class="form-control" placeholder="Insert Brand" id="input" name="brand_title" aria-label="Insert Brand" aria-describedby="basic-addon2" required>
        <div class="input-group-append m-1">
            <button class="btn btn-outline-secondary bg-info text-light" type="submit" name="insert_brand">Insert Brand</button>
        </div>
    </div>
</form>