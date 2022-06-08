<?php
include 'hconnect.php';
session_start();
$ah=$_SESSION['dd'];
$query=mysqli_query($con,"SELECT * FROM `tbl_register` WHERE `email`='$ah'");
while($row=mysqli_fetch_array($query)){
$uid=$row['id'];
}

if (isset($_POST['btn'])) {
    
    $pd=$_POST['pd'];
    $pt=$_POST['rad'];
    $pday=$_POST['pday'];

    $query = mysqli_query($con,"INSERT INTO `tbl_pickupdetails`( `uid`, `pickupdate`, `pickuptime`, `pickupday`) VALUES ('$uid','$pd','$pt','$pday')");
    if($query){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("",Pickup details added successfully","success");';
            echo '}, 1000);</script>';
        // echo '
        //     <script type="text/javascript">
            
        //     $(document).ready(function(){
            
        //     swal({
        //         position: "top-end",
        //         type: "success",
        //         title: "Your work has been saved",
        //         showConfirmButton: false,
        //         timer: 1500
        //     })
        //     });
            
        //     </script>
        //     ';
    }
    else
    {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Pickup details added successfully","error");';
            echo '}, 1000);</script>';
        // echo '
        // <script type="text/javascript">
        
        // $(document).ready(function(){
        
        // swal({
        //     position: "top-end",
        //     type: "error",
        //     title: "Something went wrong",
        //     showConfirmButton: false,
        //     timer: 1500
        // })
        // });
        
        // </script>
        // ';
    }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> User Panel </title>
    <link rel="stylesheet" href="./css/style3.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icons -->
    <!-- <link rel="stylesheet" -->
        <!-- href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--Bootstrap js-->

    <script src="/css/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!--Payment-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <style>

            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

    .r {
        margin-left: 30px;
    }
 
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=date] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
.request{
    padding: 2vw;
    display: grid;
    grid-template-columns: .3fr .2fr ;
    grid-gap:1vw;
}
    .rd,
    .day {
        margin: 8px 0;
        padding: 12px 20px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .details {
        position: absolute;
        top: 50%;
        left: 30%;
        margin: -25px 0 0 -25px;
        padding: 12px 20px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        display: block;

    }

    .details label {
        margin: 8px 0;
        padding: 12px 20px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .opt1,
    .opt2 {
        margin-top: 10px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type=submit]{
    background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        left: 20vw;
        top: 5vw;
        border: none;
        cursor: pointer;} 

    /* Set a style for all buttons */
    .sta {
        
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        left: 20vw;
        top: 5vw;
        border: none;
        
        
    }
    @font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(https://example.com/MaterialIcons-Regular.eot); /* For IE6-8 */
  src: local('Material Icons'),
    local('MaterialIcons-Regular'),
    url(https://example.com/MaterialIcons-Regular.woff2) format('woff2'),
    url(https://example.com/MaterialIcons-Regular.woff) format('woff'),
    url(https://example.com/MaterialIcons-Regular.ttf) format('truetype');
}

    h3 {
        text-align: center;
    }

    button:hover {
        opacity: 0.8;
    }


    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }
    
    /* The Modal (background) */
    .modal {
        position: relative;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        top: 0;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }




    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }
    </style>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img id="logo" src="./pic/logo.png" />
        </div>
        <ul class="nav-links">
            <li>
                <a href="userpanel.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="userpanel.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <a href="viewprofile.php" class="active">
                <i class='bx bx-user-circle'></i>
                    <span class="link_name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="paymentpage.php">Profile</a></li>
                </ul>
            </li>
            <li>
                <a href="paymentpage.php" class="active">
                <i class='bx bx-credit-card' style='color:#ffffff'  ></i>
                    <span class="link_name">Payment</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="paymentpage.php">Payment</a></li>
                </ul>
            </li>

           

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><a href="logout.php" style="color:white;"><i
                                    class='bx bx-log-out'></i>User</a></div>
                    </div>
                    <img src="https://img.icons8.com/bubbles/100/000000/system-administrator-female.png" />
                </div>
            </li>
        </ul>
        
    </div>
    <section class="home-section">
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">User Dashboard</span>
            </div>
            <h5  class="mt-3"><?php echo $ah; ?></h5>
        </nav>

        <div class="details">
            <H3>Payment</H3>
            <table >
                <tr>
                    <TD>Index </TD>
                    <TD>Fee Type</TD>
                    <TD>Amount</TD>
                    <TD>Status</TD>
                    <td>Receipt</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Advance Payment</td>
                    <td>500</td>
                    <?php
                    $qu=mysqli_query($con,"SELECT * FROM `payment` WHERE  `name`='$ah'");
                    if (mysqli_num_rows($qu) > 0){
                    while($row5=mysqli_fetch_array($qu)){
                    $t=$row5['payment_status'];
                    }
                    if($t=='complete'){?>
                    <td><button type="button" class="btn btn-success">Paid</button></td>
                    <td><a href="makepdf.php"><i class='bx bxs-file'></i></a></td>
                    <?php }
                    else
                    { 
                        
                        ?>
                   
                        <td><button type="button" class="btn btn-danger">UnPaid</button></td>
                    <td><input type="submit" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/></td>
                    <?php
                    }}else
                    { 
                        
                        ?>
                    <td><button type="button" class="btn btn-danger">UnPaid</button></td>
                    <td><input type="submit" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/></td>
                    <?php
                    }
                    ?>
                   
                </tr>
                <tr>
                    
                </tr>
            </table>
            </div>
        
        
        
            
            
        
        

    </section>
    <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });

    </script>

    
<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
        jQuery.ajax({
            type:'post',
            url:'payment_process.php',
            data:"amt="+500+"&name="+name,
            success:function(result){
            var options = {
                        "key": "rzp_test_kW2Bo1bK0f76cN", 
                        "amount": 50000, 
                        "currency": "INR",
                        "name": "WM",
                        "image": "./pic/logo.png",
                        "handler": function (response){
                        jQuery.ajax({
                            type:'post',
                            url:'payment_process.php',
                            data:"payment_id="+response.razorpay_payment_id,
                            success:function(result){
                                swal({title: "Good job!",text: "Payment Successfully",icon: "success",button: "ok",}).then(function() {
                            window.location = "paymentpage.php";
                        });
                            }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>
</body>

</html>