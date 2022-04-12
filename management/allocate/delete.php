<?php

include("../../connection1.php");

$user_id = $_GET['id'];

$query1 = "select hostel_id from user_login where user_id='$user_id'";
$result1 = mysqli_query($con1,$query1);
$row1 = mysqli_fetch_assoc($result1);

$hostel_id = $row1['hostel_id'];

if ($hostel_id == 0){

    $query = "delete from user_login where user_id='$user_id'" ;
    $result = mysqli_query($con1,$query) || die("Failed to delete");
}
else{
    
    $val = 0;

    $query = "delete from reallocate where user_id='$user_id' and newroom_id='$val'" ;
    $result = mysqli_query($con1,$query) || die("Failed to delete");
}

header("Location: ../allocate.php");
?>