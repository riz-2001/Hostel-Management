<?php
include('partials/menu.php');
    include("../connection1.php");
    
    

    //$admin_data=check_login($con1);

    if (!isset($_SESSION['canteen_id'])){
        echo $_SESSION['canteen_id'];
        header("Location: ../admin/partials/login.php");
        exit();
    }
    else{

        $canteen_name="Management";

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
        
                <div style="padding:50px;">
        
                    <?php
                        /*echo $_SESSION['canteen_name'];*/
                        /*$query="select canteen_img from info where canteen_name='$canteen_name'";
                        $result=mysqli_query($con2,$query);
                        $arr=mysqli_fetch_assoc($result);
                        $canteen_img=$arr['canteen_img'];*/
        
                        $query1 = "select COUNT(id) as count_id from admin_tbl where canteen='$canteen_name'";
                        $result1 = mysqli_query($con1,$query1);
                        $arr1=mysqli_fetch_assoc($result1);
                        $employee_no = $arr1['count_id'];
        
                        $hostel_id = 0;
                        $query2 = "select COUNT(user_id) as count_userid from user_login where hostel_id='$hostel_id'";
                        $result2 = mysqli_query($con1,$query2);
                        $arr2=mysqli_fetch_assoc($result2);
                        $allocate_no = $arr2['count_userid'];
        
                        $query3 = "select COUNT(id) as count_Reid from reallocate";
                        $result3 = mysqli_query($con1,$query3);
                        $arr3=mysqli_fetch_assoc($result3);
                        $reallocate_no = $arr3['count_Reid'];
                    ?>
                    <h1 style="font-size:40px;text-align-center;padding-top:60px;color:#ffa500"><i class="fas fa-hotel"></i>&nbsp;&nbsp; <?php echo $canteen_name; ?>&nbsp;&nbsp;<i class="fas fa-hotel"></i></h1> 
                    <br><br>
                <!--    <div>
                        <img type="img" src="../images/canteen/<?php echo $canteen_img;?>" alt="<?php echo $canteen_img;?>" width="40%">
                    </div>
                    <br><br> -->
    </div>
                    <div style="padding:50px;">
                        <div  style="width: 15%;display:inline-block;
    background-color: white;color:#228B22;font-size: large;
    margin: 5%;
    padding: 4%;
    float: left;
    height: 15%;
    text-align: center; background-image: linear-gradient(to left, rgba(225,165,0,0.5), rgba(225,165,0,1));
    border-radius:10px;">
                            <h1 style="margin:11px auto;"><?php echo $employee_no; ?></h1>
                            <br>
                            Employees
                        </div>
                        <div style="width: 15%;display:inline-block;
    background-color: white;color:#228B22;font-size: large;
    margin: 5%;
    padding: 4%;
    
    height: 15%;
    text-align: center; background-image: linear-gradient(to left, rgba(225,165,0,0.5), rgba(225,165,0,1));
    border-radius:10px;">
                            <h1 style="margin:11px auto;"><?php echo $allocate_no; ?></h1>
                            <br>
                            To Allocate
                        </div>
                        <div style="width: 15%;display:inline-block;
    background-color: white;color:#228B22;font-size: large;
    margin: 5%;
    padding: 4%;
    float: right;
    height: 15%;
    text-align: center; background-image: linear-gradient(to left, rgba(225,165,0,0.5), rgba(225,165,0,1));
    border-radius:10px;">
                            <h1 style="margin:11px auto;"><?php echo $reallocate_no; ?></h1>
                            <br>
                            To ReAllocate
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                </div>
            </body>
        </html> 
        <?php       
    }
?>  
    

    

<!--
<html>
    <head>
        <title> EatSpectra - Admin Panel</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>

        <div class="main-content">-->

            <?php
                /*echo $_SESSION['canteen_name'];*/
                /*$query="select canteen_img from info where canteen_name='$canteen_name'";
                $result=mysqli_query($con2,$query);
                $arr=mysqli_fetch_assoc($result);
                $canteen_img=$arr['canteen_img'];*//*

                $query1 = "select COUNT(id) as count_id from admin_tbl where canteen='$canteen_name'";
                $result1 = mysqli_query($con1,$query1);
                $arr1=mysqli_fetch_assoc($result1);
                $employee_no = $arr1['count_id'];

                $hostel_id = 0;
                $query2 = "select COUNT(user_id) as count_userid from user_login where hostel_id='$hostel_id'";
                $result2 = mysqli_query($con1,$query2);
                $arr2=mysqli_fetch_assoc($result2);
                $allocate_no = $arr2['count_userid'];

                $query3 = "select COUNT(id) as count_Reid from reallocate";
                $result3 = mysqli_query($con1,$query3);
                $arr3=mysqli_fetch_assoc($result3);
                $reallocate_no = $arr3['count_Reid'];*/
            ?><!--
            <h1> <?php// echo $canteen_name; ?> </h1>
            <br><br>-->
        <!--    <div>
                <img type="img" src="../images/canteen/<?php// echo $canteen_img;?>" alt="<?php //echo $canteen_img;?>" width="40%">
            </div>
            <br><br> --><!--
            <div class="wrapper">
                <div class="col-4">
                    <h1><?php// echo $employee_no; ?></h1>
                    <br>
                    Employees
                </div>
                <div class="col-4">
                    <h1><?php// echo $allocate_no; ?></h1>
                    <br>
                    To Allocate
                </div>
                <div class="col-4 ">
                    <h1><?php// echo $reallocate_no; ?></h1>
                    <br>
                    To ReAllocate
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </body>
</html>-->