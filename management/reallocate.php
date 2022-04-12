<html>
    <head>
        <title> EatSpectra - Management Panel</title>
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

            if (!isset($_SESSION['canteen_id'])){
                header("Location: ../admin/partials/login.php");
            }
            /*
            $admin_username=$_SESSION['admin_username'];
            $query="select id from admin_tbl where admin_username='$admin_username'";
            $result=mysqli_query($con1,$query);

            if($result){

                $arr=mysqli_fetch_assoc($result);
                $admin_id=$arr['id'];
            }*/
        ?>
        <div class="main-content" style="background-color:transparent;padding: 3%;">
            <div >
                <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;To ReAllocate&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br>

                <!--<button><a href="manage-admin/add.php">Add Admin</a></button>
                <br>-->
                <table class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr>
                        <th>S.no</th>
                        <th>Student Id</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Hostel</th>
                        <th>Room</th>
                        <th>Preferance Hostel</th>
                        <th>Preferance Room</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Reason</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <?php
                    
                    $newroom_id = 0;

                    $query = "select * from reallocate where newroom_id='$newroom_id' order by date";
                    $result = mysqli_query($con1,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $user_id = $rows['user_id'];
                                $prev_room_id = $rows['prevroom_id'];
                                $pref_room_id = $rows['prefroom_id'];
                                $reason = $rows['reason'];

                                $query1 = "select * from user_login where user_id='$user_id'";
                                $result1 = mysqli_query($con1, $query1);
                                $row1 = mysqli_fetch_assoc($result1);

                                $name = $row1['customer_name'];
                                $prev_hostel_name = $row1['hostel_name'];
                                $contact = $row1['contact'];
                                $email = $row1['email'];
                                $position = $row1['position'];

                                $query1 = "select * from rooms where id='$pref_room_id'";
                                $result1 = mysqli_query($con2, $query1);
                                $row1 = mysqli_fetch_assoc($result1);

                                $pref_room_name = $row1['type'];
                                $pref_hostel_id = $row1['hostel_id'];

                                $query1 = "select type from rooms where id='$prev_room_id'";
                                $result1 = mysqli_query($con2, $query1);
                                $row1 = mysqli_fetch_assoc($result1);

                                $prev_room_name = $row1['type'];

                                $query2 = "select canteen_name from info where canteen_id='$pref_hostel_id'";
                                $result2 = mysqli_query($con2, $query2);
                                $row2 = mysqli_fetch_assoc($result2);

                                $pref_hostel_name = $row2['canteen_name'];

                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td><?php echo $user_id ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $position ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $prev_hostel_name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $prev_room_name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $pref_hostel_name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $pref_room_name ?></td style="text-align:center;padding: 10px;color:maroon;">
                                    <td><?php echo $contact ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $email ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $reason ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button"><a href="allocate/allocate.php?id=<?php echo $user_id ?>">Allocate</a></button>
                                    <button class="button"><a href="allocate/delete.php?id=<?php echo $user_id ?>">Delete</a></button>
                                    </td>
                                </tr>
                                <?php
                                $sn++;
                            }
                        }
                    } 
                    ?>

                       
                </table>
                
            </div>
        </div>
    </body>
</html>