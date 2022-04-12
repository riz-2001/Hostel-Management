<?php
session_start();

    include("connection1.php");

    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $query = "select username from user_login where user_id='$user_id'";
        $result = mysqli_query($con1, $query);
        $row = mysqli_fetch_assoc($result);

        $username = $row['username'];
        $welcome = "Hi, ".$username;
    }
    else{
        $welcome = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>


</head>
<body>
    
<!-- header section starts  -->

<header>

    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo"><span>H</span>OSTEL</a>

    <nav class="navbar">
        <a href="#">Home</a>
        <a href="#gallery">Gallery</a>
        <a href="/food/notice.php">Notice</a>
        <a href="/food/applications/">Amenities</a>
        <a href="/food/membership/">Memberships</a>
        <a href="#contact">Contact Us</a>
    </nav>

    <div class="icons">
        <i class="fas fa-search" id="search-btn"></i>

        <?php
       
        if (!isset($_SESSION['user_id'])){
           ?>
            <i class="fas fa-user" id="login-btn"></i>
            <?php
        }

        else {
           ?>
            <div class="drop">
                <div class="dropdown">
                <button class="dropbtn"><i class="fas fa-user" id="login-btn"><?php echo $welcome; ?></i></button>
                <div class="dropdown-content">
                <a href="personal/info.php">Personal Info</a>
                <a href="personal/payment_info.php">Payment Info</a>
                <a href="personal/change_pass.php">Change Password</a>
                <a href="logout.php">logout</a>

                </div>
                </div>
            </div>
        
            <?php
        }
        ?>
    </div>

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

</header>

<!-- header section ends -->

<!-- login form container  -->

<?php

if (!isset($_SESSION['user_id'])){

    ?>

    <div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="login.php" method="POST">
        <h3>login</h3>
        <input type="text" class="box" placeholder="enter your email / username" name="username_email" required>
        <input type="password" class="box" placeholder="enter your password" name="password" required>
        <input type="submit" value="login now" class="btn">
        <input type="checkbox" id="remember">
        <label for="remember">remember me</label>
        <p>forget password? <a href="forgetPass.php">click here</a></p>
        <p>don't have an account? <a href="signup.php">register now</a></p>

    </form>

    </div>
<?php    
}
else{

    ?>
      

<?php
}

?>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Hostel Management</h3>
        <p>Powerful and efficient student accommodation management to <br>control and manage the various aspects of hostel.</p>
        <!--<a href="#" class="btn">click me</a>-->
    </div>
</section>

<!-- home section ends -->


<section class="gallery" id="gallery">

    <h1 class="heading">
        <span>g</span>
        <span>a</span>
        <span>l</span>
        <span>l</span>
        <span>e</span>
        <span>r</span>
        <span>y</span>
    </h1>

    <div class="box-container">

        <div class="box">
            <img src="./images/user/freshers.jpg" alt="">
            <div class="content">
                <h3>Freshers</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="./images/user/games.jpg" alt="">
            <div class="content">
                <h3>Games week</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="./images/user/ostel.jpg" alt="">
            <div class="content">
                <h3>Hostel</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="./images/user/holi.jpg" alt="">
            <div class="content">
                <h3>Holi Celebration</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="./images/user/diwali.jpg" alt="">
            <div class="content">
                <h3>Diwali Celebration </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
        <div class="box">
            <img src="./images/user/ind.jpg" alt="">
            <div class="content">
                <h3>Independence Celebration</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                <a href="#" class="btn">see more</a>
            </div>
        </div>
</section>

   
<div class="testimonial-section">
      <div class="inner-width">
        <h1>What Our Authorities Say</h1>
        <div class="testimonial-pics">
          <img src="./images/person/p1.png" alt="test-1" class="active">
          <img src="./images/person/p2.png" alt="test-2">
          <img src="./images/person/p3.png" alt="test-3">
          <img src="./images/person/p4.png" alt="test-4">
        </div>

        <div class="testimonial-contents">
          <div class="testimonial active" id="test-1">
            <p> It is an exciting experience for me. It is doing commendable work in the field of education. I wish its students, staff and office members all the best for their future endeavors.</p>
            <span class="description">Emy / Provst</span>
          </div>

          <div class="testimonial" id="test-2">
            <p>It is an exciting experience for me. It is doing commendable work in the field of education. I wish its students, staff and office members all the best for their future endeavors.</p>
            <span class="description">Carla /Warden</span>
          </div>

          <div class="testimonial" id="test-3">
            <p>It is an exciting experience for me. It is doing commendable work in the field of education. I wish its students, staff and office members all the best for their future endeavors.</p>
            <span class="description">Thomas / Resident Tutor</span>
          </div>

          <div class="testimonial" id="test-4">
            <p>It is an exciting experience for me. It is doing commendable work in the field of education. I wish its students, staff and office members all the best for their future endeavors.</p>
            <span class="description">Monica / Alumni</span>
          </div>
        </div>
      </div>
    </div>




    <section class="contact" id="contact">
        <h1 class="heading">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
        </h1>

        <div class=" contact-container">
            <p>Office Hours: Monday - Friday: 9:00 AM to 5:30 PM</p>
        </div>
        <div class="hero">
            <div class="contact">
                <i class="fas fa-map-marker-alt"></i>
                <p> <a target="_blank"
                        href="https://www.google.co.in/maps/place/International+Student's+House/@28.6957677,77.2108814,15z/data=!4m5!3m4!1s0x0:0x9c695b6052161f9b!8m2!3d28.6957677!4d77.2108814">
                        Jadavpur University </a><br>
                    Hell Road<br>
                    Kolkata-110007</p>
            </div>
            <div class="contact">
                <i class="fas fa-envelope"></i>
                <p>ourhostel8@gmail.com</p>
            </div>
            <div class="contact">

                <i class="fa fa-phone"></i>
                <p> 000 2000 0000</p>
            </div>
        </div>
        <div class="help">
            <a href="notice/useful_helplines.pdf" target="_blank">Useful Helpline Numbers</a></p>
        </div>
        <div class="inputbox">
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.3697357603073!2d88.37006521443256!3d22.490306941655252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027111227a60db%3A0x22b14ae148017e9!2sJadavpur%20University!5e0!3m2!1sen!2sin!4v1643311186074!5m2!1sen!2sin" width="600" height="450" style="border: 2px solid #ffa500;" allowfullscreen="" loading="lazy"></iframe>
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


   

    <script type="text/javascript">
      $('.testimonial-pics img').click(function(){
        $(".testimonial-pics img").removeClass("active");
        $(this).addClass("active");

        $(".testimonial").removeClass("active");
        $("#"+$(this).attr("alt")).addClass("active");
      });
    </script>




      
    








<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>

</html>