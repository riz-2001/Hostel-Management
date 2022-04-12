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
                <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;To Allocate&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br>

                <!--<button><a href="manage-admin/add.php">Add Admin</a></button>
                <br>-->
                <table class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Student Id</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Name</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Position</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Contact</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Email</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">DOB</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Blood Grp</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    $hostel_id = 0;
                    $query = "select * from user_login where hostel_id='$hostel_id' order by add_date";
                    $result = mysqli_query($con1,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $user_id = $rows['user_id'];
                                $name = $rows['customer_name'];
                                $position = $rows['position'];
                                $contact = $rows['contact'];
                                $email = $rows['email'];
                                $dob = $rows['birthdate'];
                                $blood = $rows['blood_grp'];
                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $user_id ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $name ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $position ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $contact ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $email ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $dob ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $blood ?></td>
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