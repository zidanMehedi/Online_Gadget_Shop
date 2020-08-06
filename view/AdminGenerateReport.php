<?php 
	require_once('../db/AdminReportFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sales Report</title>
	<link rel="stylesheet" type="text/css" href="../css/Navigate.css">
	<link rel="stylesheet" type="text/css" href="../css/Design.css">
	<link rel="stylesheet" type="text/css" href="../css/Table.css">
	<script type="text/javascript" src="../js/AdminScript.js"></script>
</head>
<body>
	<div class="nav">

		<a href="AdminHome.php" class="a1">Home</a>

		<div class="dropdown">
			<button class="dropbtn">Products</button>
		    <div class="dropdown-content">
		    	<a href="AdminAddProduct.php">Add Product</a>
		    	<a href="AdminProductDetails.php">Product Details</a>
		    	<a href="AdminAddCategory.php">Add Category</a>
		    	<a href="AdminAddSubCategory.php">Add Sub-Category</a>
		  	</div>
		</div>

		<div class="dropdown">
			<button class="dropbtn">Manage Users</button>
		    <div class="dropdown-content">
		    	<a href="AdminAddUser.php">Add User</a>
		    	<a href="AdminUserDetails.php">User Details</a>
		    	<a href="AdminCustomerDetails.php">Customer Details</a>
		  	</div>
		</div>

		<div class="dropdown">
			<button class="dropbtn">Sales Report</button>
		    <div class="dropdown-content">
		    	<a href="AdminGenerateReport.php">Generate Report</a>
		  	</div>
		</div>

		<div class="dropdown">
			<button class="dropbtn">Promo Code</button>
		    <div class="dropdown-content">
		    	<a href="AdminGeneratePromoCode.php">Generate Promo Code</a>
		    	<a href="AdminPromoCodeDetails.php">Promo Code Details</a>
		  	</div>
		</div>

		<div class="dropdown">
			<button class="dropbtn">Profile</button>
		    <div class="dropdown-content">
		    	<a href="AdminProfileView.php">My Profile</a>
		    	<a href="AdminChangePassword.php">Change Password</a>
		    	<a href="../php/AdminLogout.php">Logout</a>
		  	</div>
		</div>
	</div>
	<center>
		<h1><font color="DarkBlue" face="Cursive"><u>Sales Report</u></font></h1><br>
		<strong>Starting Date:</strong> &ensp;
		<input type="date" name="sdate" id="sdate"> &emsp;		
		<strong>Ending Date:</strong> &ensp;				
		<input type="date" name="edate" id="edate">	<br><br>
		<button class="btn" onclick="generateReport()">Generate Report</button>
		<div style="color: red;font-weight: bold;">
			<?php 
				if (isset($_GET['msg'])) {
					echo $_GET['msg'].'<br><br>';
				}
			?>
		</div>
	</center>

	<div id="reportdata">
		<table width="100%" cellspacing="20px" style="margin-top: 2.5%">
			<tr>
				<th>Report ID</th>
				<th>Transaction ID</th>
				<th>Transaction Date</th>
				<th>Profit</th>
				<th>Order No</th>
			</tr>

			<?php 

				$result = getRportDetails();
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
			
		</table>
	</div>
</body>
</html>

<?php
	}else{
		header('location: ../adminLogin.php');
	}
?>