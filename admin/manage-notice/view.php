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
.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<body   style="background-color: #000000ab;">
    <?php 
        include('../partials/menu.php');
        include('../../connection1.php');

        $category = $_GET['cat'];

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

        <div class="main-content" style="background-color:transparent;padding: 3%;">
            
                <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Notices&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br>

                
                <br>
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
                         color: black;">Description</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">File</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Add Date</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>
                    </tr>
                    </thead>
                    <?php

                    $status = "L";

                    $query = "select * from notices where category_name='$category' and hostel_id='$canteen_id' and status='$status'";
                    $result = mysqli_query($con2,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $id = $rows['id'];
                                $name = $rows['name'];
                                $description = $rows['description'];
                                $add_date = $rows['add_date'];
                                $file_name = $rows['file_name'];

                                $file_path = "../../images/notices/".$file_name;

                                ?>

                                <tr style="background-color:LightGray;">
                                    <td  style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td  style="text-align:center;padding: 10px;color:maroon;"><?php echo $name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $description ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><a href=<?php echo $file_path; ?>>pdf</a></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $add_date ?></td>
                                    
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button"><a href="update.php?id=<?php echo $id?>">Update</a></button>
                                    <button class="button"><a href="remove.php?id=<?php echo $id?>">Remove</a></button>
                                    </td>

                                </tr>
                                <?php
                                $sn++;
                            }
                        }
                    }
                    ?>
                </table>
                
                <button style="float:right" class="button"><a href="add.php?cat=<?php echo $category; ?>">Add Notice</a></button>
        </div>
    </body>
</html>