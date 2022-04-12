<?php

    include("../../connection1.php");

    $id = $_GET['id'];

    $query1 = "select * from food where food_id='$id'";
    $result1 = mysqli_query($con2,$query1);
    $row = mysqli_fetch_assoc($result1);

    $availability=$row['availability'];
    $category_id = $row['category_id'];
    $availability+=1;

    $query2 = "update food set availability='$availability' where food_id='$id' ";
    
    
    $s = "../manage-item.php?id=".$category_id;
    mysqli_query($con2,$query2);
    header("Location: ".$s);
    die();
    