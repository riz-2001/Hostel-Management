<?php 
session_start();
include("../../connection1.php");

if(isset($_GET['id'])){

    $room_id = $_GET['id'];

    $query1 = "select hostel_id from rooms where id='$room_id'";
    $result1 = mysqli_query($con2, $query1);
    $row = mysqli_fetch_assoc($result1);

    $hostel_id = $row['hostel_id'];

    $s = "view.php?id=".$hostel_id;

    $query = "delete from rooms where id='$room_id'" ;
    $result = mysqli_query($con2,$query) || die("Failed to delete");

    header("Location: ".$s);

}
else{
    $_SESSION['remove'] = "<div> Error: Failed to Delete</div>";
    echo $_SESSION['remove'];
    header("refresh: 5, url=".$s);
    die();
}
?>