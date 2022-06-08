<?php
session_start();
include('connect.php');

$qry2 = mysqli_query($con, "select * from tbl_bookings where ticket_id= '" . $_GET['id2'] . "' ");
$rec = mysqli_fetch_array($qry2);
$ticketid = $rec['ticket_id'];
$uid = $rec['user_id'];
$tid = $rec['t_id'];
$sid = $rec['show_id'];
$shtid = $rec['show_time_id'];

$qry8 = mysqli_query($con, "select Distinct ticket_date from tbl_bookings where ticket_id= '" . $_GET['id2'] . "' ");
$rec8 = mysqli_fetch_array($qry8);
$tdate = $rec8['ticket_date'];

$qry3 = mysqli_query($con, "select * from tbl_theatre where id= '$tid' ");
$rec3 = mysqli_fetch_array($qry3);
$tname = $rec3['name'];

$qry4 = mysqli_query($con, "select * from registration where uid= '$uid' ");
$rec4 = mysqli_fetch_array($qry4);
$name = $rec4['uname'];

$qry5 = mysqli_query($con, "select * from tbl_shows where s_id= '$sid' ");
$rec5 = mysqli_fetch_array($qry5);
$moid = $rec5['movie_id'];

$qry6 = mysqli_query($con, "select * from tbl_movie where movie_id= '$moid' ");
$rec6 = mysqli_fetch_array($qry6);
$moname = $rec6['movie_name'];

$qry7 = mysqli_query($con, "select * from tbl_show_time where st_id= '$shtid' ");
$rec7 = mysqli_fetch_array($qry7);
$shname = $rec7['name'];
$sttime = $rec7['start_time'];
$scid = $rec7['screen_id'];

$qry7 = mysqli_query($con, "select * from tbl_screens where screen_id= '$scid' ");
$rec7 = mysqli_fetch_array($qry7);
$scname = $rec7['screen_name'];

$selectSeatNumberSql = "select seatNumber,seatType from tbl_bookings where ticket_id='" . $_GET['id2'] . "'";
$selectSeatNumberResult = mysqli_query($con, $selectSeatNumberSql);
$seatNumber = "";
$seatType = "";
while ($selectSeatNumberRow = mysqli_fetch_array($selectSeatNumberResult)) {
    $seatNumber .= $selectSeatNumberRow['seatType'] . ":" . $selectSeatNumberRow['seatNumber'] . ",";
}
$seatNumber = rtrim($seatNumber, ",");
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

        .watch_but {
            display: inline-block;
            background: #db9603;
            position: relative;
            border-radius: 2px;
            font-size: 13px;
            line-height: 11px;
            color: #fff;
            border-bottom: 1px solid #db9603;
            border-right: 1px solid #db9603;
            margin-left: 45%;
            padding: 12px 14px 9px 10px;
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="wrap">
            <div class="content-top">
                <div class="section group">

                    <div class="box" id='DivIdToPrint'>


                        <table>
                            <tr>
                                <td>Date</td>
                                <td> <input type='text' name='date' value="<?php echo (new DateTime())->format('Y-m-d'); ?>" readonly> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <b>Bill to</b>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td> <input type='text' name='name' value="<?php echo $name; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td> <input type='text' name='phone' value="<?php echo $rec4['phno']; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <b>Ticket Details </b>
                                </td>
                            </tr>
                            <tr>
                                <td>Ticket Id</td>
                                <td> <input type='text' name='item1name' value="<?php echo $rec['ticket_id']; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Movie</td>
                                <td> <input type='text' name='item1name' value="<?php echo $moname; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Theatre</td>
                                <td> <input type='text' name='item1name' value="<?php echo $tname; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Screen</td>
                                <td> <input type='text' name='item1name' value="<?php echo $scname; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Show</td>
                                <td> <input type='text' name='item1name' value="<?php echo $shname; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td> <input type='text' name='item1name' value="<?php echo date('h:i A', strtotime($sttime)); ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Total Seats</td>
                                <td> <input type='text' name='item1name' value="<?php echo $rec['no_seats']; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Seat NO</td>
                                <td>
                                    <textarea name="item1name" id="item1name" readonly><?php echo $seatNumber; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td> <input type='text' name='item1amount' value="<?php echo $rec['amount']; ?>" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Movie Date</td>
                                <td> <input type='text' name='date' value="<?php echo $tdate ?>" readonly> </td>
                            </tr>

                        </table>
                    </div>

                    <input type=button class="watch_but" id='btn' value='Print' onclick='printDiv();' readonly />



                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

</body>

</html>
<script type="text/javascript">
    function printDiv() {

        var divToPrint = document.getElementById('DivIdToPrint');

        var newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

        newWin.document.close();

        setTimeout(function() {
            newWin.close();
        }, 10);

    }
</script>