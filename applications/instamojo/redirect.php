<?php

session_start();

include("../../connection1.php");

//echo "<pre>";
//print_r($_REQUEST);

$payment_id = $_SESSION['payment_id'];
$user_id = $_SESSION['user_id'];

if ($_REQUEST['payment_request_id'] == $_SESSION['TID']){

    if ($_REQUEST['payment_status'] == "Credit"){
        echo "Payment Successful";

        $status = "P";

        $query = "update payments set status='$status' where id='$payment_id'";
        mysqli_query($con1, $query);

        $query1 = "select * from payments where id='$payment_id'";
        $result1 = mysqli_query($con1, $query1);
        $row1 = mysqli_fetch_assoc($result1);

        $hostel_id = $row1['canteen_id'];
        $item_id = $row1['item_id'];

        $query3 = "select availability from food where food_id='$item_id'";
        $result3 = mysqli_query($con2, $query3);
        $row3 = mysqli_fetch_assoc($result3);

        $availability = $row3['availability'];
        $availability = $availability - 1; 

        $query2 = "update food set availability='$availability' where food_id='$item_id'";
        $result2 = mysqli_query($con2, $query2);

    }
    else{
        echo "Payment Unsuccessful";

        $query = "delete from payments where id='$payment_id'";
        mysqli_query($con1, $query);

    }
    unset($_SESSION['payment_id']);

    unset($_SESSION['TID']);

    header("refresh: 5; url=../index.php");
}

?>