
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

            $canteen_id=$_SESSION['canteen_id'];
            $query="select canteen_name from info where canteen_id='$canteen_id'";
            $result=mysqli_query($con2,$query);

            if($result){

                $arr=mysqli_fetch_assoc($result);
                $canteen_name=$arr['canteen_name'];
            }
        ?>
        <div class="main-content" style="background-color:transparent;padding: 3%;">
         
        <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Manage Admin&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br> <br> <br>

               
                <br>
                <table style="width:100%;" class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Fullname</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Position</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Username</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Contact</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Email</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $query = "select * from admin_tbl where canteen='$canteen_name'";
                    $result = mysqli_query($con1,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $id = $rows['id'];
                                $fullname = $rows['fullname'];
                                $position = $rows['position'];
                                $admin_username = $rows['admin_username'];
                                $contact = $rows['contact'];
                                $email = $rows['email'];
                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $fullname ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $position ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $admin_username ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $contact ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $email ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button" ><a href="manage-admin/update.php?id=<?php echo $id ?>">Update</a></button>
                                    <button class="button" ><a href="manage-admin/delete.php?id=<?php echo $id ?>">Delete</a></button>
                                    <button class="button" ><a href="manage-admin/change-pass.php?id=<?php echo $id ?>">Change Password</a></button>
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
                <button class="button" style="float:right;"><a href="manage-admin/add.php">Add Admin</a></button>
        </div>
    </body>
</html>