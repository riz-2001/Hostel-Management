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
    ?>

        <div class="main-content" style="background-color:transparent;padding: 3%;">
            <div>
                <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Rooms&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br>

                <!--<button><a href="manage-category/add.php">Add Category</a></button>
                
                <br><br>-->

                <br><br>
                <table class="tbl-full">
                <thead style="background-color:DodgerBlue">
                    <tr>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Hostel</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;"></th>
                    </tr>
                    <?php

                    $val = "Management";
                    $query="select * from info where canteen_name!='$val'";
                    $result=mysqli_query($con2,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){
                                
                                $hostel_name = $rows['canteen_name'];
                                $hostel_id = $rows['canteen_id'];
                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $hostel_name ?></td>
                                    
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button"><a href="rooms/view.php?id=<?php echo $hostel_id;?>">View</a></button>
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