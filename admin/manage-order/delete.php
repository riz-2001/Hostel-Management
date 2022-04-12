<?php

include("../../connection1.php");

$order_id = $_GET['id'];

$query1 = "select category_id from orders where order_id='$order_id'";
$result1 = mysqli_query($con1, $query1);
$row = mysqli_fetch_assoc($result1);

$category_id = $row['category_id'];

$query = "delete from orders where order_id='$order_id'" ;
$result = mysqli_query($con1,$query) || die("Failed to delete");

$s = "../manage-order.php?id=".$category_id;
header("Location: ".$s);
?>