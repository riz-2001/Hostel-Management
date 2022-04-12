<?php

include("connection1.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>
<body>

<form action="" method="POST">
    <span>Email:</span>&nbsp;<input type="email" name="email" placeholder="Your email" required>
    <input type="submit" value="Enter" name="submit">
</form>
</body>
</html>

<?php

    if (isset($_POST['submit'])){

        $email = $_POST['email'];

        $query = "select password from user_login where email='$email'";
        $result = mysqli_query($con1, $query);

        if (!$result || mysqli_num_rows($result)==0){

            echo "Incorrect email entered";
        }

        else{
            
            $row = mysqli_fetch_assoc($result);
            $pass = $row['password'];

            $rand = substr(md5(microtime()),rand(0,26),5);
            $pass = $pass.$rand;

            $to_mail = $email;
            $subject = "Forgot Password";
            $body = "Enter this: ".$pass." as your current password";
            $headers = "From: ourhostel8@gmail.com";

            if (mail($to_mail, $subject, $body, $headers)){

                echo "Check your email !";
                header("refresh: 5; url=personal/change_pass.php");
            }
            else{
            
                echo "Sorry, there must be some error. Please try again later.";
            }
        }   
    }
?>