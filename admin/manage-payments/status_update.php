<?php

    include("../../connection1.php");

    $payment_id = $_GET['id'];

    $query1 = "select * from payments where id='$payment_id'";
    $result1 = mysqli_query($con1,$query1);
    $row = mysqli_fetch_assoc($result1);

    $status = $row['status'];
    $user_id = $row['user_id'];
    
    if ($status == "U"){
        $status = "P";
    }
    else{
        $status = "U";
    }

    $query2 = "update payments set status='$status' where id='$payment_id'";

    mysqli_query($con1,$query2);

    $s = "../manage-student/payment.php?id=".$user_id;
    header("Location: ".$s);
    die();