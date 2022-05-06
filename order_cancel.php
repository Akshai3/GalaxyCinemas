<?php
session_start();
include('connect.php');
mysqli_query($con,"delete from tbl_snackbook where order_id='".$_GET['id']."'");
$_SESSION['success']="Order Cancelled Successfully";
header('location:profile.php');
