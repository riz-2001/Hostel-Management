<?php

    include("../../connection1.php");

    pre_r($_GET);

    $id = $_GET['id'];
    $query1 = "select * from food where food_id='$id'";
    $result1 = mysqli_query($con2,$query1);
    $row = mysqli_fetch_assoc($result1);

    $image_name=$row['image_name'];

    $path="../../images/food/".$image_name;

    $category_id = $row['category_id'];

    $query2="select category_name from food_category where category_id='$category_id'";
    $result2=mysqli_query($con2,$query2);
    $arr=mysqli_fetch_assoc($result2);
    $category_name=$arr['category_name'];

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $food_name=$_POST['food_name'];
        $category_name = $_POST['category_name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image_name1 = $_POST['image_name1'];
        
       
        if (isset($_FILES['image']['name'])){

            $image_name=$_FILES['image']['name'];
            $ext= end(explode(".",$image_name));
            $image_name=reset(explode(".",$image_name1)).".".$ext;
            
            $query1="select category_id from food_category where category_name='$category_name'";
            
            if(!$result1=mysqli_query($con2,$query1) or mysqli_num_rows($result1)==0){
                echo "No such category available";
            }

            else{
                $arr = mysqli_fetch_assoc($result1);
                $category_id= $arr['category_id'];
                $query="select * from food where image_name='$image_name' and food_id!=$id";
                $result=mysqli_query($con2,$query);
            

                if($result==false or mysqli_num_rows($result)==0){
                    $source_path=$_FILES['image']['tmp_name'];
                    $destination_path="../../images/food/".$image_name;

                    $remove=unlink($path);

                    if ($remove==false){
                        $_SESSION['remove'] = "<div> Error: Failed to Update</div>";
                        echo $_SESSION['remove'];
                        //header("Location: ../manage-item.php");
                        //die();
                    }

                    $upload=move_uploaded_file($source_path,$destination_path);
                    
                    if ($upload==false){
                        
                        $_SESSION['upload']="<div clas='error'> Failed to upload Image </div>";
                        echo $_SESSION['remove'];
                        //header("Location:../manage-item.php");
                        //die();
                    }
                    else{
                        
                        $query2 = "update food set
                        food_name='$food_name',
                        category_id='$category_id',
                        price='$price',
                        image_name='$image_name',
                        description='$description'
                        where food_id=$id ";

                        if(!mysqli_query($con2,$query2)){
                            echo "fail";
                            echo mysqli_error($con2);
                        } 
                        else{
                            $s = "../manage-item.php?id=".$category_id;
                            header("Location: ".$s);
                            die();
                        }
                    }
                }
                else{
                    echo "This Image Name already exists";
                }    
            }    
        
        }        
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
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
	height: 750px;
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<div class="container" >
	<div class="screen"  >
		<div class="screen__content">
			<form action="" method="POST" class="login"   enctype="multipart/form-data">
            <div class="login__field">
                
					<input   type="hidden" name="category_id" value= <?php echo $id; ?> required class="login__input" >
				</div>

            <div class="login__field">
                <i class="login__icon fas fa-lock"></i>
					<input type="text" name="food_name" value= <?php echo $row['food_name']; ?> required class="login__input" >
				</div>

                <div class="login__field">
                <i class="login__icon fas fa-lock"></i>
					<input  type="text" name="category_name" value= <?php echo $category_name; ?> required class="login__input" >
				</div>

				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="number" name="price" value= <?php echo $row['price']; ?> required class="login__input" >
				</div>

				
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<textarea type="text" rows="5" cols="40" name="description" value= <?php echo $row['description']; ?> required  class="login__input"></textarea>
				</div>

                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="file" name="image" value="../../images/food/<?php echo $row['image_name']; ?>"   required class="login__input" >
				</div>

                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input input type="text" name="image_name1" value= <?php echo $row['image_name']; ?> required class="login__input">
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
<?php
function pre_r($array){


}

?>