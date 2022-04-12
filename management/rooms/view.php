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
<body style="background-color: #000000ab;">
    <?php 
        include('../partials/menu.php');
        include('../../connection1.php');

        $hostel_id = $_GET['id'];
    ?>

        <div class="main-content" style="background-color:transparent;padding: 3%;">
            <div >
                <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Manage Rooms&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br>

                
                <br>
                <table class="tbl-full">
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
                         color: black;">Price Per Month</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Availability</th>
                        <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>
                    </tr>
                    </thead>
                    <?php
                    
                    $query = "select * from rooms where hostel_id='$hostel_id'";
                    $result = mysqli_query($con2,$query);

                    if ($result){

                        $count = mysqli_num_rows($result);
                        if ($count>0){

                            $sn = 1;
                            while($rows = mysqli_fetch_assoc($result)){

                                $room_id = $rows['id'];
                                $type = $rows['type'];
                                $availability = $rows['availability'];
                                $description = $rows['description'];
                                $price = $rows['price_pm']

                                ?>

                                <tr style="background-color:LightGray;">
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $sn ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $type ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $description ?></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $price ?></td>
                                    
                                    <td style="text-align:center;padding: 10px;color:maroon;"> <button class="button"><a href="minus.php?id=<?php echo $room_id;?>">-</a></button>&nbsp;&nbsp;<?php echo $availability ?>&nbsp;&nbsp;<button class="button"><a href="plus.php?id=<?php echo $room_id?>">+</a></button></td>
                                    <td style="text-align:center;padding: 10px;color:maroon;">
                                    <button class="button"><a href="update.php?id=<?php echo $room_id?>">Update</a></button>
                                    <button class="button"><a href="delete.php?id=<?php echo $room_id?>">Delete</a></button>
                                    </td>
                                </tr>
                                <?php
                                $sn++;
                            }
                        }
                    }
                    ?>
                </table><br><br>
                <button class="button" style="float:right;"><a href="add.php?id=<?php echo $hostel_id; ?>">Add</a></button>
            </div>
        </div>
    </body>
</html>

<?php