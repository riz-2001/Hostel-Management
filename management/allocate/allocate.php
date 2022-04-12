<?php

session_start();

    include("../../connection1.php");

    $user_id = $_GET['id'];
    $canteen_name = "Management";

    $query1 = "select * from info where canteen_name !='$canteen_name'";
    $result1 = mysqli_query($con2, $query1);

    $query = "select room_id from user_login where user_id='$user_id'";
    $result = mysqli_query($con1, $query);
    $row = mysqli_fetch_assoc($result);

    $prev_roomid = $row['room_id'];

    ?>


<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<style>
    #hostel{
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
border-radius:5px;}

#room{
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
    <body style="background: linear-gradient(90deg, #C7C5F4, #776BCC);	">
<h1 style="margin: 5% 40%;font-size:35px;padding:10px 10px;"> Allocation Portal</h1>
        <div class="services">
            
            <div  style="margin: 5% 40%;" class="box-container">
                <!--<div class="box">-->
                <!--<span class="number">01</span>-->
                <!--<i class="fas fa-bicycle"></i>-->
                <!--<h3>Do you really want to be a management member for any upcoming event of the year?</h3>
                <p>Event coordinators are responsible for organizing and managing every aspect of an event. Their duties include conceptualizing theme ideas, planning budgets, booking venues, liaising with suppliers and clients, managing logistics, and presenting post-event reports.</p>-->

                <form action="" method="POST">
                    <div style="padding:10px 10px;">
                    <label style="text-align:center;padding: 50px;color:maroon;font-size:25px;" for="hostel">Choose Hostel:</label>
                    <select style="padding:10px 75px;" id="hostel" name="hostel">
                    <?php
                    while ($row1 = mysqli_fetch_assoc($result1)){

                        $hostel_id = $row1['canteen_id'];
                        $hostel_name = $row1['canteen_name'];

                        $query2 = "select COUNT(availability) as availability from rooms where hostel_id='$hostel_id'";
                        $result2 = mysqli_query($con2, $query2);
                        $row2 = mysqli_fetch_assoc($result2);

                        $availability_sum = $row2['availability']; 

                        if ($availability_sum > 0){

                            ?>
                            <option value="<?php echo $hostel_name; ?>"><?php echo $hostel_name; ?></option>
                            <?php
                        }  
                    }
                    ?>
                    </select>
                    <br>
                    <div style="padding:10px 69px;">
                    <input  class="button" type="submit" value="Enter" name="submit1">
                    <br>
                </div>
                </div>
                
                    <?php

                    if (isset($_POST['submit1'])){

                        $hostel_name = $_POST['hostel'];

                        $query3 = "select canteen_id from info where canteen_name='$hostel_name'";
                        $result3 = mysqli_query($con2, $query3);
                        $row3 = mysqli_fetch_assoc($result3);

                        $hostel_id = $row3['canteen_id'];

                        $query4 = "select * from rooms where hostel_id='$hostel_id'";
                        $result4 = mysqli_query($con2, $query4);

                        ?>
<div style="padding:10px 10px;">
                        <label style="text-align:center;padding: 50px;color:maroon;font-size:25px;" for="room">Choose Room:</label>
                        <select style="padding:10px 63px;" id="room" name="room">
                        <?php

                        while ($row4 = mysqli_fetch_assoc($result4)){

                            $room_id = $row4['id'];
                            $room_name = $row4['type'];
                            $availability = $row4['availability'];

                            if ($availability > 0){

                                ?>
                                <option  value="<?php echo $room_id; ?>"><?php echo $room_name; ?></option>
                                <?php
                            }
                        }

                        ?>

                        </select><br>
                        <div style="padding:10px 62px;">
                        <input class="button" type="submit" value="Submit" name="submit2"></div>
                        <?php
                    }
                    ?>
</div>
                </form>
                <!--</div>-->
            </div>
        </div>
    </body>

    </html>

<?php

if(isset($_POST['submit2'])){

    $room_id = $_POST['room'];

    $query5 = "select * from rooms where id='$room_id'";
    $result5 = mysqli_query($con2, $query5);
    $row5 = mysqli_fetch_assoc($result5);

    $hostel_id = $row5['hostel_id'];
    $availability = $row5['availability'];

    $availability = $availability - 1;

    if ($prev_roomid != 0){

        $query9 = "select availability from rooms where id='$prev_roomid'";
        $result9 = mysqli_query($con2, $query9);
        $row9 = mysqli_fetch_assoc($result9);

        $prev_availability = $row9['availability'];

        $prev_availability = $prev_availability + 1;

        $query10 = "update rooms set availability = '$prev_availability' where id='$prev_roomid'";
        mysqli_query($con2, $query10);

        $val = 0;

        $query11 = "update reallocate set newroom_id = '$room_id' where user_id='$user_id' and newroom_id='$val'";
        mysqli_query($con1, $query11);
    }

    $query6 = "select canteen_name from info where canteen_id='$hostel_id'";
    $result6 = mysqli_query($con2, $query6);
    $row6 = mysqli_fetch_assoc($result6);

    $hostel_name = $row6['canteen_name'];
    
    $query7="update user_login set
    hostel_id = '$hostel_id',
    room_id = '$room_id',
    hostel_name = '$hostel_name'
    where user_id = '$user_id'";

    mysqli_query($con1,$query7);
    
    $query8 = "update rooms set availability = '$availability' where id='$room_id'";

    mysqli_query($con2, $query8);
        
    header("Location: ../allocate.php");
    die;
    
}

?>