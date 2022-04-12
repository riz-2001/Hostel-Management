<?php

session_start();

    include("../connection1.php");

    if (isset($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];

        $query2 = "select hostel_id from user_login where user_id='$user_id'";
        $result2 = mysqli_query($con1, $query2);
        $row2 = mysqli_fetch_assoc($result2);

        $hostel_id = $row2['hostel_id'];
        
        if ($hostel_id === 0){

            echo "Please wait for the Hostel allotment process to be completed";
        }
        else{
            ?>
           
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="style.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
                    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
                    crossorigin="anonymous" referrerpolicy="no-referrer" />
            </head>

            <body>
                
<header>



<a href="#" class="logo"><span>H</span>OSTEL</a>

<nav class="navbar">
    <a href="/food/#">Home</a>
    <a href="/food/index.php#gallery">Gallery</a>
    <a href="/food/notice.php">Notice</a>
    <a href="/food/applications/">Amenities</a>
    <a href="/food/membership/">Memberships</a>
    <a href="/food/index.php#contact">Contact Us</a>
</nav>


</header>
                <div class="services">
                <h1 class="heading">
        <span>A</span>
        <span>M</span>
        <span>E</span>
        <span>N</span>
        <span>I</span>
        <span>T</span>
        <span>Y</span>
    
    </h1>
                    <div class="box-container">

                    <?php
                    
                    $query1 = "select * from food_category where (category_name='Medical' or category_name='Lodging' or category_name='Guest Room' or category_name='Meal' or category_name='Hostel Leave' or category_name='Event Management') and canteen_id='$hostel_id'";
                    $result1 = mysqli_query($con2, $query1);

                    $sn = 1;
                    
                    while ($rows = mysqli_fetch_assoc($result1)){

                        $category_id = $rows['category_id'];
                        $category_name = $rows['category_name'];
                        $image_name = $rows['image_name'];
                        $source = "../images/category/".$image_name;

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
                        <img src=<?php echo $source; ?> style="width:40%; height:30%;">
                        <h3><?php echo $category_name; ?></h3>
                        <?php

                        if ($category_name==="Meal" || $category_name==="Lodging"){
                            $link = "menu.php?id=".$category_id;
                        }
                        else if ($category_name === "Event Management"){
                            $link = "event.php?id=".$category_id;
                        }
                        else{
                            $link = "form.php?id=".$category_id;
                        }
                        ?>
                            <button type="button" class="btn"><a href="<?php echo $link; ?>">Check Out</a></button>
                        </div>
                         
                        <?php
                        $sn++;
                    }
                    ?>    
                  



                            
                    </div>
                </div>   

                
        
    <footer class="footer">
        <div class="footer-info">
            <h3>Health Management</h3>
            <p>
              Hell Road,jadavpur<br>
              Kolkata, West Bengal, <br>
              PIN 700036, India  <br><br>
              <strong>Phone:</strong>+91 99355 00000<br>
              <strong>Email:</strong>ourhostel8@gmail.com<br>
            </p>
        </div>
        <div class="footer-social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        <div class="footer-links">
            <h3>Quick-Links</h3>
            <ul>
              <li><i class="fas fa-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="fas fa-chevron-right"></i> <a href="#">Admission</a></li>
              <li><i class="fas fa-chevron-right"></i> <a href="#">Notices</a></li>
              <li><i class="fas fa-chevron-right"></i> <a href="#">Rules</a></li>
            </ul>
        </div>
        <div class="foot-services">
            <h3>Services</h3>
            <ul>
                <li><i class="fas fa-chevron-right"></i> <a href="#">Memberships</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#">Applications</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#">Personal Info</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="/food/admin">Admin</a></li>
            </ul>
        </div>
      </footer>
      <div class="copyright">
        &copy; Copyright <strong><span>2022 Health Management</span></strong>. All Rights Reserved
      </div>
            </body> 

            </html> <?php           
        } 
    }
    else{
        echo "Register / Login immediately to be a part !";
    }
    
?>