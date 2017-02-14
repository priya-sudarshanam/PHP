<?php
ob_start();
session_start();
ob_flush();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['role_id']) || (trim($_SESSION['role_id']) == '')) { ?>
<script>
window.location = "index.php";
</script>
<?php 
}
$session_id=$_SESSION['role_id'];
?>