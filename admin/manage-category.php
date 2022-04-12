
<html>
    <head>
        <title> EatSpectra - Admin Panel</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <style>

a {
        color:black;
        text-decoration:none;
    }
    a:hover
    {
        color:white;
    }
    h1 {text-align: center;}
.button {
       background-color: white; 
color: black; 
border: 2px solid #4CAF50;
padding: 16px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
margin: 4px 2px;
transition-duration: 0.4s;
cursor: pointer;
border-radius:5px;
}


.button:hover {
background-color: #4CAF50;
color: white;
}
</style>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<body  style="background-color: #000000ab;">

    <?php
        include("../connection1.php");
        include('partials/menu.php');
        $username=$_SESSION['admin_username'];

        $query="select canteen from admin_tbl where admin_username='$username'";
        $result=mysqli_query($con1,$query);

        if ($result){

            $arr=mysqli_fetch_assoc($result);
            $canteen_name=$arr['canteen'];

            $query="select canteen_id from info where canteen_name='$canteen_name'";
            $result=mysqli_query($con2,$query);

            if ($result){

                $arr=mysqli_fetch_assoc($result);
                $canteen_id=$arr['canteen_id'];
            }
        }
    ?>

        <div  class="main-content" style="background-color:transparent;padding: 3%;">
        <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Manage Category&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br> <br> <br>

               
                
                <br><br>

                <?php
                if(isset($_SESSION['upload'])){
                    //echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['remove'])){
                    //echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }
                ?> 

                <br><br>
                <table style="width:100%;" class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Name</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;"></th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $query = "select * from food_category where canteen_id='$canteen_id'";
                    $result = mysqli_query($con2,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $id = $rows['category_id'];
                                $category_name = $rows['category_name'];
                                $image_name = $rows['image_name'];
                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $category_name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><img src="../images/category/<?php echo $image_name;?>" alt="<?php echo $image_name ?>" width="100px" height="120px"></td>
                                    
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button"><a href="manage-item.php?id=<?php echo $id;?>">Items</a></button>
                                    <button class="button"><a href="manage-order.php?id=<?php echo $id;?>">Orders</a></button>
                                    <button class="button"><a href="manage-category/update.php?id=<?php echo $id;?>">Update</a></button>
                                    <button class="button"><a href="manage-category/delete.php?id=<?php echo $id;?>&img_name=<?php echo $image_name?>">Delete</a></button>
                                    </td>
                                </tr>
                                <?php
                                $sn++;
                            }
                        }
                    }
                    ?>
                    
                </table>
                
                <button class="button" style="float:right;"><a href="manage-category/add.php">Add Category</a></button>
        </div>
    </body>
</html>
