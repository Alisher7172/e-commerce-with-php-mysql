<?php

include('database.php');
session_start();

$_SESSION['user_email'] = 'example@gamail.com';
$_SESSION['username'] = 'exampleuser';
$_SESSION['password'] = 123;

?>