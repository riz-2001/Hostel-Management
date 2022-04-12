<?php

include("../../connection1.php");

$id = $_GET['id'];

$query1 = "select item_id from members where id='$id'";
$result1 = mysqli_query($con2, $query1);
$row = mysqli_fetch_assoc($result1);

$item_id = $row['item_id'];

$query = "delete from members where id='$id'" ;
$result = mysqli_query($con2,$query) || die("Failed to delete");

$s = "view.php?id=".$item_id;
header("Location: ".$s);
?>