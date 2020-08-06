<?php 
	require_once('AdminPromoFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	

		$searchkey = $_POST['pkey'];
		
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="100%" cellspacing="20px" style="margin-top: 2.5%">
		<tr>
			<th>Promo Code ID</th>
			<th>Promo Code</th>
			<th>Discount Amount</th>
			<th>Validity</th>
			<th>Status</th>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Customer Phone</th>
			<th colspan="2">Operation</th>
		</tr>

		<?php 

			$result = getSearchPromo($searchkey);
			while ($rows = mysqli_fetch_assoc($result)) {

		?>

		<tr align="center">
			<td><?php echo $rows['did']; ?></td>
			<td><?php echo $rows['promo_code']; ?></td>
			<td><?php echo $rows['amount']; ?></td>
			<td><?php echo $rows['validity']; ?></td>
			<td><?php echo $rows['status']; ?></td>
			<td><?php echo $rows['cid']; ?></td>
			<td><?php echo $rows['fullname']; ?></td>
			<td><?php echo $rows['phone']; ?></td>
			<td><a href="AdminEnableOrDisablePromoCode.php?id=<?php echo $rows['did']; ?>" class="a1">Update</a></td>
			<td><button class="btn" onclick="DisablePromo(<?php echo $rows['did']; ?>)">Disable</button></td>
		</tr>
		<?php } ?>
			
	</table>
</body>
</html>


<?php
	}else{
		header('location: ../adminLogin.php');
	}
?>