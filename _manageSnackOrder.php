<?php
include 'connect.php';
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_SESSION['loginstat'];
 
   
    
    if(isset($_POST['checkout'])) {
      
        
        $passSql = "SELECT * from registration where uid='" . $_SESSION['uid'] . "'"; 
        $passResult = mysqli_query($con, $passSql);
        $passRow=mysqli_fetch_assoc($passResult);
        $userName = $passRow['uname'];
        $userId = $_SESSION['uid'];
        $Quantity = $_POST['quantity'];
        $snackId = $_POST["snackID"];
        $mysql = "SELECT * FROM `tbl_snacks` WHERE snackId = $snackId";
        $myresult = mysqli_query($con, $mysql);
        $myrow = mysqli_fetch_assoc($myresult);
        $total = $_POST['amount'];

            $sql = "INSERT INTO `tbl_snackbook` (`snackId`, `itemQuantity`, `user_id`, `amount`, `orderDate`) VALUES ('$snackId', '$Quantity', '$userId', '$total', current_timestamp())";
            $result = mysqli_query($con, $sql);

            if($result){
                header('location:profile.php');
            }
            else{
                echo "Order Failed";
            }
        
         
    }
    
}
