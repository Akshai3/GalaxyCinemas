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
        $Quantity = $_POST['qnty_name'];
        $itemId = $_POST["itemId"];
        $mysql = "SELECT * FROM `tbl_snacks` WHERE snackId = $snackId";
        $myresult = mysqli_query($con, $mysql);
        $myrow = mysqli_fetch_assoc($myresult);
        $amount = $myrow['snackPrice'];

            $sql = "INSERT INTO `tbl_snackbbok` (`snackId`, `itemQuantity`, `user_id`, `amount`, `orderDate`) VALUES ('$itemId', '$Quantity', '$userId', '$amount', current_timestamp())";
            $result = mysqli_query($con, $sql);
            $orderId = $conn->insert_id;
            if ($result){
                $addSql = "SELECT * FROM `viewcart` WHERE userId='$userId'"; 
                $addResult = mysqli_query($conn, $addSql);
                while($addrow = mysqli_fetch_assoc($addResult)){
                    $pizzaId = $addrow['pizzaId'];
                    $itemQuantity = $addrow['itemQuantity'];
                    $itemSql = "INSERT INTO `orderitems` (`orderId`, `pizzaId`, `itemQuantity`) VALUES ('$orderId', '$pizzaId', '$itemQuantity')";
                    $itemResult = mysqli_query($conn, $itemSql);
                }
                $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
                $deleteresult = mysqli_query($conn, $deletesql);
                echo '<script>alert("Thanks for ordering with us. Your order id is ' .$orderId. '.");
                    window.location.href="http://localhost/OnlinePizzaDelivery/index.php";  
                    </script>';
                    exit();
            }
        
         
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $pizzaId = $_POST['pizzaId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `pizzaId`='$pizzaId' AND `userId`='$userId'";
        $updateresult = mysqli_query($conn, $updatesql);
    }
    
}
