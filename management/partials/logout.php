<?php

session_start();
    
    unset($_SESSION['admin_username']);
    unset($_SESSION['canteen_id']);

    session_destroy();

    if (isset($_SESSION['canteen_id'])){
        echo "gondogol";
    }/*
    else if (!$_SESSION['canteen_id']){
        echo "done";
    }*/
    header("Location: ../../admin/partials/login.php");
?>