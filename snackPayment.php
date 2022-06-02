<?php
include('connect.php');
session_start();
//insert into tbl_snackbook

$snackId = $_POST['snackId'];
$Quantity = $_POST['Quantity'];
$user_id =  $_POST['userId'];
$amount = $_POST['amount'];
$payment_id = $_POST['payment_id'];



    $bookingSql = "INSERT INTO `tbl_snackbook` (`snackId`, `itemQuantity`, `user_id`, `amount`,`orderDate`,`payment_id`, `payment_status` ) VALUES ('$snackId', '$Quantity', '$user_id', '$amount',current_timestamp(),'$payment_id','1')";
    $bookingResult = mysqli_query($con, $bookingSql);
    $deletesql = "DELETE FROM `tbl_viewcart` WHERE `userId`='$user_id'";   
    $deleteresult = mysqli_query($con, $deletesql);
    if ($bookingResult) {
        echo "Booking Successful";
    } else {
        echo "Order Failed";
    }

