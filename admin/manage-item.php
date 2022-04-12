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
        include('partials/menu.php');
        include('../connection1.php');

        pre_r($_GET);
        $id = $_GET['id'];
    ?>

        <div class="main-content" style="background-color:transparent;padding: 3%;">
            
        <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Manage Item&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br> <br> <br> <br>

               
                <br>
                <table style="width:100%;" class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr>
                    <tr>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Name</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Description</th>
                        <!-- <th>Category</th> -->
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;"> </th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Price</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Availability</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    
                    $canteen_id=$_SESSION['canteen_id'];
                    $query = "select * from food where canteen_id='$canteen_id' and category_id = '$id'";
                    $result = mysqli_query($con2,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $food_id = $rows['food_id'];
                                $image_name = $rows['image_name'];
                                $food_name = $rows['food_name'];
                                $price = $rows['price'];
                                $availability = $rows['availability'];
                                $description = $rows['description'];

                                $query3= "select category_name from food_category where category_id='$id'";
                                $result3= mysqli_query($con2,$query3);
                                $arr2=mysqli_fetch_assoc($result3);
                                $category_name=$arr2['category_name'];
                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $food_name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $description ?></td>
                                    <!-- <td><?php echo $category_name ?></td> -->
                                    
                                    <td style="text-align:center;padding: 10px;color:maroon;"><img src="../images/food/<?php echo $image_name;?>" alt="<?php echo $image_name ?>" width="100px" height="100px"></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $price ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"> <button class="button"><a href="manage-item/minus.php?id=<?php echo $food_id;?>">-</a></button>&nbsp;&nbsp;<?php echo $availability ?>&nbsp;&nbsp;<button class="button"><a href="manage-item/plus.php?id=<?php echo $food_id?>">+</a></button></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button"><a href="manage-item/update.php?id=<?php echo $food_id?>">Update</a></button>
                                    <button class="button"><a href="manage-item/delete.php?id=<?php echo $food_id?>&img_name=<?php echo $image_name?>">Delete</a></button>
                                    </td>
                                </tr>
                                <?php
                                $sn++;
                            }
                        }
                    }
                    ?>
                </table>
                <br><br><br>
                <button class="button" style="float:right;"><a href="manage-item/add.php?id=<?php echo $id; ?>">Add Item</a></button>
        </div>
    </body>
</html>

<?php

function pre_r($array){

   
   
  
}
?>