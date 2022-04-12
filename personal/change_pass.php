<?php

session_start();

    include("../connection1.php");

    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $query1 = "select * from user_login where user_id='$user_id'";
        $result1 = mysqli_query($con1,$query1);
        $row = mysqli_fetch_assoc($result1);

        $email = $row['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div>
        <form action="" method="POST">
        <?php
        if (!isset($_SESSION['user_id'])){
            ?>
            <div> Email: </div> <input type="email" name="email" required>
            <?php
        }
        ?>
        <div> Current Password: </div> <input type="password" name="old" required>
        <div> New Password: </div> <input type="password" name="new" required>
        <div> Confirm Password: </div> <input type="password" name="confirm" required>
        
        <br><br>
        <input type="submit" value="Submit">
        </form>
        
    </div>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){

        $old1 = $_POST['old'];

        $old1 = substr($old1,0,-5);
        $old2 = md5($_POST['old']);
        $new = md5($_POST['new']);
        $confirm = md5($_POST['confirm']);

        if (isset($_POST['email'])){

            $email = $_POST['email'];
        }

        $query1 = "select password from user_login where email='$email'";
        $result1 = mysqli_query($con1,$query1);
        $row = mysqli_fetch_assoc($result1);
        
        if ($old1===$row['password'] || $old2===$row['password']){
            //echo "hi";
            if ($new === $confirm) {

                $query = "update user_login set 
                password = '$new'  
                where email='$email'";

                mysqli_query($con1,$query);
                
                if(isset($_SESSION['user_id'])){
                    unset($_SESSION['user_id']);
                }
                
                header("Location: ../index.php");
                die;
                
            }
            else{
                echo "Incorrect Password Confirmed";
            }
        }
        else{
            echo "Wrong Password Entered";
        }
    }
?>