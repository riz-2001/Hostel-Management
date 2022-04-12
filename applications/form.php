<?php
session_start();
    include("../connection1.php");
    
    $category_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $status = "L";
    $quantity = 1;

    $query2 = "select category_name from food_category where category_id='$category_id'";
    $result2 = mysqli_query($con2, $query2);
    $row2 = mysqli_fetch_assoc($result2);

    $category_name = $row2['category_name'];

    $query1 = "select hostel_id from user_login where user_id='$user_id'";
    $result1 = mysqli_query($con1, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $hostel_id = $row1['hostel_id'];

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $from = $_POST['from'];

        if (isset($_POST['to'])){
            $to = $_POST['to'];
        }
        else{
            $to = 0;
        }
        $description = $_POST['description'];
        
        $query="insert into orders (user_id,quantity,total_amount,canteen_id,category_id,status,time) values ('$user_id','$quantity','$to','$hostel_id','$category_id','$status','$from')";
        mysqli_query($con1,$query); 
            
        header("Location: index.php");
        die;
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link rel="stylesheet" href="no.css">
</head>
<body>

<form action="" method="POST">
<h3 class="pls">
        <!-- Guest Rooms -->
        <?php echo $category_name ?>
    </h3>
<div>
        <form action="" method="POST">
        <div class="text"> From: </div> <input type="date" name="from" required>
        <?php
        if ($category_name == "Medical"){
            ?> 
            <div>

            </div>
            <?php
        }
        else{
            ?>
            <div class="text"> Number of Days: </div> <input type="number" name="to" required>
            <?php
        }
        ?>
        <div class="text"> Description / Reason: </div> <textarea type="textarea" rows="10" cols="40" name="description" required></textarea>
        <br><br>
        <input type="submit" value="Submit" class="btn">
        </form>
        
    </div>
</body>
</html>