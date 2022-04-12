<html>
    <head>
        <title> EatSpectra - Admin Panel</title>
        <link rel="stylesheet" href="../admin.css">
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
        include('../partials/menu.php');
        include('../../connection1.php');
        $id = $_GET["id"];
    ?>

<div  class="main-content" style="background-color:transparent;padding: 3%;" >
            
            <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Manage Payments&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br>
                <br>
                <table style="width:100%;" class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Type</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Description</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Category</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Item</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Amount </th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Date</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Due</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Status</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    
                    $canteen_id=$_SESSION['canteen_id'];
                    $query = "select * from payments where canteen_id='$canteen_id' and user_id = '$id'";
                    $result = mysqli_query($con1,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $payment_id = $rows['id'];
                                $type = $rows['name'];
                                $description = $rows['description'];
                                $category_id = $rows['category_id'];
                                $amount = $rows['amount'];
                                $item_id = $rows['item_id'];
                                $status = $rows['status'];
                                $creation_date = $rows['creation_date'];
                                $due_date = $rows['due_date'];

                                $query3= "select category_name from food_category where category_id='$category_id'";
                                $result3= mysqli_query($con2,$query3);
                                $arr2=mysqli_fetch_assoc($result3);
                                $category_name=$arr2['category_name'];

                                $query4= "select food_name from food where food_id='$item_id'";
                                $result4= mysqli_query($con2,$query4);
                                $arr3=mysqli_fetch_assoc($result4);
                                $item_name=$arr3['food_name'];
                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $type ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $description ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $category_name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $item_name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $amount ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $creation_date ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $due_date ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $status ?>-<button  class="button" ><a href="../manage-payments/status_update.php?id=<?php echo $payment_id;?>">Change</a></button></td>
                                    
                                    <!--<td><img src="../images/food/<?php echo $image_name;?>" alt="<?php echo $image_name ?>" width="100px" height="100px"></td>
                                    <td><?php echo $price ?></td>-->
                                    <td>
                                    <button  class="button" ><a href="../manage-payments/update.php?id=<?php echo $payment_id?>">Update</a></button>
                                    <!--<button><a href="manage-payments/delete.php?id=<?php// echo $food_id?>&img_name=<?php// echo $image_name?>">Delete</a></button>-->
                                    </td>
                                </tr>
                                <?php
                                $sn++;
                            }
                        }
                    }
                    ?>
                </table>
                
                <br> <br> <br>
    

    <button class="button" style="float:right;"><a href="../manage-payments/add.php?id=<?php echo $id;?>">Add</a></button>
        </div>
    </body>
</html>