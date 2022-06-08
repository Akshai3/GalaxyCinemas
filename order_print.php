<?php
session_start();
include('connect.php');


$qry2 = mysqli_query($con, "select * from tbl_snackbook where order_id= '".$_GET['id2']."' ");
$rec = mysqli_fetch_array($qry2);
$orderid = $rec['order_id'];
$uid=$rec['user_id'];
$snackid=$rec['snackId'];

$qry3 = mysqli_query($con, "select * from tbl_snacks where snackId= '$snackid' ");
$rec3 = mysqli_fetch_array($qry3);
$snackname=$rec3['snackName'];

$qry4 = mysqli_query($con, "select * from registration where uid= '$uid' ");
$rec4 = mysqli_fetch_array($qry4);
$name=$rec4['uname'];
?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<div class="section group">

				<div id='DivIdToPrint'>

					
						<table>
							<tr>
								<td>Date</td>
								<td> <input type='text' name='date' value="<?php echo (new DateTime())->format('Y-m-d'); ?>" readonly> </td>
							</tr>
							<tr>
								<td>Customer ID</td>
								<td> <input type='text' name='custId' value="<?php echo $uid = $rec['user_id']; ?>" readonly /> </td>
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
								<td colspan=2>
									<b>Item </b>
								</td>
							</tr>
							<tr>
								<td>Name</td>
								<td> <input type='text' name='item1name'  value="<?php echo $snackname; ?>" readonly /> </td>
							</tr>
							<tr>
								<td>Quantity</td>
								<td> <input type='text' name='item1name'  value="<?php echo $qnt = $rec['itemQuantity']; ?>" readonly /> </td>
							</tr>
							<tr>
								<td>Amount</td>
								<td> <input type='text' name='item1amount'  value="<?php echo $rec['amount']; ?>" readonly /> </td>
							</tr>
							<tr>
								<td>Date</td>
								<td> <input type='text' name='date' value="<?php echo $rec['orderDate']; ?>"  readonly> </td>
							</tr>
				
				</table>
				</div>
				<input type=button id='btn' value='Print' onclick='printDiv();'readonly />



			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>