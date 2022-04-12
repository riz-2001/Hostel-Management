<?php

session_start();

    include("../connection1.php");

    $category_id = $_GET['id'];

    $user_id = $_SESSION['user_id'];

    $query1 = "select * from user_login where user_id='$user_id'";
    $result1 = mysqli_query($con1, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    $hostel_id = $row1['hostel_id'];
    $contact = $row1['contact'];
    $name = $row1['customer_name'];
    $email = $row1['email'];

    $query2 = "select category_name from food_category where category_id='$category_id'";
    $result2 = mysqli_query($con2, $query2);
    $row2 = mysqli_fetch_assoc($result2);

    $category_name = $row2['category_name'];

    $query = "select * from food where category_id='$category_id' and canteen_id='$hostel_id'";
    $result = mysqli_query($con2, $query);

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="menu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
            integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="services">
            <h3 class="title"><?php echo $category_name; ?></h3>
            <div class="box-container">

            <?php

            $sn = 1;

            while ($row = mysqli_fetch_assoc($result)){
                
                $item_id = $row['food_id'];
                $item_name = $row['food_name'];
                $price = $row['price'];
                $availability = $row['availability'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                $path = "../images/food/".$image_name;

                if ($sn%3 == 1){
                    $id_pos = "pos3";
                }
                else if ($sn%3 == 2){
                    $id_pos = "";
                }
                else{
                    $id_pos = "pos2";
                }

                ?>

                <div class="box" id=<?php echo $id_pos; ?>>
                <span class="number"><?php echo $sn; ?></span>
                <h2><?php echo $item_name; ?></h2>
                <img src=<?php echo $path; ?> style="width:50%; height:50%;">
                <p><?php echo $description; ?></p>
                <?php
                if ($availability > 0){
                    ?>

                    <form action="instamojo/index.php" method="POST">

                    <input type="hidden" name="type" value="<?php echo $item_name; ?>">
                    <input type="hidden" name="amount" value="<?php echo $price; ?>">
                    <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">

                    <input type="submit" value="&#8377;&nbsp;<?php echo $price; ?>">

                    </form>
                    <!--<button type="button" class="btn"><a href="">&#8377;&nbsp;<?php// echo $price; ?></a></button>-->
                    <?php
                }
                else{
                    echo "Not available";
                }
                ?>    
                </div>
                <?php
                $sn++;
            }
            ?>
                
            </div>
        </div> 
        
    </body>

    <?php

?>    