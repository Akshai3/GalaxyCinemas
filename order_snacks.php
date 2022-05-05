<?php 
if (isset($_SESSION['loginstat'])) {
  header('location:Login.php');
}

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <title>Cart</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <style>
    #cont{
        min-height : 626px;
    }
    </style>
</head>
<body>
    <?php include('header.php');?>
    
  
    <div class="content">
    <div class="wrap">
    <div class="container" id="cont">
        <div class="row">
            
            <div class="col-lg-12 text-center border rounded bg-light my-3">
                <h1>Payment</h1>
            </div>
            
                <?php

                $snackId = $_POST['itemId'];
                $Quantity = $_POST['qnty_name'];
                                $sql = "SELECT * FROM `tbl_snacks` WHERE `snackId`= $snackId";
                                $result = mysqli_query($con, $sql);
                                $counter = 0;
                                $totalPrice = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $snackId = $row['snackId'];
                                    $mysql = "SELECT * FROM `tbl_snacks` WHERE snackId = $snackId";
                                    $myresult = mysqli_query($con, $mysql);
                                    $myrow = mysqli_fetch_assoc($myresult);
                                    $snackName = $myrow['snackName'];
                                    $snackPrice = $myrow['snackPrice'];
                                    $total = $snackPrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;

                                   
                                }
                                if($counter==0) {
                                    ?><script> document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>';</script> <?php
                                }
                            ?>
                            
                        
               
            <div class="col-lg-4" style="margin-left: 30%;"><br>
                <div class="card wish-list mb-3" >
                    <div class="pt-4 border bg-light rounded p-3">
                    <form action="_manageSnackOrder.php" method="post">
                        <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Item<span><?php echo $snackName ?></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Quantity<span><?php echo $Quantity ?></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Amount<span>Rs. <?php echo $snackPrice ?></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Total<span > <?php echo $snackPrice ?> * <?php echo $Quantity ?></span></li>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                <div>
                                    <strong>The total amount of</strong>
                                    <strong><p class="mb-0">(including Tax & Charge)</p></strong>
                                </div>
                                <span><strong>Rs. <?php echo $totalPrice ?></strong></span>
                            </li>
                        </ul>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block" name="checkout">Order</button>
                    </form>
                      </div>
                </div>
              
            </div>
        </div>
    </div>
    </div>
    </div>  
                       
    <?php include('footer.php'); ?>
     <!-- <?php require 'partials/_checkoutModal.php'; ?> -->
    
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    
</body>
</html>
