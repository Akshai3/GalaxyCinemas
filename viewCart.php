<?php include('header.php');
error_reporting(0);
if (!isset($_SESSION['loginstat'])) {
    header('location:Login.php');
}
$qry2 = mysqli_query($con, "select * from registration where uid='" . $_SESSION['uid'] . "'");
$movie = mysqli_fetch_array($qry2);
?>
<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>
    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <div class="section group">
                    <div class="container" id="cont">
                        <div class="row">
                            <!-- <div class="alert alert-info mb-0" style="width: -webkit-fill-available;">
                <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
            </div> -->
                            <div class="col-lg-12 text-center border rounded bg-light my-3">
                                <h1>My Cart</h1>
                            </div>
                            <div class="col-lg-12">
                                <div class="card wish-list mb-3">
                                    <table class="table text-center" style="font-size:16px;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Item Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">
                                                    <form action="manage_viewcart.php" method="POST">
                                                        <button name="removeAllItem" class="btn btn-sm btn-outline-danger" style="font-size: 16px;">Remove All</button>
                                                        <input type="hidden" name="userId" value="<?php $userId = $_SESSION['uid'];
                                                                                                    echo $userId ?>">
                                                    </form>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM `tbl_viewcart` WHERE `userId`= $userId";
                                            $result = mysqli_query($con, $sql);
                                            $counter = 0;
                                            $totalPrice = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $snackId = $row['snackId'];
                                                $Quantity = $row['itemQuantity'];
                                                $userId = $row['userId'];
                                                $mysql = "SELECT * FROM `tbl_snacks` WHERE snackId = $snackId";
                                                $myresult = mysqli_query($con, $mysql);
                                                $myrow = mysqli_fetch_assoc($myresult);
                                                $snackName = $myrow['snackName'];
                                                $snackPrice = $myrow['snackPrice'];
                                                $total = $snackPrice * $Quantity;
                                                $counter++;
                                                $totalPrice = $totalPrice + $total;

                                                echo '<tr>
                                            <td>' . $counter . '</td>
                                            <td>' . $snackName . '</td>
                                            <td>' . $snackPrice . '</td>
                                            <td>
                                                <form id="frm' . $snackId . '">
                                                    <input type="hidden" name="snackId" id="snackId" value="' . $snackId . '">
                                                    <input type="number" name="Quantity" id="Quantity" readonly value="' . $Quantity . '" class="text-center" onchange="updateCart(' . $snackId . ')" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
                                                    <input type="hidden" name="userId" id="userId" value="' . $userId . '">
                                                    </form>
                                            </td>
                                            <td>' . $total . '</td>
                                            <td>
                                                <form action="manage_viewcart.php" method="POST">
                                                    <button name="removeItem" class="btn btn-sm btn-outline-danger" style="font-size: 16px;">Remove</button>
                                                    <input type="hidden" name="snackId" value="' . $snackId . '">
                                                </form>
                                            </td>
                                            
                                        </tr>';
                                            }
                                            if ($counter == 0) {
                                            ?><script>
                                                    document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>';
                                                </script> <?php
                                                        }
                                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-lg-5" style="margin-left: 30%;"><br>
                                <div class="card wish-list mb-3">
                                    <div class="pt-4 border bg-light rounded p-3">
                                        <h5 class="mb-4 text-uppercase font-weight-bold text-center" style="font-size:20px;">Price Details</h5>
                                        <ul class="list-group list-group-flush" style="font-size:16px;">
                                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price<span>Rs. <?php echo $totalPrice ?></span></li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Tax<span>Rs. 0</span></li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                                <div>
                                                    <strong>The total amount of</strong>
                                                    <strong>
                                                        <p class="mb-0">(including Tax & Charge)</p>
                                                    </strong>
                                                </div>
                                                <span><strong>Rs. <?php echo $totalPrice ?></strong></span>
                                                <input type="hidden" name="totalPrice" id="totalPrice" value="<?php echo $totalPrice ?>">
                                            </li>
                                        </ul>

                                        <br>
                                        <button type="button" id= "payment" name="checkout" class="btn btn-primary btn-block" style="font-size:16px;" data-toggle="modal" data-target="#checkoutModal">Go to checkout</button>
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <br><br><br><br><br><br><br><br>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }

        function updateCart(id) {
            $.ajax({
                url: 'partials/_manageCart.php',
                type: 'POST',
                data: $("#frm" + id).serialize(),
                success: function(res) {
                    location.reload();
                }
            })
        }
    </script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




    <script>
        let snackId = $('#snackId').val();
        let Quantity = $('#Quantity').val();
        let userId = $('#userId').val();
        let amount = $('#totalPrice').val();

    
        $("#payment").click(function() {
            var options = {
                "key": "rzp_test_SugKuECyOups8l",
                "amount": amount * 100,
                "currency": "INR",
                "name": "Galaxy Cinemas",
                "description": "Transaction",
                "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                "handler": function(response) {
                    $.ajax({
                        type: 'post',
                        url: 'snackPayment.php',
                        data: {
                            payment_id: response.razorpay_payment_id,
                            snackId: snackId,
                            Quantity: Quantity,
                            userId: userId,
                            amount: amount
                        },
                        success: function(result) {
                            alert(result);
                            window.location.href = " profile.php";
                        }
                    });

                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        });
    </script>


    <?php include('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

</body>

</html>