<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname1="admin";
$dbname2="canteen";

if (!$con1 = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname1)){
    die("Failed to Connect!");
}


if (!$con2=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname2)){
    die("Failed to Connect!");
}
?>