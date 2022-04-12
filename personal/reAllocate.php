<?php

session_start();

    include("../connection1.php");

    $user_id = $_SESSION['user_id'];

    $query1 = "select room_id from user_login where user_id='$user_id'";
    $result1 = mysqli_query($con1, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $prev_room_id = $row1['room_id'];

    $m = "Management";

    $query = "select * from info where canteen_name!='$m'";
    $result = mysqli_query($con2, $query);


    ?>


<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="relo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="services">
            <h3 class="title">Hostel ReAllocation</h3>
            <div class="box-container">
              
  
                <form action="" method="POST">

                    <div class="input-container">Reason & Reamrk :</div><textarea type="text" rows="10" cols="40" name="reason" placeholder="Reason must be mentioned"></textarea><br>

                    <label for="hostel">Choose preferable hostel:</label>
                    <select id="hostel" name="hostel">
                    <?php

                    while ($row = mysqli_fetch_assoc($result)){

                        $hostel_id = $row['canteen_id'];
                        $hostel_name = $row['canteen_name'];

                        ?>
                        <option value="<?php echo $hostel_id; ?>"><?php echo $hostel_name; ?></option>
                        <?php
                         
                    }
                    ?>
                    </select>
                    <input type="submit" value="Enter" name="submit1">
                    <br>

                    <?php

                    if (isset($_POST['submit1'])){

                        $hostel_id = $_POST['hostel'];
                        $reason = $_POST['reason'];

                        $query4 = "select * from rooms where hostel_id='$hostel_id'";
                        $result4 = mysqli_query($con2, $query4);

                        ?>

                        <label for="room">Choose Room:</label>
                        <select id="room" name="room">
                        <?php

                        while ($row4 = mysqli_fetch_assoc($result4)){

                            $room_id = $row4['id'];
                            $room_name = $row4['type'];

                            ?>
                            <option value="<?php echo $room_id; ?>"><?php echo $room_name; ?></option>
                            <?php
                        }

                        ?>

                        </select>
                        <input type="submit" value="submit" name="submit2">
                        <?php
                    }
                    ?>

                </form>
                <!--</div>-->
            </div>
        </div>
    </body>

    </html>

<?php

if(isset($_POST['submit2'])){

    $pref_room_id = $_POST['room'];

    if ($pref_room_id == $prev_room_id){

        echo "This is already your present room";
    }

    else{

        $query = "insert into reallocate (user_id, prevroom_id, prefroom_id, reason) values ('$user_id','$prev_room_id','$pref_room_id','$reason')";
        mysqli_query($con1, $query);

        header("Location: info.php");
    }
    die;
    
}

?>