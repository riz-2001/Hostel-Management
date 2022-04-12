<?php
session_start();
    include("connection1.php");
    //include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $username_email = $_POST['username_email'];
        $password = md5($_POST['password']);
        
        
        $query = "select * from user_login where username='$username_email' or email='$username_email' limit 1";
        $result = mysqli_query($con1,$query); 
            
        if($result && mysqli_num_rows($result)>0){
            $userdata = mysqli_fetch_assoc($result);
             
            if ($userdata['password']==$password){
                $_SESSION['user_id']=$userdata['user_id'];
                header("Location: index.php");
                die();
            }
            else{
                //echo $password."     ";
                //echo $userdata['password']."     ";
                //echo $_POST['password'];
                echo "Incorrect username or password";
            }
               
        }
        else{
            echo "Incorrect username or password";
            //echo "/n";
            //echo mysqli_error($con1);
            //echo "/n";
            //echo mysqli_num_rows($result);
        }
    }
?>

<?php

function pre_r($array){

    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <div>
        <form action="" method="post">
        <div> Name: </div> <input type="text" name="customer_name" required>
        
        <div> UserName/Email: </div> <input type="text" name="username_email" required>
        
        <div> Password: </div> <input type="password" name="password" required>
        <br><br>
        <input type="submit" value="Login">
        </form>
        <br>
        <a href="signup.php"> Don't have an account? Sign Up</a>
    </div>
</body>
</html> -->