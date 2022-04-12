<?php

session_start();

    include("../connection1.php");

    $user_id = $_SESSION['user_id'];

    $query = "select * from payments where user_id='$user_id' ORDER BY creation_date DESC";
    $result = mysqli_query($con1, $query);

    $query3 = "select * from user_login where user_id='$user_id'";
    $result3 = mysqli_query($con1, $query3);
    $row3 = mysqli_fetch_assoc($result3);

    $contact = $row3['contact'];
    $name = $row3['customer_name'];
    $email = $row3['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Info</title>
</head>
<style>
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
color: white;}
</style>
<body>
<div style="margin:0 auto;">
        
    <table>
    <thead style="background-color:#ffa500;">
        <tr>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Category</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Type</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Name</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Remark</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Amount</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;" >Creation Date</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Due Date</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Status</th>
            <th style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;"></th>
        </tr>
</thead>
        <?php

        $sn = 1;
        while ($row = mysqli_fetch_assoc($result)){

            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $category_id = $row['category_id'];
            $item_id = $row['item_id'];
            $amount = $row['amount'];
            $status = $row['status'];
            $creation_date = $row['creation_date'];
            $due_date = $row['due_date'];

            $query1 = "select category_name from food_category where category_id='$category_id'";
            $result1 = mysqli_query($con2, $query1);
            $row1 = mysqli_fetch_assoc($result1);

            $category_name = $row1['category_name'];

            $query2 = "select food_name from food where food_id='$item_id'";
            $result2 = mysqli_query($con2, $query2);
            $row2 = mysqli_fetch_assoc($result2);

            $item_name = $row2['food_name'];

            ?>

            <tr style="background-color:LightGray;">
                <td style="text-align:center;padding: 10px;color:black;"><?php echo $sn; ?></td>
                <td style="text-align:center;padding: 10px;color:black;"><?php echo $category_name; ?></td>
                <td style="text-align:center;padding: 10px;color:black;"><?php echo $item_name; ?></td>
                <td style="text-align:center;padding: 10px;color:black;"><?php echo $name; ?></td>
                <td style="text-align:center;padding: 10px;color:black;"><?php echo $description; ?></td>
                <td style="text-align:center;padding: 10px;color:black;"><?php echo $amount; ?></td>
                <td style="text-align:center;padding: 10px;color:black;"><?php echo $creation_date; ?></td>

                <?php
                if ($status == "U"){
                    ?>
                    <td><?php echo $due_date; ?></td>
                    <?php
                }
                else{
                    ?>
                    <td>____</td>
                    <?php
                }
                ?>

                <td style="text-align:center;padding: 10px;color:maroon;"><?php echo $status; ?></td>

                <?php
                if ($status == "U"){

                    if (isset($_SESSION['payment_id'])){

                        if ($_SESSION['payment_id']==$id){

                            if (isset($_GET['sts'])){
                                $status = $_GET['sts'];

                                unset($_SESSION['payment_id']);

                                if ($status == "P"){

                                    $query4 = "update payments set status='$status' where id='$id'";
                                    mysqli_query($con1, $query4);

                                    ?>
                                    <td></td>
                                    <?php
                                }
                                else{
                                    ?>

                                    <td>
                                    <form action="instamojo/index.php" method="POST">

                                        <input type="hidden" name="type" value="<?php echo $item_name; ?>">
                                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                        <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                                        <input type="hidden" name="payment_id" value="<?php echo $id; ?>">

                                        <input class="button" type="submit" value="Pay">

                                    </form>
                                    </td>
                                    <?php
                                }

                            }    
                        
                        }
                        else{
                            ?>

                            <td>
                            <form action="instamojo/index.php" method="POST">

                                <input type="hidden" name="type" value="<?php echo $item_name; ?>">
                                <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                                <input type="hidden" name="name" value="<?php echo $name; ?>">
                                <input type="hidden" name="email" value="<?php echo $email; ?>">
                                <input type="hidden" name="payment_id" value="<?php echo $id; ?>">

                                <input type="submit" value="Pay">

                            </form>
                            </td>
                            <?php
                        }
                    }
                    ?>

                    <td>
                    <form action="instamojo/index.php" method="POST">

                        <input type="hidden" name="type" value="<?php echo $item_name; ?>">
                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                        <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="payment_id" value="<?php echo $id; ?>">

                        <input type="submit" value="Pay">

                    </form>
                    </td>

                    <!--<td><button><a href="instamojo/index.php">Pay</a></button></td>-->
                    <?php
                }
                else{
                    ?>
                    <td></td>
                    <?php
                }
                ?>
            </tr>

            <?php
            $sn++;
        }
        ?>

    </table>
</div>
</body>