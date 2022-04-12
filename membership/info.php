<?php

session_start();

    include("../connection1.php");

    $item_id = $_GET['id'];

    $query = "select * from food where food_id='$item_id'";
    $result = mysqli_query($con2, $query);
    $row = mysqli_fetch_assoc($result);

    $item_name = $row['food_name'];
    $price = $row['price'];
    $availability = $row['availability'];
    $description = $row['description'];

    $user_id = $_SESSION['user_id'];

    $query1 = "select * from user_login where user_id='$user_id'";
    $result1 = mysqli_query($con1, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $name = $row1['customer_name'];
    $contact = $row1['contact'];
    $email = $row1['email'];

    $query2 = "select * from members where user_id='$user_id' and item_id='$item_id'";
    $result2 = mysqli_query($con2, $query2);

    if ($result2){

        if (mysqli_num_rows($result2) > 0){

            $row2 = mysqli_fetch_assoc($result2);
            $status = $row2['status'];
        }
        else{
            $status = "N";
        }
    }
    else{
        $status = "N";
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="info.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="services">
            <h3 class="title"><?php echo $item_name; ?></h3>
            <div class="box-container">
                <div class="box">
                <!--<span class="number">01</span>-->
                <!--<i class="fas fa-bicycle"></i>-->
                <p><?php echo $description; ?></p>
                <h3>Annual Membership = &#8377;&nbsp;<?php echo $price; ?></h3>
                <?php
                if ($availability > 0){

                    if ($status == "N"){
                        ?>

                        <form action="instamojo/index.php" method="POST">

                        <input type="hidden" name="type" value="<?php echo $item_name; ?>">
                        <input type="hidden" name="amount" value="<?php echo $price; ?>">
                        <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">

                        <input type="submit" value="Pay Now">

                        </form>                        
                        <?php
                    }
                    else{

                        echo "You are a member";
                    }
                }
                else{
                    echo "Sorry, we are Full Now";
                }
                ?>    
                </div>
            </div>
        </div> 
        
    </body>

    <?php

?>    