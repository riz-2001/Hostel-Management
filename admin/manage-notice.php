<html>
    <head>
        <title> EatSpectra - Admin Panel</title>
        <link rel="stylesheet" href="admin.css">
    </head>

    <?php

        include('partials/menu.php');
        include('../connection1.php');    
    ?>
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
.center {
  margin-left: auto;
  margin-right: auto;
}
</style>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<body   style="background-color: #000000ab;">

        <div class="main-content" style="background-color:transparent;padding: 3%;">
            
                <h1 style="font-size:50px;text-align-center;padding:25px;color:#ffa500"><i class="fas fa-users-cog fa-2x" ></i>&nbsp;&nbsp;Manage Notices&nbsp;&nbsp;<i class="fas fa-users-cog fa-2x" ></i></h1> <br>

                <br><br>
                <table class="center tbl-full" style="width:100%;">
                <thead style="background-color:DodgerBlue">
                    <tr>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">S.no</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Class</th>
                        <th  style="text-align:center;padding: 13px;
                         font-size: large;
                         color: black;">Actions</th>

                    </tr>
                    </thead>
                    <tr style="background-color:LightGray;">
                        <td style="text-align:center;padding: 10px;color:maroon;">1</td>
                        <td style="text-align:center;padding: 10px;color:maroon;">Rules And Regulations Regarding Residence</td>
                        <td style="text-align:center;padding: 10px;color:maroon;"><button class="button"><a href="manage-notice/view.php?cat=Rules_And_Regulations_Regarding_Residence">View</a></button></td>
                    </tr>
                    <tr style="background-color:LightGray;">
                        <td style="text-align:center;padding: 10px;color:maroon;">2</td>
                        <td style="text-align:center;padding: 10px;color:maroon;">Hostel Fee</td>
                        <td style="text-align:center;padding: 10px;color:maroon;"><button class="button" ><a href="manage-notice/view.php?cat=Hostel_Fee">View</a></button></td>
                    </tr>
                    <tr style="background-color:LightGray;">
                        <td style="text-align:center;padding: 10px;color:maroon;">3</td>
                        <td style="text-align:center;padding: 10px;color:maroon;">Hostel Timings</td>
                        <td style="text-align:center;padding: 10px;color:maroon;"><button class="button"><a href="manage-notice/view.php?cat=Hostel_Timings">View</a></button></td>
                    </tr>
                    <tr style="background-color:LightGray;">
                        <td style="text-align:center;padding: 10px;color:maroon;">4</td>
                        <td style="text-align:center;padding: 10px;color:maroon;">Guests & Visitors</td>
                        <td style="text-align:center;padding: 10px;color:maroon;"><button class="button"><a href="manage-notice/view.php?cat=Guests_&_Visitors">View</a></button></td>
                    </tr>
                    <tr style="background-color:LightGray;">
                        <td style="text-align:center;padding: 10px;color:maroon;">5</td>
                        <td style="text-align:center;padding: 10px;color:maroon;">Time of Mess & Dining Hall</td>
                        <td style="text-align:center;padding: 10px;color:maroon;"><button class="button"><a href="manage-notice/view.php?cat=Time_of_Mess_&_Dining_Hall">View</a></button></td>
                    </tr>
                    <tr style="background-color:LightGray;">
                        <td style="text-align:center;padding: 10px;color:maroon;">6</td>
                        <td style="text-align:center;padding: 10px;color:maroon;">Health, Bank & Post Office</td>
                        <td style="text-align:center;padding: 10px;color:maroon;"><button class="button"><a href="manage-notice/view.php?cat=Health,_Bank_&_Post_Office">View</a></button></td>
                    </tr>
                    <tr style="background-color:LightGray;">
                        <td style="text-align:center;padding: 10px;color:maroon;">7</td>
                        <td style="text-align:center;padding: 10px;color:maroon;">Miscellaneous</td>
                        <td style="text-align:center;padding: 10px;color:maroon;"><button class="button"><a href="manage-notice/view.php?cat=Miscellaneous">View</a></button></td>
                    </tr>
                </table>
                
            </div>
        </div>
    </body>
</html>