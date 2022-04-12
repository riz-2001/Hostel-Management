<?php

session_start();

    include("../connection1.php");

    $user_id = $_SESSION['user_id'];
    $query1 = "select * from user_login where user_id='$user_id'";
    $result1 = mysqli_query($con1,$query1);
    $row = mysqli_fetch_assoc($result1);

    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $username = $_POST['username'];
        $dob = $_POST['dob'];
        $blood = $_POST['blood'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
       
        
        $query2 = "select * from user_login where username='$username' and user_id !='$user_id'";
        $result2 = mysqli_query($con1,$query2);

        if ((mysqli_num_rows($result2))===0){

            $query = "update user_login set 
            username = '$username' ,
            birthdate = '$dob' ,
            blood_grp = '$blood' ,
            contact = '$contact' ,
            email = '$email' 
            where user_id='$user_id'";

            mysqli_query($con1,$query); 
                
            header("Location: info.php");
            die;
                
            
        }
        else{
            echo "This username already exists";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div>
    <div class="up-head">
        <h3>Change Info<h3>
    </div>
        <form action="" method="POST">
        
        <div class="input-container"> Username: </div> <input type="text" name="username" value= <?php echo $row['username']; ?> required>
        <div class="input-container"> Date of Birth: </div> <input type="date" name="dob" value= <?php echo $row['birthdate']; ?> required>
        <div class="input-container"> Blood Grp: </div> <input type="text" name="blood" value= <?php echo $row['blood_grp']; ?> required>
        <div class="input-container"> Contact No: </div> <input type="number" name="contact" value= <?php echo $row['contact']; ?> required>
        <div class="input-container"> Email: </div> <input type="email" name="email" value= <?php echo $row['email']; ?> required>
        
        <br><br>
        <div class="btn">
        <input type="submit" value="Submit">
        </div>
       
        </form>
        
    </div>
</body>
</html>