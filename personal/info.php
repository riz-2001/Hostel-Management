<?php

session_start();

    include("../connection1.php");

    $user_id = $_SESSION['user_id'];

    $query = "select * from user_login where user_id='$user_id'";
    $result = mysqli_query($con1, $query);

    $row = mysqli_fetch_assoc($result);

    $student_id = $row['user_id'];
    $username = $row['username'];
    $name = $row['customer_name'];
    $hostel_id = $row['hostel_id'];
    $contact = $row['contact'];
    $email = $row['email'];
    $position = $row['position'];
    $dob = $row['birthdate'];
    $blood_grp = $row['blood_grp'];

    if ($hostel_id){

        $query1 = "select canteen_name from info where canteen_id='$hostel_id'";
        $result1 = mysqli_query($con2, $query1);

        $row1 = mysqli_fetch_assoc($result1);
        $hostel_name = $row1['canteen_name'];

        $val = true;
    }
    else{

        $hostel_name = "Hostel Allocation process is ongoing";

        $val = false;
    }

    if ($val){

        $zero = 0;
        $query2 = "select id from reallocate where user_id='$user_id' and newroom_id='$zero'";
        $result2 = mysqli_query($con1, $query2);

        if (!$result2 or mysqli_num_rows($result2) == 1){

            $re = false;
        }
        else{

            $re = true;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Info</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<div class="info-head">
            <h3>
                Personal Info
            </h3>
        </div>
    <table class="content-table">
        <tr>
            <td><strong>Student Id </strong></td>
            <td><?php echo $student_id; ?></td>
            <td></td>
        </tr>
        <tr class="active-row">
            <td><strong>Full Name</strong></td>
            <td><?php echo $name; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>UserName</strong></td>
            <td><?php echo $username; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Position</strong></td>
            <td><?php echo $position; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Date of Birth</strong></td>
            <td><?php echo $dob; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Blood Group</strong></td>
            <td><?php echo $blood_grp; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Contact No</strong></td>
            <td><?php echo $contact; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><?php echo $email; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Hostel</strong></td>
            <td><?php echo $hostel_name; ?></td>
            <td><?php 
                
                if ($val && !$re){
                    ?>
                    <button><a href="reAllocate.php">ReAllocate</a></button>
                    <?php
                }
            ?>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <div class="second">
    <button><a href="update.php">Change info</a></button>
    </div>
   
</div>
</body>
</html>





















