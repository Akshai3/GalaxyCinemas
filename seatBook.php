<html>

<head>
  <?php
  session_start();
  include('connect.php');
  $_SESSION['sid'];
  $_SESSION['tid'];
  $_SESSION['stid'];
  $_SESSION['screen_id'];

  $s = mysqli_query($con, "select * from tbl_shows where s_id='" . $_SESSION['sid'] . "'");
  $shw = mysqli_fetch_array($s);
  $t = mysqli_query($con, "select * from tbl_theatre where id='" . $_SESSION['tid'] . "'");
  $theatre = mysqli_fetch_array($t);
  $ttm = mysqli_query($con, "select  * from tbl_show_time where st_id='" . $_SESSION['stid'] . "'");
  $ttme = mysqli_fetch_array($ttm);
  $sn = mysqli_query($con, "select  * from tbl_screens where screen_id='" . $_SESSION['screen_id'] . "'");
  $screen = mysqli_fetch_array($sn);
  $data = "";
  $list = array();
  extract($_GET);

  if (isset($db)) {
    $checkstr = "SELECT 1 from " . $moviename . ";";
    $check = mysqli_query($db, $checkstr);
    if ($check !== FALSE) {
      for ($i = 0; $i < 14; $i++) {
        for ($j = 0; $j <= 14; $j++) {
          $seatname = chr($i + 65) . $j;
          $checkseat = "SELECT * FROM " . $moviename . " WHERE seatname='" . $seatname . "';";
          $query = mysqli_query($db, $checkseat);
          if (mysqli_num_rows($query) >= 1) {
          } else {
            $inserting = "INSERT INTO " . $moviename . " (seatname) VALUES('" . $seatname . "');";
            $res = mysqli_query($db, $inserting);
            if ($i == 0 || ($i == 12 && $j % 2 == 0) || ($i == 3) || ($j == 3 && $i % 3 == 0)) {
              $altering = "UPDATE " . $moviename . " SET status='OCCUPIED' WHERE seatname='" . $seatname . "';";
              $query = mysqli_query($db, $altering);
            } else {
              $altering = "UPDATE " . $moviename . " SET status='UNOCCUPIED' WHERE seatname='" . $seatname . "';";
              $query = mysqli_query($db, $altering);
            }
          }
        }
      }
      $str2 = mysqli_query($db, "SELECT * FROM " . $moviename . ";");
      while ($rows = mysqli_fetch_assoc($str2)) {
        $data .= $rows["seatname"] . ":" . $rows["status"] . ";";
      }
    } else {
      $str1 = "CREATE TABLE " . $moviename . " (seatname varchar(255) NOT NULL ,status varchar(255) NOT NULL);";
      $res = mysqli_query($db, $str1);
      $str = "ALTER TABLE " . $moviename . " ALTER status SET DEFAULT 'UNOCCUPIED';";
      $res = mysqli_query($db, $str);
    }
  }
  ?>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Book Tickets</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="1000">

  <link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />

</head>

<body style="margin-block-start:0px;" onload="add_buttons()">

  <div id="titlebar">
    <p>
      <span id="Theatre_name">
        <?php echo $theatre['name']; ?> , <?php echo $screen['screen_name']; ?>
      </span>

    <div id="Number_of_tickets">
      Number of tickets : 0
    </div>
    <div id="cost_of_tickets">
      Bill amount : 0
    </div>
    </p>
    <p>
      <span id="Date_and_time">
        Show Time: <?php echo $ttme['start_time']; ?>
      </span>
    </p>
  </div>
  <div>
    <br /> <br /> <br /> <br /> <br />
  </div>

  <ul class="showcase">
    <li>
      <div class="seat"></div>
      <small>N/A</small>
    </li>

    <li>
      <div class="seat selected"></div>
      <small>Selected</small>
    </li>

    <li>
      <div class="seat occupied"></div>
      <small>Occupied</small>
    </li>
  </ul>
  <br />

  <section class="clearfix">
    <form method="post" action="buyticket.php" onsubmit="return check();">
      <?php

      // $query = "SELECT sty_id,type_name FROM `tbl_screentype` WHERE screen_id = '" . $_SESSION['screen_id'] . "' ";
      // $record = mysqli_query($con, $query);
      // while ($houseInfo = mysqli_fetch_assoc($record)) {
      //   $seatType =  $houseInfo["type_name"];
      //   $sId = $houseInfo['sty_id'];
      $sql = "SELECT `type_name`,`position` FROM `tbl_screentype` WHERE screen_Id ='" . $_SESSION['screen_id'] . "' ORDER BY `position`";
      $record = mysqli_query($con, $sql);
      while ($houseInfo = mysqli_fetch_assoc($record)) {
        $seatType =  $houseInfo["type_name"];
        $postition = $houseInfo["position"];
        if ($postition == '1') {
          $query3 = "SELECT sty_id,scRow,scCol,type_name,charge FROM `tbl_screentype` WHERE position = '1' AND screen_id='" . $_SESSION['screen_id'] . "' ";
          $record3 = mysqli_query($con, $query3);
          if (mysqli_num_rows($record3) > 0) {
            while ($row = mysqli_fetch_array($record3)) {
              $row['scRow'] . ', ' . $row['scCol'];
              $query4 = "SELECT * FROM tbl_bookings WHERE show_id='" . $_SESSION['sid'] . "'";
              $record4 = mysqli_query($con, $query4) or die("Query Error!" . mysqli_error($con));
              $seatsOccupied;
              $numberOfSeatsOccupied = 0;
              while ($row1 = mysqli_fetch_array($record4)) {
                $seatsOccupied[$numberOfSeatsOccupied][0] = $row['SeatRow'];
                $seatsOccupied[$numberOfSeatsOccupied][1] = $row['SeatCol'];
                $numberOfSeatsOccupied++;
              } ?>
              <div class="head2">
                <h4><?php echo $row['type_name']; ?></h4>
              </div>
              <div class="Platinum">
                <?php

                while ($row['scRow']) {
                  $rowName = chr(65 + $row['scRow'] - 1);
                ?>
                  <div class="ticketing-row">

                  <?php
                  for ($i = 1; $i <= $row['scCol']; $i++) {
                    $isReserved = 0;

                    for ($it = 0; $it < $numberOfSeatsOccupied; $it++) {
                      if ($seatsOccupied[$it][0] == $row['scRow'] && $seatsOccupied[$it][1] == $i)
                        $isReserved = 1;
                    }


                    if ($isReserved) {
                      echo "<div class='ticketing-col reserved'>";
                      print "Sold " . $rowName . $i;
                    } else {
                      echo "<div class='ticketing-col'>";
                      echo '<input type="hidden" class="rate" value="' . $row['charge'] . '">';
                      print "<input type='checkbox'  class='checkbox' name='seat[]' value='" . $row['scRow'] . "|" . $i . "|" . $row['type_name'] . "'>";
                      print $rowName . $i;
                    }
                    echo "</div>";
                  }
                  $row['scRow']--;
                  echo "</div>"; // Ticketing-row end
                }
                  ?>
                  </div>
              </div>
            <?php
            }
          }
        }
        if ($postition == 2) {
          $query2 = "SELECT sty_id,scRow,scCol,type_name,charge FROM `tbl_screentype` WHERE position = 2 AND screen_id='" . $_SESSION['screen_id'] . "' ";
          $record2 = mysqli_query($con, $query2);
          if (mysqli_num_rows($record2) > 0) {
            while ($rowN = mysqli_fetch_array($record2)) {
              $rowN['scRow'] . ', ' . $rowN['scCol'];
              $query4 = "SELECT * FROM tbl_bookings WHERE show_id='" . $_SESSION['sid'] . "'";
              $record4 = mysqli_query($con, $query4) or die("Query Error!" . mysqli_error($con));
              $seatsOccupied;
              $numberOfSeatsOccupied = 0;
              while ($row1 = mysqli_fetch_array($record4)) {
                $seatsOccupied[$numberOfSeatsOccupied][0] = $row['SeatRow'];
                $seatsOccupied[$numberOfSeatsOccupied][1] = $row['SeatCol'];
                $numberOfSeatsOccupied++;
              } ?>
              <div class="head1">
                <h4><?php echo $rowN['type_name']; ?></h4>
              </div>
              <div class="gold">
                <?php

                while ($rowN['scRow']) {
                  $rowName = chr(65 + $rowN['scRow'] - 1);
                ?>
                  <div class="ticketing-row">

                  <?php
                  for ($i = 1; $i <= $rowN['scCol']; $i++) {
                    $isReserved = 0;

                    for ($it = 0; $it < $numberOfSeatsOccupied; $it++) {
                      if ($seatsOccupied[$it][0] == $rowN['scRow'] && $seatsOccupied[$it][1] == $i)
                        $isReserved = 1;
                    }


                    if ($isReserved) {
                      echo "<div class='ticketing-col reserved'>";
                      print "Sold " . $rowName . $i;
                    } else {
                      echo "<div class='ticketing-col'>";
                      echo '<input type="hidden" class="rate" value="' . $rowN['charge'] . '">';
                      print "<input type='checkbox' class='checkbox' name='seat[]' value='" . $rowN['scRow'] . "|" . $i . "|" . $rowN['type_name'] . "'>";
                      print $rowName . $i;
                    }
                    echo "</div>";
                  }
                  $rowN['scRow']--;
                  echo "</div>"; // Ticketing-row end
                }
                  ?>
                  </div>
              </div>

            <?php
            }
          }
        }
        if ($postition == 3) {
          $query2 = "SELECT sty_id,scRow,scCol,type_name,charge FROM `tbl_screentype` WHERE position = 3 AND screen_id='" . $_SESSION['screen_id'] . "' ";
          $record2 = mysqli_query($con, $query2);
          if (mysqli_num_rows($record2) > 0) {
            while ($rowG = mysqli_fetch_array($record2)) {
              $rowG['scRow'] . ', ' . $rowG['scCol'];
              $query4 = "SELECT * FROM tbl_bookings WHERE show_id='" . $_SESSION['sid'] . "'";
              $record4 = mysqli_query($con, $query4) or die("Query Error!" . mysqli_error($con));
              $seatsOccupied;
              $numberOfSeatsOccupied = 0;
              while ($row1 = mysqli_fetch_array($record4)) {
                $seatsOccupied[$numberOfSeatsOccupied][0] = $row['SeatRow'];
                $seatsOccupied[$numberOfSeatsOccupied][1] = $row['SeatCol'];
                $numberOfSeatsOccupied++;
              } ?>
              <div class="head1">
                <h4><?php echo $rowG['type_name']; ?></h4>
              </div>
              <div class="gold">
                <?php

                while ($rowG['scRow']) {
                  $rowName = chr(65 + $rowG['scRow'] - 1);
                ?>
                  <div class="ticketing-row">

                  <?php
                  for ($i = 1; $i <= $rowG['scCol']; $i++) {
                    $isReserved = 0;

                    for ($it = 0; $it < $numberOfSeatsOccupied; $it++) {
                      if ($seatsOccupied[$it][0] == $rowG['scRow'] && $seatsOccupied[$it][1] == $i)
                        $isReserved = 1;
                    }


                    if ($isReserved) {
                      echo "<div class='ticketing-col reserved'>";
                      print "Sold " . $rowName . $i;
                    } else {
                      echo "<div class='ticketing-col'>";
                      echo '<input type="hidden" class="rate" value="' . $rowG['charge'] . '">';
                      print "<input type='checkbox' class='checkbox' name='seat[]' value='" . $rowG['scRow'] . "|" . $i . "|" . $rowG['type_name'] . "'>";
                      print $rowName . $i;
                    }
                    echo "</div>";
                  }
                  $rowG['scRow']--;
                  echo "</div>"; // Ticketing-row end
                }
                  ?>
                  </div>
              </div>

      <?php
            }
          }
        }
      }

















      //  $query = "SELECT * FROM tbl_bookings WHERE show_id='" . $_SESSION['sid'] . "'";
      //  $record = mysqli_query($con, $query) or die("Query Error!".mysqli_error($con));
      //  $seatsOccupied;
      //  $numberOfSeatsOccupied = 0;
      //  while ($row = mysqli_fetch_array($record)) {
      //    $seatsOccupied[$numberOfSeatsOccupied][0] = $row['SeatRow'];
      //    $seatsOccupied[$numberOfSeatsOccupied][1] = $row['SeatCol'];
      //    $numberOfSeatsOccupied++;
      //  }



      ?>





      <div class="ticketing-row">

      </div>
      <div class="bottomDock">
        <button type="submit" name="submit" id="submit" class="book">Select Seats</button>
      </div>
    </form>
  </section>









  <br /><br /><br />
  <div class="screenContain">
    <div class="screen">
      <div class="text">Screen</div>
    </div>
  </div>

  <div>
    <p style="margin-left:40%; ">All eyes this way please!</p>
  </div>

  <div id="bottom_dock">

  </div>

  <br><br><br>

  <script type="text/javascript">
    function check() {
      var flag = -1;
      var listOfCheckboxes = document.getElementsByClassName('checkbox');
      for (var i = 0; i < listOfCheckboxes.length; i++) {
        if (listOfCheckboxes[i].checked)
          flag = 1;
      }
      if (flag == -1) {
        alert("Please choose at least one seat.");
        return false;
      }
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      var totalrate = 0;
      $('.checkbox').on('change', function() {
        if (this.checked) {
          totalrate += parseInt($(this).parent().find('.rate').val());
        } else {
          totalrate -= parseInt($(this).parent().find('.rate').val());
        }
        $('#submit').val(totalrate);
        console.log($('#submit').val());
      });
    });
  </script>


</body>

</html>