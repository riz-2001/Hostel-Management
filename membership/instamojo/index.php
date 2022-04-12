<?php

session_start();

include("../../connection1.php");

$user_id = $_SESSION['user_id'];
$item_id = $_POST['item_id'];

$query1 = "select * from food where food_id='$item_id'";
$result1 = mysqli_query($con2, $query1);
$row1 = mysqli_fetch_assoc($result1);

$hostel_id = $row1['canteen_id'];
$category_id = $row1['category_id'];
$description = "Purchase";
$amount = $_POST['amount'];
$status = "U";

$query2 = "select category_name from food_category where category_id='$category_id'";
$result2 = mysqli_query($con2, $query2);
$row2 = mysqli_fetch_assoc($result2);

$category_name = $row2['category_name'];
$name = 'Membership for '.$_POST['type'];

$query3 = "insert into payments (user_id, canteen_id, name, description, category_id, item_id, amount, status) values ('$user_id','$hostel_id','$name','$description','$category_id','$item_id','$amount','$status')";
mysqli_query($con1, $query3);

$query4 = "select id from payments where user_id='$user_id' and item_id='$item_id' and status='$status'";
$result4 = mysqli_query($con1, $query4);
$row4 = mysqli_fetch_assoc($result4);

$payment_id = $row4['id'];

$_SESSION['payment_id'] = $payment_id;


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_cd4829fd111b7c947cddfc48afb",
                  "X-Auth-Token:test_11ec911d39fac11ff9f5a17c209"));
$payload = Array(
    'purpose' => 'Membership for '.$_POST['type'],
    'amount' => $_POST['amount'],
    'phone' => '9999999999',
    'buyer_name' => $_POST['name'],
    'redirect_url' => 'http://localhost/food/membership/instamojo/redirect.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => $_POST['email'],
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$response = json_decode($response);

//$json_decode = json_decode($response, true);
//$_SESSION['TID'] = $json_decode["payment_request"]["id"];
//$pay_url = $json_decode["payment_request"]["longurl"];

//header("location: $pay_url");

$_SESSION['TID'] = $response->payment_request->id;

//echo $response->payment_request->id;
//echo $response->payment_request->longurl;

header("Location: ".$response->payment_request->longurl);

//echo "<pre>";
//echo print_r($response);

die();


?>