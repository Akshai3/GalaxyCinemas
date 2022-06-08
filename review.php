<?php include('header.php');

$mid = $_SESSION['movie_id'];
echo $movie = $_SESSION['movie_name'];
if (!isset($_SESSION['loginstat'])) {
    header('location:Login.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>GCTB</title>

    <style>
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


        textarea {
            width: 100%;
            height: 8rem;
        }

        option,
        select {
            float: left;
            font-weight: 400;
            width: 70%;
            box-sizing: border-box;
            border: 1px solid #282828;
        }

        .form-button {
            cursor: pointer;
            padding: 0 1.875rem;
            width: 100%;
            font-size: 16px;
            background: #f71111;
            color: #fff;
            font-style: italic;

        }

        .form-button:hover,
        .two-button-one:hover {
            background: #282828;
            border: 1px solid #fff;
        }

        .aside-button {
            width: 100%;
            float: right;
            font-size: 16px;
            background: #f7f7f7;
            color: #282828;
        }

        .aside-button:hover {
            background: #f7f7f7;
            border: 1px solid #fff;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <center>
                    <h1 style="color:#555;">(Movie Review)</h1>
                    <p style="color:#555;">...WHAT DO YOU AND OTHER PEOPLE THINK.</p>
                </center>
                <div class="section group">
                    <div class="container">
                        <div class="box">
                            <table style="width:100%; height:300px;">
                                <form method="post" action="review_submit.php" onsubmit="return verify();">
                                    <tr>
                                        <td style="width: 150px; vertical-align: center;">
                                            <h3 style="font-size: 18px;">Booking Id: </h3>
                                        </td>
                                        <td>
                                            <?php
                                            $query1 = "SELECT * FROM tbl_bookings WHERE ticket_id='" . $_GET['id'] . "'";
                                            $record1 = mysqli_query($con, $query1) or die("Query Error!" . mysqli_error($con));
                                            $bookInfo = mysqli_fetch_array($record1);
                                            ?>

                                            <?php
                                            $bok = $_SESSION['id'] = $_GET['id'];
                                            echo $bok;


                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px; vertical-align: center;">
                                            <h3 style="font-size: 18px;">Film Name: </h3>
                                        </td>
                                        <td>

                                            <?php 
                                            $bok;
                                            $query3 = "SELECT * FROM `tbl_bookings` WHERE `ticket_id`='$bok' ";
                                            $record3= mysqli_query($con, $query3);
                                            $row3=mysqli_fetch_array($record3);
                                            $show=$row3['show_id'];

                                            $query = "SELECT * FROM `tbl_shows` WHERE `s_id`='$show' ";
                                            $record = mysqli_query($con, $query);
                                            $filmInfo = mysqli_fetch_array($record);
                                            $fil=$filmInfo['movie_id'];

                                            $query4 = "SELECT * FROM `tbl_movie` WHERE `movie_id`='$fil' ";
                                            $record4 = mysqli_query($con, $query4);
                                            $filmInfo4 = mysqli_fetch_array($record4);
                                            echo $Fname=$filmInfo4['movie_name'];
                                            ?>

<input type="text" name="movie"  value="<?php echo $Fname;?>" hidden>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3 style="font-size: 18px;">Rate Up to 10</h3>
                                        </td>
                                        <td> <input type="number" name="rating" max="10" min="1" value="5"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <textarea name="comment" placeholder="Leave your comment here." id="textbox" style="font-size:14px;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button class="form-button" id="submit" name="submit">Submit Comment</button>
                                        </td>
                                    </tr>
                                </form>
                                <tr>
                                    <td colspan="2">

                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td colspan="2">
                                        <div style="padding: 0 2rem">
                                            <button class="aside-button view-comment" id="view" onclick="retrive();">View Comment</button>
                                        </div>
                                    </td>
                                </tr> -->
                            </table>
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

        //     function retrive() {
        //     var xmlhttp;
        //     if (window.XMLHttpRequest) {
        //       xmlhttp = new XMLHttpRequest();
        //     } else {
        //       xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        //     }

        //     xmlhttp.onreadystatechange = function () {
        //       if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        //         var commentshow = document.getElementById("comments");
        //         commentshow.innerHTML = xmlhttp.responseText;
        //       }
        //     }
        //     xmlhttp.open("GET", "comment_retrieve.php?FilmId=" + document.getElementById("FilmId").value, true);
        //     xmlhttp.send();
        //   }
    </script>
</body>

</html>