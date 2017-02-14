<?php
include_once('model.php');

$productid=$_GET['productid'];

$success = delete_product($productid);
header('location:product.php');
exit();
?>
