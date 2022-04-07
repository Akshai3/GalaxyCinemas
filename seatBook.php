<html>

<head>
<?php session_start();
if ($_SESSION['id']== session_id())
{
$source = $_SESSION["select1"];
$destination =  $_SESSION["select2"];
$user = $_SESSION["user"];
include "database.php";
$query = "SELECT `seats` FROM `tbl_seats` WHERE rfrom = '$source' and rto = '$destination' and status = 1 ORDER BY seat ASC";
$result1 = mysqli_query($conn, $query);
include "header.php";
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
  <div id="seating_premium">

    Premium-Rs 250.0
    <hr>
    <br />

    <div id="premium">

        
    <?php
$q = array();
$j = 0;
$temp=0;
while ($row = mysqli_fetch_array($result1))
      {
		  
        $temp2=0;
        $q[$j] = $row['seat'];
        for($i=1;$i<=30;$i++)
        { 
          
          if($temp<$i)
          
          {

          
           if($i==$q[$j])
           {
            echo "<div><label class=contain>".$row['seat']."<input type=checkbox name=".$row['seat']." id=".$row['seat']." value =".$row['seat']." checked disabled><span class=checkmark></span></label></div>";    
              $temp=$i;  
              $temp2=1; 
              
                }
           else{
            echo "<div><label class=contain>".$i."<input type=checkbox name=".$i." id=".$i." value =".$i." onclick=setColor('".$i."');><span class=checkmark></span></label></div>";
          }
          if($temp2==1)
          {
          
          $count=$temp;
          break;
          }
         
        }
  
        }
       
        $j++;
        }
        for($z=$temp+1;$z<=30;$z++)
        {
          echo "<div><label class=contain>".$z."<input type=checkbox name=".$z." id=".$z." value =".$z." onclick=setColor('".$z."');><span class=checkmark></span></label></div>";

        }       
        
?>
    </div>
  </div>
  <div id="seating_executive">
    Executive-Rs 180.0
    <hr>
    <br />
    <div id="executive">

      </span>
    </div>
    <div style="position:absolute;left:80px;top:215px;line-height: 58px;">
      A<br />
      B<br />
      C<br />

    </div>
    <div style="position:absolute;left:80px;top:450px;line-height: 58px;">
      D<br />E<br />F<br />G<br />H<br />I<br />J<br />K<br />L<br />M<br />N

    </div>
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
    <div class="bottomDock">
    <a href="process_booking.php">
        <button id="book" onclick="next_page()">Book Tickets</button>
      </a>
    </div>

</body>

</html>