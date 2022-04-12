<?php

    include("../../connection1.php");

    $notice_id = $_GET['id'];

    $query1 = "select category_name from notices where id='$notice_id'";
    $result1 = mysqli_query($con2,$query1);
    $row = mysqli_fetch_assoc($result1);

    $category_name = $row['category_name'];
    
    $status = "N";

    $query2 = "update notices set status='$status' where id='$notice_id'";

    mysqli_query($con2,$query2);

    $s = "view.php?cat=".$category_name;
    header("Location: ".$s);
    die();