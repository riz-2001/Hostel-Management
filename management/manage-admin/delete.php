<?php

include("../../connection1.php");

$admin_id = $_GET['id'];

$query = "delete from admin_tbl where id='$admin_id'" ;
$result = mysqli_query($con1,$query) || die("Failed to delete");

header("Location: ../manage-admin.php");
?>