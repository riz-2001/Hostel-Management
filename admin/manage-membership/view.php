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

        $item_id = $_GET['id'];
    ?>

        <div class="main-content" style="background-color:transparent;padding: 3%;">
            <div >
                <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Manage Members&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br>

              
                <br>
                <table style="width:100%;" class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Student Id</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Name</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Position</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Start Date</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">End Date</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    
                    $canteen_id=$_SESSION['canteen_id'];

                    $status = "N";

                    $query1 = "update members set status='$status' where end_date<=CURDATE()";
                    mysqli_query($con2, $query1);

                    $status = "L";

                    $query = "select * from members where item_id='$item_id' and status='$status'";
                    $result = mysqli_query($con2,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $id = $rows['id'];
                                $user_id = $rows['user_id'];
                                $start_date = $rows['start_date'];
                                $end_date = $rows['end_date'];

                                $query3= "select * from user_login where user_id='$user_id'";
                                $result3= mysqli_query($con1,$query3);
                                $arr2=mysqli_fetch_assoc($result3);

                                $name = $arr2['customer_name'];
                                $position = $arr2['position'];

                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $user_id ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $position ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $start_date ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $end_date ?></td>
                                    
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button"><a href="delete.php?id=<?php echo $id?>">Delete</a></button>
                                    </td>

                                </tr>
                                <?php
                                $sn++;
                            }
                        }
                    }
                    ?>
                </table><br>
                <button  class="button" style="float:right;"><a href="add.php?id=<?php echo $item_id; ?>">Add Member</a></button>
            </div>
        </div>
    </body>
</html>
