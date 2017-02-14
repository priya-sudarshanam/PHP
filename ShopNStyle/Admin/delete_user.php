<?php
include_once ('model.php');
include_once ('session.php');
$rows_deleted = delete_user($_GET['id']);
header('location:user.php');
exit();

?>
