<?php

include("../../connection1.php");

$id = $_GET['id'];

$query = "delete from user_login where user_id='$id'" ;
$result = mysqli_query($con1,$query) || die("Failed to delete");

header("Location: ../manage-student.php");
?>