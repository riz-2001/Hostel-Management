<?php
session_start();
    include("connection1.php");
    

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $customer_name = $_POST['customer_name'];
        $username = $_POST['username'];
        $position = $_POST['position'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $blood = $_POST['blood'];
        $password = md5($_POST['password']);
        
        if(!is_numeric($username)){
            $query = "select * from user_login where username='$username'";
            $result = mysqli_query($con1,$query); 
            
            if(mysqli_num_rows($result)==0){
                $query="insert into user_login (customer_name,username,contact,email,birthdate,blood_grp,password,position) values ('$customer_name','$username','$contact','$email','$birthdate','$blood','$password','$position')";
                mysqli_query($con1,$query); 
                
            
                header("Location: index.php");
                die;
            }
            else{
                echo "This username already exists";
            }
        }
        else{
            echo "Please enter a valid username";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div>
    <div class="up-head">
        <h3>SignUp/Register<h3>
    </div>
        <form action="" method="POST">
        <div class="input-container"> Name: </div> <input type="text" name="customer_name" required>
        <div class="input-container"> UserName: </div> <input type="text" name="username" required>
        <div class="input-container"> Position: </div> <input type="text" name="position" required>
        <div class="input-container"> Contact Number: </div> <input type="number" name="contact" required>
        <div class="input-container"> Email: </div> <input type="email" name="email" required>
        <div class="input-container"> DOB: </div> <input type="date" name="birthdate">
        <div class="input-container"> Blood Group: </div> <input type="text" name="blood" required>
        <div class="input-container"> Password: </div> <input type="password" name="password" required>
        <br><br>
        <div class="btn">
        <input type="submit" value="Submit">
        </div>
        </form>
        <br>
        <a href="index.php"> Already have an account? Log In</a>
    </div>
</body>
</html>

