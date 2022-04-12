<?php
session_start();
include("../../connection1.php");

$item_id = $_GET['id'];
$canteen_id = $_SESSION['canteen_id'];
    
$s = "view.php?id=".$item_id;

if($_SERVER['REQUEST_METHOD']=="POST"){

    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $start_date = $_POST['start_date'];
    
    $query1 = "select customer_name from user_login where user_id='$user_id'";
    $result1 = mysqli_query($con1, $query1);

    if ($result1){
        $row1 = mysqli_fetch_assoc($result1);
    }
    
    if ($result1 && $user_name === $row1['customer_name']){

		$status = "L";

        $query3 = "select * from members where user_id='$user_id' and item_id='$item_id'";
        $result3 = mysqli_query($con2, $query3);
        
        if (mysqli_num_rows($result3) === 0){

            $query = "insert into members (user_id, item_id, hostel_id, start_date, end_date, status) values ('$user_id','$item_id','$canteen_id','$start_date','$start_date','$status')";

            if(!mysqli_query($con2,$query)){
                echo "fail";
                echo mysqli_error($con2);
            }

            $query4 = "select id from members where user_id='$user_id' and item_id='$item_id'";
            $result4 = mysqli_query($con2, $query4);
            $row4 = mysqli_fetch_assoc($result4);

            $id = $row4['id'];

            $query2 = "select YEAR(start_date) as year from members where id='$id'";
            $result2 = mysqli_query($con2, $query2);
            $row2 = mysqli_fetch_assoc($result2);

            $year = $row2['year'];
            $year = $year + 1;

            $query = "update members set end_date = DATE_FORMAT(end_date,'$year-%m-%d')";

            if(!mysqli_query($con2,$query)){
                echo "fail";
                echo mysqli_error($con2);
            }
            else{
                header("Location: ".$s);
                die();
            }
        }
        else{
            echo "This student is already a member";
        }
    }
    else{
        echo "No such student exists";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);		
}

.container {
	display:flex;
	align-items: center;
	justify-content: center;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen {
	display:flex;
	align-items: center;
	justify-content: center;		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 600px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 10px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: 0px;
	right: 0px;
	color: #fff;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #fff;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
	transform: scale(1.5);	
}
        </style>
         <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<body>
<div class="container" >
	<div class="screen"  >
		<div class="screen__content">
			<form action="" method="POST" class="login"  >
			
            <div class="login__field">
                <i class="login__icon fas fa-lock"></i>
					<input type="number" name="user_id" required class="login__input" placeholder=" Student Id">
				</div>

				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="text" name="user_name" required class="login__input" placeholder="Student Name">
				</div>

				
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="date" name="start_date" required class="login__input" placeholder="Start Date">
				</div>

               
				<button class="button login__submit">
                <input style="border:none;" class="button__text" type="submit" value="Submit">
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
</html>
