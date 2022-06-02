<?php
include('connect.php');
session_start();
//insert into tbl_booking
$user_id = $_SESSION['uid'];
$payment_id = $_POST['payment_id'];
$seats = $_POST['seats'];
$theaterId = $_POST['theaterId'];
$screenId = $_POST['screenId'];
$showId = $_POST['showId'];
$amount = $_POST['amount'];
$seatCount = $_POST['seatCount'];
$showTime = $_POST['showTime'];
 
$ticketDate = $_SESSION['ticketDate'];
$ticketId="BKID".rand(1000000,9999999);
$booking_date = date('Y-m-d');

for ($i = 0; $i < sizeof($_POST['seats']); $i++) {
    list($row,$col,$type,$seatNumber) = explode('|', $_POST['seats'][$i]);
    $bookingSql = "INSERT INTO `tbl_bookings`(`ticket_id`, `t_id`, `user_id`, `show_id`,`show_time_id` ,`screen_id`, `no_seats`,`seatNumber`, `seatRow`, `seatCol`,`seatType`, `amount`, `ticket_date`, `date`, `payment_id`, `payment_status`, `status`) VALUES ('$ticketId','$theaterId','$user_id','$showId','$showTime','$screenId','$seatCount','$seatNumber','$row','$col','$type','$amount','$ticketDate','$booking_date','$payment_id','1','1')";
    $bookingResult = mysqli_query($con, $bookingSql);
}
echo "Booking Successful";

?>