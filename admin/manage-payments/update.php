<?php

    include("../../connection1.php");

    $payment_id = $_GET['id'];
    $query1 = "select * from payments where id='$payment_id'";
    $result1 = mysqli_query($con1,$query1);
    $row = mysqli_fetch_assoc($result1);

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $type = $_POST['type'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        $due_date = $_POST['due_date'];

        $user_id = $row['user_id'];
       
        $query = "update payments set 
        name = '$type' ,
        description = '$description' ,
        amount = '$amount' ,
        due_date = '$due_date' 
        where id='$payment_id'";

        mysqli_query($con1,$query); 
        
        $s = "../manage-student/payment.php?id=".$user_id;
        header("Location: ".$s);
        die;      
    }
?>

<!DOCTYPE html>
<html lang="en">

         <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
	<link rel="stylesheet" href="payment.css">
</head>
<body>
<div class="container" >
	<div class="screen"  >
		<div class="screen__content">
			<form action="" method="POST" class="login"  >
			
            <div class="login__field">
                <i class="login__icon fas fa-lock"></i>
					<input type="text" name="type" value= <?php echo $row['name']; ?> required class="login__input" placeholder="Type">
				</div>

				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="text" name="description" value= <?php echo $row['description']; ?> required class="login__input" placeholder="Description">
				</div>

				
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="number" name="amount" value= <?php echo $row['amount']; ?> required class="login__input" placeholder="Category">
				</div>

                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="date" name="due_date" value= <?php echo $row['due_date']; ?> required class="login__input" placeholder="Due Date">
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
