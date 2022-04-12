<?php

session_start();

    include("../connection1.php");

    $category_id = $_GET['id'];

    $user_id = $_SESSION['user_id'];

    $query1 = "select hostel_id from user_login where user_id='$user_id'";
    $result1 = mysqli_query($con1, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $hostel_id = $row1['hostel_id'];

    $query2 = "select category_name from food_category where category_id='$category_id'";
    $result2 = mysqli_query($con2, $query2);
    $row2 = mysqli_fetch_assoc($result2);

    $category_name = $row2['category_name'];

    $query = "select * from food where category_id='$category_id' and canteen_id='$hostel_id'";
    $result = mysqli_query($con2, $query);

    $status = "L";
    $quantity = 1;
    $amount = 0;

    ?>


<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="event.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="event">
            <h1 class="event-head">Event Management</h1>
            <div class="event-container">
                <!--<div class="box">-->
                <!--<span class="number">01</span>-->
                <!--<i class="fas fa-bicycle"></i>-->
                <h3>Do you really want to be a management member for any upcoming event of the year?</h3>
                <p>Event coordinators are responsible for organizing and managing every aspect of an event. Their duties include conceptualizing theme ideas, planning budgets, booking venues, liaising with suppliers and clients, managing logistics, and presenting post-event reports.</p>
                <form action="" method="POST" class="form-event">
                    <label for="events">Choose an event:</label>
                    <select id="events" name="events">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)){

                        $item_id = $row['food_id'];
                        $item_name = $row['food_name'];
                        $availability = $row['availability']; 

                        if ($availability > 0){

                            ?>
                            <option value="<?php echo $item_name; ?>"><?php echo $item_name; ?></option>
                            <?php
                        }  
                    }
                    ?>
                    </select>
                    <input type="submit" value="submit" class="btn">
                </form>
                <!--</div>-->
            </div>
        </div>
    </body>

    </html>

<?php

if($_SERVER['REQUEST_METHOD']=="POST"){

    $event = $_POST['events'];

    $query3 = "select food_id from food where food_name='$event'";
    $result3 = mysqli_query($con2, $query3);
    $row3 = mysqli_fetch_assoc($result3);

    $item_id = $row3['food_id'];
    
    $query4="insert into orders (user_id,food_id,quantity,total_amount,canteen_id,category_id,status) values ('$user_id','$item_id','$quantity','$amount','$hostel_id','$category_id','$status')";
    mysqli_query($con1,$query4); 
        
    header("Location: index.php");
    die;
    
}

?>