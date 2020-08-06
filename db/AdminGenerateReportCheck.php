<?php 
	require_once('AdminReportFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	

		$sdate = $_POST['stdate'];
		$edate = $_POST['endate'];

		if (empty($sdate) || empty($edate)) {
			echo "Date range is empty";
		}else{
			if ($sdate>$edate) {
				echo "Date range is not valid";
			}else{
				$stat = generateReport($sdate,$edate);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="100%" cellspacing="20px" style="margin-top: 2.5%" id="rgen">
		<tr>
			<th>Report ID</th>
			<th>Transaction ID</th>
			<th>Transaction Date</th>
			<th>Profit</th>
			<th>Order No</th>
		</tr>

		<?php 
			$pro = getTotalProfit($sdate,$edate);
			$result = generateReport($sdate,$edate);
			while ($rows = mysqli_fetch_assoc($result)) {

		?>

		<tr align="center">
			<td><?php echo $rows['rid']; ?></td>
			<td><?php echo $rows['transaction_id']; ?></td>
			<td><?php echo $rows['transaction_date']; ?></td>
			<td><?php echo $rows['profit']; ?></td>
			<td><?php echo $rows['order_no']; ?></td>
			
		</tr>
		<?php } ?>
		<tr>
			<td colspan="5" align="center">
				<strong>Total Profit:&ensp;</strong><?php echo $pro['total_profit']; ?>
			</td>
		</tr>	
	</table>
	<center><br><br>
		<button class="btn" onclick="downloadReport()">Download PDF</button>
	</center>
</body>
</html>
<?php								
			}
		}
	}else{
		header('location: ../adminLogin.php');
	}
?>