<?php
    include("../connection1.php");
    include('partials/menu.php');
    

    //$admin_data=check_login($con1);
    $canteen_id=$_SESSION['canteen_id'];

    $query="select canteen_name from info where canteen_id='$canteen_id'";
    $result=mysqli_query($con2,$query);
    $arr=mysqli_fetch_assoc($result);
    $canteen_name=$arr['canteen_name'];

    
?>

<html>
    <head>
        <title> EatSpectra - Admin Panel</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <style>
        h1{
            text-align:center;
        }
        </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <body  style="background-color: #000000ab;">

     <div>
<div style="float:left;display:inline-block;width:70%;">
            <?php
                /*echo $_SESSION['canteen_name'];*/
                $query="select canteen_img from info where canteen_name='$canteen_name'";
                $result=mysqli_query($con2,$query);
                $arr=mysqli_fetch_assoc($result);
                $canteen_img=$arr['canteen_img'];

                $query1 = "select COUNT(id) as count_id from admin_tbl where canteen='$canteen_name'";
                $result1 = mysqli_query($con1,$query1);
                $arr1=mysqli_fetch_assoc($result1);
                $employee_no = $arr1['count_id'];

                $query2 = "select COUNT(user_id) as count_userid from user_login where hostel_name='$canteen_name'";
                $result2 = mysqli_query($con1,$query2);
                $arr2=mysqli_fetch_assoc($result2);
                $student_no = $arr2['count_userid'];

                $query3 = "select COUNT(category_id) as count_categoryid from food_category where canteen_id='$canteen_id'";
                $result3 = mysqli_query($con2,$query3);
                $arr3=mysqli_fetch_assoc($result3);
                $category_no = $arr3['count_categoryid'];
            ?>
            <h1 style="font-size:40px;text-align-center;padding-top:60px;color:#ffa500"><i class="fas fa-hotel"></i>&nbsp;&nbsp;<?php echo $canteen_name; ?>&nbsp;&nbsp;<i class="fas fa-hotel"></i></h1> 
            
            <div>
                <img style="width: 816px;
    height: 417px;
    padding: 121px;
    border-radius: 79px;
    margin: 0px auto;" type="img" src="../images/canteen/<?php echo $canteen_img;?>" alt="<?php echo $canteen_img;?>" width="40%">
            </div>
</div>
            <br><br>
            <div  style="float:right;display:inline-block;width:30%;">
                <div style="width: 45%;
    background-color: white;color:#228B22;font-size: large;
    margin: 8%;
    padding: 5%;
    float: right;
    height: 15%;
    text-align: center;
    background-image: linear-gradient(to left, rgba(225,165,0,0.5), rgba(225,165,0,1));
    border-radius:10px;">
                    <h1 style="margin:11px auto;"><?php echo $employee_no; ?></h1>
                    <br>
                    Employees
                </div><br>
                <div style="width: 45%;
    background-color: white;color:#228B22;font-size: large;
    margin: 8%;
    padding: 5%;
    float: right;
    height: 15%;
    text-align: center; background-image: linear-gradient(to left, rgba(225,165,0,0.5), rgba(225,165,0,1));
    border-radius:10px;">
                    <h1 style="margin:11px auto;"><?php echo $student_no; ?></h1>
                    <br>
                    Students
                </div><br>
                <div style="width: 45%;
    background-color: white;color:#228B22;font-size: large;
    margin: 8%;
    padding: 5%;
    float: right;
    height: 15%;
    text-align: center; background-image: linear-gradient(to left, rgba(225,165,0,0.5), rgba(225,165,0,1));
    border-radius:10px;">
                    <h1 style="margin:11px auto;"><?php echo $category_no; ?></h1>
                    <br>
                    Categories
                </div>
                
                
            </div>
        </div>
    </body>
</html>