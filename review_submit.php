<?php include('header.php');


require('connect.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>GCTB</title>
    <link rel="shortcut icon" type="image/png" href="img/logo.png">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato|Yantramanav:400,700');
        @import url('https://use.fontawesome.com/releases/v5.5.0/css/all.css');

        .box {
            box-sizing: border-box;
            padding: 20px 60px;
            background: #f7f7f7;
            color: #282828;
            border: 2px solid #000;
            margin-bottom: 100px;
            width: 600px;
            margin-left: 25%;
        }

        main {
            margin: 100px auto;
            max-width: 900px;
            padding: 1.875rem 3.125rem 3.125rem;
            background: #282828;
        }

        main .bar {
            text-align: center;
            font-family: 'Yantramanav', sans-serif;
            text-transform: uppercase;
            margin: 0 -4.375rem;
            padding: 0.4rem 4rem;
            background: rgb(254, 229, 14);
        }

        .bar h2,
        span {
            margin: 0;
            padding: 0;
        }

        .bar .aside {
            text-align: right;
        }

        .full-icon {
            width: 100%;
            padding: 20px 0 0 0;
            text-align: center;
            font-size: 50px;
            color: green;
        }

        .form-button {
            cursor: pointer;
            padding: 0 1.875rem;
            width: 100%;
            font-size: 16px;
            background: blue;
            color: #fff;
            font-style: italic;
            margin-top: 20%;

        }

        .form-button:hover,
        .two-button-one:hover {
            background: #282828;
            border: 1px solid #fff;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <?php
                if (isset($_SESSION['loginstat'])) {
                    $username = $_SESSION['uname'];
                    $comment = $_POST['comment'];
                    $filmid = $_POST['FilmId'];
                    $query = "INSERT INTO tbl_review(movieId, userId, comment) VALUES ('$filmid', '$username', '$comment')";
                    mysqli_query($con, $query) or die("Query Error!" . mysqli_error($con));
                ?>
                    <center>
                        <h1 style="color:#555;">Comment Submitted</h1>
                        <p style="color:#555;">...thanks a lot for sharing your opinion. Redirecting you back.</p>
                    </center>
                    <div class="section group">
                        <div class="container">
                            <div class="box">
                                <i class="fas fa-check-square full-icon"></i>

                            <?php

                        } else {
                            ?>

                                <main>
                                    <div class="bar">
                                        <h2>Oops...</h2>
                                        <span class="aside"><i>you don't seem to be logged in, redirecting you to login page.</i></span>
                                    </div>
                                    <i class="fas fa-exclamation-triangle full-icon"></i>
                                </main>

                            <?php

                        }
                            ?>



                            <a href="review.php"><button class="form-button" id="submit" name="submit">Back</button></a>

                            </div>
                        </div>
                    </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script type="text/javascript">
        function verify() {
            if (!document.getElementById('textbox').value) {
                alert("Please enter a comment.");
                return false;
            }
        }

        function retrive() {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var commentshow = document.getElementById("comments");
                    commentshow.innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "comment_retrieve.php?FilmId=" + document.getElementById("FilmId").value, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>