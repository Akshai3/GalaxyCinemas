<?php
include('connect.php');
session_start();
date_default_timezone_set('Asia/Kathmandu');
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>GCTB</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/text.css">
	<link rel="stylesheet" href="css/mainstyle.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
	<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='js/jquery.color-RGBa-patch.js'></script>
	<script src='js/example.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
		.dropbtn {
			background-color: #04AA6D;
			color: white;
			padding: 16px;
			font-size: 16px;
			border: none;
		}

		.dropdown {
			display: flex;
			position: relative;

		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			min-width: 100px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			z-index: 1;

		}

		.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}

		.dropdown-content a:hover {
			background-color: #ddd;
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}

		.dropdown:hover .dropbtn {
			background-color: #3e8e41;
		}
	</style>

</head>

<body>
	<div class="header">
		<div class="header-top">
			<div class="wrap">
				<div class="h-logo">
					<a href="index.php"><img src="images/Logo1.png" alt="Logo Image Here" /></a>
				</div>
				<div class="nav-wrap">
					<ul class="group" id="example-one">
						<li><a href="index.php">Home</a></li>
						<li><a href="movies_events.php">Movies</a></li>
						<li><a href="snacks.php">Snacks</a></li>
						<li><a href="review.php">Review</a></li>
						<li><?php
						if (isset($_SESSION['loginstat'])) {
							$passUs = "SELECT * from registration where uid='" . $_SESSION['uid'] . "'";
							$passResult = mysqli_query($con, $passUs);
							$passRow = mysqli_fetch_assoc($passResult);
							$userId = $_SESSION['uid'];
							$countsql = "SELECT SUM(`itemQuantity`) FROM `tbl_viewcart` WHERE `userId`= $userId";
							$countresult = mysqli_query($con, $countsql);
							$countrow = mysqli_fetch_assoc($countresult);
							$count = $countrow['SUM(`itemQuantity`)'];
							if (!$count) {
								$count = 0;
							} ?>
							<?php echo '<a href="viewCart.php"><button type="button" class="btn btn-secondary mx-2" title="MyCart">
          <svg xmlns="img/cart.svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>  
          <i class="bi bi-cart">Cart(' . $count . ')</i>
        </button></a>'; } else { ?><?php } ?>
		

						</li>
						<li>
							<div class="dropdown">
								<img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-High-Quality-Image.png" alt="User Icon" width="50" height="50">

								<div class="dropdown-content dropdown-menu">
									<?php if (isset($_SESSION['loginstat'])) {
										$us = mysqli_query($con, "select * from registration where uid='" . $_SESSION['uid'] . "'");
										$user = mysqli_fetch_array($us); ?><a href="profile.php"><?php echo $user['uname']; ?></a>
										<a href="logout.php">Logout</a><?php } else { ?><a href="login.php">Login</a><?php } ?>
								</div>
							</div>
						</li>

					</ul>
				</div>
				<div class="clear"></div>

			</div>

		</div>
		<div class="clear"></div>

		<div class="block">
			<div class="wrap">

				<form action="process_search.php" id="reservation-form" method="post" onsubmit="myFunction()">
					<fieldset>
						<div class="field">


							<input type="text" placeholder="Enter A Movie Name" style="height:30px;width:300px;" required id="search111" name="search">

							<input type="submit" value="Search" style="height:34px;padding-top:6	px" id="button111">
						</div>

					</fieldset>
				</form>
				<div class="clear"></div>
			</div>
		</div>
		<script>
			function myFunction() {
				if ($('#hero-demo').val() == "") {
					alert("Please enter movie name...");
					return false;
				} else {
					return true;
				}

			}
		</script>