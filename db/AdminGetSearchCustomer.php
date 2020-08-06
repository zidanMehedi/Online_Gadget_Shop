<?php 
	require_once('AdminUserFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	

		$searchkey = $_POST['cuskey'];
		
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="100%" cellspacing="20px" style="margin-top: 2.5%">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Date of Birth</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Billing Address</th>
		</tr>

		<?php 

			$result = getSearchCustomer($searchkey);
			while ($rows = mysqli_fetch_assoc($result)) {

		?>

		<tr align="center">
			<td><?php echo $rows['cid']; ?></td>
			<td><?php echo $rows['fullname']; ?></td>
			<td><?php echo $rows['email']; ?></td>
			<td><?php echo $rows['dob']; ?></td>
			<td><?php echo $rows['gender']; ?></td>
			<td><?php echo $rows['phone']; ?></td>
			<td><?php echo $rows['billing_address']; ?></td>
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