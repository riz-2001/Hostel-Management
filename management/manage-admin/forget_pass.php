<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
</body>
</html>

<?php

    $admin_id = $_GET['id'];

    $s = "change_pass.php?id=".$admin_id;

    $query = "select * from admin_tbl where id='$admin_id'";
    $result = mysqli_query($con1, $query);

        if (!$result || mysqli_num_rows($result)==0){

            echo "Sorry there is some unexepected error";
        }

        else{
            
            $row = mysqli_fetch_assoc($result);
            $pass = $row['password'];

            $rand = substr(md5(microtime()),rand(0,26),5);
            $pass = $pass.$rand;

            $to_mail = $row['email'];
            $subject = "Forgot Password";
            $body = "Enter this: ".$pass." as your current password";
            $headers = "From: ourhostel8@gmail.com";

            if (mail($to_mail, $subject, $body, $headers)){

                echo "Check your email !";
                header("refresh: 5; url=".$s);
            }
            else{
            
                echo "Sorry, there must be some error. Please try again later.";
            }
        }   
?>