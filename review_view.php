<?php
include('header.php');
require('connect.php');
$mid=$_SESSION['id'];

?>

<html>

<head>
    <style>
        section {
            box-sizing: border-box;
            margin: 1rem -4rem;
            padding: 0 1rem 1rem 0;
            background: #f7f7f7;
            color: #282828;
            border: 2px solid #000;
        }

        section p {
            padding: 0 2rem;
            color: #282828;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <div class="section group">
                    <?php
                    $query = "SELECT * FROM tbl_review WHERE `movieId`='$mid' ";
                    $result = mysqli_query($con, $query) or die('Failed to query ' . mysqli_error($con));

                    while ($row = mysqli_fetch_array($result)) {
                        print "<section style='padding: 1rem 3rem;'>";
                        print "<h3>Viewer: " . $row['userId'] . "</h3>";
                        print "<p style='padding:0;'>" . $row['comment'] . "</p>";
                        print "</section>";
                    }
                    
                    mysqli_free_result($result);
                    mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>