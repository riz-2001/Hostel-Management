<?php

session_start();
include ("connection1.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="aos-by-red.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="notice.css">


</head>


<body>
    
    <h1 style="padding:5% 5%;border-bottom:1px solid black;">Rules And Regulations</h1>
    <div style="padding:5% 5%;" class="container px-4">
        <div class="row gx-5">
            <div style="width:30%;">
                <div class="p-3 border bg-light">
                    <table class="table">
                        <thead style="background-color:#ffa500;">
                            <td>Navigation</td>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><a href="#Rules">Rules And Regulations Regarding Residence</a></th>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#Fee">Hostel Fee</a></th>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#Timings">Hostel Timings</a></th>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#Guests">Guests & Visitors</a></th>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#Time">Time of Mess & Dining Hall</a></th>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#Health">Health, Bank & Post Office</a></th>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#Miscellaneous">Miscellaneous</a></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <div id="Rules" class="container">
                    <h3 style="padding:5% 5%;border-bottom:1px solid black;" style="padding:5% 5%;">Rules And Regulations Regarding Residence</h3>
                        <?php
                        $category_name = "Rules_And_Regulations_Regarding_Residence";

                        $query1 = "select * from info where canteen_name!='Management'";
                        $result1 = mysqli_query($con2, $query1);
                        
                        while ($row1 = mysqli_fetch_assoc($result1)){

                            $hostel_id = $row1['canteen_id'];
                            $hostel_name = $row1['canteen_name'];

                            ?>
                            <a href="view_notice.php?cat=<?php echo $category_name; ?>&id=<?php echo $hostel_id; ?>"><?php echo $hostel_name; ?></a>&nbsp;
                            <?php
                        }

                        ?>
                    </div>
                    <div id="Fee" class="container">
                    <h3 style="padding:5% 5%;border-bottom:1px solid black;" style="padding:5% 5%;">Hostel Fee</h3>
                    <?php
                        $category_name = "Hostel_Fee";

                        $query1 = "select * from info where canteen_name!='Management'";
                        $result1 = mysqli_query($con2, $query1);

                        while ($row1 = mysqli_fetch_assoc($result1)){


                            $hostel_id = $row1['canteen_id'];
                            $hostel_name = $row1['canteen_name'];

                            ?>
                            <a href="view_notice.php?cat=<?php echo $category_name; ?>&id=<?php echo $hostel_id; ?>"><?php echo $hostel_name; ?></a>&nbsp;
                            <?php
                        }

                    ?>
                    </div>
                    <div id="Timings" class="container">
                    <h3 style="padding:5% 5%;border-bottom:1px solid black;" style="padding:5% 5%;">Hostel Timings</h3>
                    <?php
                        $category_name = "Hostel_Timings";

                        $query1 = "select * from info where canteen_name!='Management'";
                        $result1 = mysqli_query($con2, $query1);
                        
                        while ($row1 = mysqli_fetch_assoc($result1)){

                            $hostel_id = $row1['canteen_id'];
                            $hostel_name = $row1['canteen_name'];

                            ?>
                            <a href="view_notice.php?cat=<?php echo $category_name; ?>&id=<?php echo $hostel_id; ?>"><?php echo $hostel_name; ?></a>&nbsp;
                            <?php
                        }

                    ?>

                       
                    </div>
                    <div id="Guests" class="container">
                    <h3 style="padding:5% 5%;border-bottom:1px solid black;" style="padding:5% 5%;">Guests & Visitors</h3>
                    <?php
                        $category_name = "Guests_&_Visitors";

                        $query1 = "select * from info where canteen_name!='Management'";
                        $result1 = mysqli_query($con2, $query1);
                        
                        while ($row1 = mysqli_fetch_assoc($result1)){

                            $hostel_id = $row1['canteen_id'];
                            $hostel_name = $row1['canteen_name'];

                            ?>
                            <a href="view_notice.php?cat=<?php echo $category_name; ?>&id=<?php echo $hostel_id; ?>"><?php echo $hostel_name; ?></a>&nbsp;
                            <?php
                        }

                    ?>

                        
                    </div>
                    <div id="Time" class="container">
                    <h3 style="padding:5% 5%;border-bottom:1px solid black;" style="padding:5% 5%;">Time of Mess & Dining Hall</h3>
                    <?php
                        $category_name = "Time_of_Mess_&_Dining_Hall";

                        $query1 = "select * from info where canteen_name!='Management'";
                        $result1 = mysqli_query($con2, $query1);
                        
                        while ($row1 = mysqli_fetch_assoc($result1)){

                            $hostel_id = $row1['canteen_id'];
                            $hostel_name = $row1['canteen_name'];

                            ?>
                            <a href="view_notice.php?cat=<?php echo $category_name; ?>&id=<?php echo $hostel_id; ?>"><?php echo $hostel_name; ?></a>&nbsp;
                            <?php
                        }

                    ?>

                       
                    </div>
                    <div id="Health" class="container">
                    <h3 style="padding:5% 5%;border-bottom:1px solid black;" style="padding:5% 5%;">Health, Bank & Post Office</h3>
                    <?php
                        $category_name = "Health,_Bank_&_Post_Office";

                        $query1 = "select * from info where canteen_name!='Management'";
                        $result1 = mysqli_query($con2, $query1);
                        
                        while ($row1 = mysqli_fetch_assoc($result1)){

                            $hostel_id = $row1['canteen_id'];
                            $hostel_name = $row1['canteen_name'];

                            ?>
                            <a href="view_notice.php?cat=<?php echo $category_name; ?>&id=<?php echo $hostel_id; ?>"><?php echo $hostel_name; ?></a>&nbsp;
                            <?php
                        }

                    ?>

                       
                    </div>
                    <div id="Miscellaneous" class="container">
                    <h3 style="padding:5% 5%;border-bottom:1px solid black;" style="padding:5% 5%;">Miscellaneous</h3>
                        <?php
                            $category_name = "Miscellaneous";

                            $query1 = "select * from info where canteen_name!='Management'";
                            $result1 = mysqli_query($con2, $query1);
                            
                            while ($row1 = mysqli_fetch_assoc($result1)){

                                $hostel_id = $row1['canteen_id'];
                                $hostel_name = $row1['canteen_name'];

                                ?>
                                <a href="view_notice.php?cat=<?php echo $category_name; ?>&id=<?php echo $hostel_id; ?>"><?php echo $hostel_name; ?></a>&nbsp;
                                <?php
                            }

                        ?>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js "></script>
    <script>
        AOS.init({
            duration: 3000,
            once: true,
        });
    </script>
    <script src="https://kit.fontawesome.com/5ee4d9b7d1.js " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

</body>

</html>