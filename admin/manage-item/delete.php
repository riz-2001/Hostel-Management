<?php 
session_start();
include("../../connection1.php");

if(isset($_GET['id']) && isset($_GET['img_name'])){
    $id = $_GET['id'];
    $image_name=$_GET['img_name'];

    $query1 = "select category_id from food where food_id='$id'";
    $result1 = mysqli_query($con2, $query1);
    $row = mysqli_fetch_assoc($result1);

    $category_id = $row['category_id'];

    $s = "../manage-item.php?id=".$category_id;

    $path="../../images/food/".$image_name;
    $remove=unlink($path);

    if ($remove==false){
        $_SESSION['remove'] = "<div> Error: Failed to Delete</div>";
        echo $_SESSION['remove'];
        header("refresh: 5, url=".$s);
        die();
    }

    else{
        $query = "delete from food where food_id='$id'" ;
        $result = mysqli_query($con2,$query) || die("Failed to delete");

        header("Location: ".$s);
    }
}
else{
    $_SESSION['remove'] = "<div> Error: Failed to Delete</div>";
    echo $_SESSION['remove'];
    header("refresh: 5, url=".$s);
    die();
}
?>