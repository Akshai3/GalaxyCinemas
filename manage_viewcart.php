<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['uid'];
    if (isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        $quantity = $_POST["qnty_name"];
        // Check whether this item exists
        $existSql = "SELECT * FROM `tbl_viewcart` WHERE snackId = '$itemId' AND `userId`='$userId'";
        $result = mysqli_query($con, $existSql);
        $numExistRows = mysqli_num_rows($result);

        $sql = "INSERT INTO `tbl_viewcart` (`snackId`, `itemQuantity`, `userId`, `addedDate`) VALUES ('$itemId', '$quantity', '$userId', current_timestamp())";
        $result = mysqli_query($con, $sql);
        
            echo "<script>
    alert('Added To Cart');
    window.history.back(1);
</script>";
            
        
    }
    if (isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `tbl_viewcart` WHERE `snackId`='$itemId' AND `userId`='$userId'";
        $result = mysqli_query($con, $sql);
        echo "<script>
    alert('Removed');
    window.history.back(1);
</script>";
    }
    if (isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `tbl_viewcart` WHERE `userId`='$userId'";
        $result = mysqli_query($con, $sql);
        echo "<script>
    alert('Removed All');
    window.history.back(1);
</script>";
    }
}
