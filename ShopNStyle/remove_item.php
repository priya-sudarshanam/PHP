<?php
include('admin/model.php');
$orderid=$_GET['id'];
$success = delete_item(clean($orderid));
if ($success) {
    header('location:user_cart.php');
} else {
    echo "<i class='fa fa-exclamation-circle fa-2x text-error'>Error saving.</i>";
}

?>
