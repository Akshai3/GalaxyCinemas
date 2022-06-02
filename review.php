<?php include('header.php'); ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>GCTB</title>
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

.view-comment {
  float:none;
  border: 1px solid #000;
  box-sizing: border-box;
  cursor: pointer;
}

.form-button {
  cursor: pointer;
  padding: 0 1.875rem;
  width: 100%;
  font-size: 0.75rem;
  background: #f71111;
  color: #fff;
  font-style: italic;
}

.form-button:hover, .two-button-one:hover {
  background: #282828;
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

                <div class="col_1_of_4 span_1_of_4">

                    <section>
                        <form method="post" action="comment_submit.php" style="padding-bottom: 0;" onsubmit="return verify();">
                            <h3 style="padding:0 1rem 0.3rem 0.5rem;float:left;width:10%;box-sizing: border-box;">Film Name: </h3>
                            <select id="FilmId" name="FilmId" style="width:90%;">
                                <?php
                                $query = "SELECT * FROM tbl_movie";
                                $record = mysqli_query($con, $query) or die("Query Error!" . mysqli_error($con));
                                while ($filmInfo = mysqli_fetch_array($record)) {
                                ?>
                                    <option value="<?php echo $filmInfo['movie_id'] ?>"><?php echo $filmInfo['movie_name'] ?></option>
                                <?php
                                }
                                mysqli_free_result($record);
                                ?>
                                <textarea name="comment" placeholder="Leave your comment here." id="textbox"></textarea>
                                <button class="form-button" id="submit" name="submit">Submit Comment</button>
                        </form>
                        <div style="padding: 0 2rem">
                            <button class="aside-button view-comment" id="view" onclick="retrive();">View Comment</button>
                        </div>
                    </section>
                </div>



            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>