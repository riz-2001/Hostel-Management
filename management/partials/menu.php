<?php
    session_start();
    include("C:/xampp/htdocs/food/connection1.php");
    //include("login-check.php");

?>

    


<div class="menu text-center">
    <div class="wrapper">
        <ul>
            <li><a href="/food/management/index.php">Home</a></li>
            <li><a href="/food/management/manage-admin.php">Admin</a></li>
            <li><a href="/food/management/allocate.php">Allocation</a></li>
            <li><a href="/food/management/reallocate.php">ReAllocation</a></li>
            <li><a href="/food/management/rooms.php">Rooms</a></li>
                    <!--- <li><a href="manage-order.php">Order</a></li> --->
            <li><a href="/food/management/partials/logout.php">Logout</a></li>
        </ul>
    </div>
</div>

<?php/*

    $username=$_SESSION['admin_username'];

    $query="select canteen from admin_tbl where admin_username='$username'";
    $result=mysqli_query($con1,$query);

    if ($result){

        $arr=mysqli_fetch_assoc($result);
        $canteen_name=$arr['canteen'];

        $query="select canteen_id from info where canteen_name='$canteen_name'";
        $result=mysqli_query($con2,$query);

        if ($result){

            $arr=mysqli_fetch_assoc($result);
            $canteen_id=$arr['canteen_id'];

            $_SESSION['canteen_id']=$canteen_id;
            
        }
    }
*/
?>