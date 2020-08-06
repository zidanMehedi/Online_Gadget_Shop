<?php 
	require_once('../db/AdminPromoFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Promo Code Details</title>
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
		<h1><font color="DarkBlue" face="Cursive"><u>User Details</u></font></h1><br>
		<div style="color: red;font-weight: bold;">
			<?php 
				if (isset($_GET['msg'])) {
					echo $_GET['msg'].'<br><br>';
				}
			?>
		</div>
		<input type="text" name="searchkey" placeholder="Search Promo Code By ID or Discount or Customer ID or Customer Phone" size="70" id="pskey" onkeyup="getPromoBySearch()"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 47 && event.charCode < 58) || (event.charCode ==32) || (event.charCode ==46)">

	</center>
		
	<div id="promodata">
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

				$result = getPromoCodeDetails();
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
	</div>
				
</body>
</html>

<?php
	}else{
		header('location: ../adminLogin.php');
	}
?>