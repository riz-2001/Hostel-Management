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
<body   style="background-color: #000000ab;">
    <?php 
        include("../connection1.php");
        include('partials/menu.php');
        $status="L";
        $category_id = $_GET['id'];
    ?>

<div class="main-content" style="background-color:transparent;padding: 3%;">
            
            <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Manage Order&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br> <br> <br> <br>

               
                <br>
                <table class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr >
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">S.no</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">Customer Name</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">Contact</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">Email</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">DOB</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">Item</th>
                        <!-- <th class="text-center">Category</th> -->
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;"class="text-center">Quantity</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">Total Cost</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">Status</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" class="text-center">Actions</th>
                    </tr>
</thead>
                    <?php
                
                    $query = "select * from orders where canteen_id='$canteen_id' and status='$status' and category_id='$category_id'";
                    $result = mysqli_query($con1,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $order_id=$rows['order_id'];
                                $user_id = $rows['user_id'];
                                $food_id = $rows['food_id'];
                                $quantity = $rows['quantity'];
                                $total_amount = $rows['total_amount'];

                                $query1="select * from user_login where user_id='$user_id'";
                                $result1=mysqli_query($con1,$query1);

                                if ($result1){

                                    $row1=mysqli_fetch_assoc($result1);

                                    $customer_name=$row1['customer_name'];
                                    $contact=$row1['contact'];
                                    $email=$row1['email'];
                                    $dob=$row1['birthdate'];

                                }

                                $query2 ="select * from food where food_id='$food_id'";
                                $result2=mysqli_query($con2,$query2);

                                if ($result2){

                                    $row2=mysqli_fetch_assoc($result2);

                                    $food_name=$row2['food_name'];
                                    //$category_id=$row2['category_id'];

                                }

                                //$query3 ="select * from food_category where category_id='$category_id'";
                                //$result3=mysqli_query($con2,$query3);

                                /*if ($result3){

                                    $row3=mysqli_fetch_assoc($result3);

                                    $category_name=$row3['category_name'];

                                }*/
                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn; ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $customer_name; ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $contact; ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $email; ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $dob; ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $food_name; ?></td>
                                    <!-- <td><?//php echo $category_name; ?></td> -->
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $quantity; ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;">&#8377;&nbsp;<?php echo $total_amount; ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><button class="button"><a href="manage-order/status.php?id=<?php echo $order_id?>">Delivered</a></button></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button"><a href="manage-order/update.php?id=<?php echo $order_id?>">Update</a></button>
                                    <button class="button"><a href="manage-order/delete.php?id=<?php echo $order_id?>">Delete</a></button>
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

<button  class="button" style="float:right;"><a href="manage-order/add.php?id=<?php echo $category_id;?>">Add Order</a></button>
        </div>
    </body>
</html>