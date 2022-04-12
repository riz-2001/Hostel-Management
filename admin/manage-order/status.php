<?php

    include("../../connection1.php");

    $id = $_GET['id'];
    $status="D";

    $query1 = "update orders set status='$status' where order_id='$id'";
    $result1 = mysqli_query($con1,$query1);

    $query = "select category_id from orders where order_id='$id'";
    $result = mysqli_query($con1,$query);
    
    $row = mysqli_fetch_assoc($result);
    $category_id = $row['category_id'];
    
    $s = "../manage-order.php?id=".$category_id;
    header("Location: ".$s);
    die();