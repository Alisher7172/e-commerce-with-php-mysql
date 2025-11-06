<?php

$dbcon = mysqli_connect("localhost","root","quiz","e-store-php");
if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}

?>