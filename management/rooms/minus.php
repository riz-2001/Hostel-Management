<?php

    include("../../connection1.php");

    $room_id = $_GET['id'];

    $query1 = "select * from rooms where id='$room_id'";
    $result1 = mysqli_query($con2,$query1);
    $row = mysqli_fetch_assoc($result1);

    $availability=$row['availability'];
    $hostel_id = $row['hostel_id'];
    $availability-=1;

    $query2 = "update rooms set availability='$availability' where id='$room_id' ";
    
    
    $s = "view.php?id=".$hostel_id;
    mysqli_query($con2,$query2);
    header("Location: ".$s);
    die();