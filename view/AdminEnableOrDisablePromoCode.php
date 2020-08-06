<?php 
	require_once('../db/AdminPromoFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	
		if (isset($_GET['id'])) {
			$data =singlePromo($_GET['id']);
			$rows = mysqli_fetch_assoc($data);
			$_SESSION['promo'] = $rows['did'];
			
		}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Enable/Disable Promo Code</title>
	<link rel="stylesheet" type="text/css" href="../css/Navigate.css">
	<link rel="stylesheet" type="text/css" href="../css/Design.css">
	<script type="text/javascript" src="../js/AdminScript.js"></script>
</head>
<body style="background-color: CornflowerBlue;">
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
	<form method="POST" action="../php/AdminPromoCodeUpdateCheck.php">
		<table align="center" bgcolor="CornflowerBlue" cellspacing="30px">
			<tr>
				<td colspan="4">
					<center>
						<h1><font color="DarkBlue" face="Cursive"><u>Update Promo Code</u></font></h1>
						<div style="color: red;font-weight: bold;">
							<?php 
								if (isset($_GET['msg'])) {
									echo $_GET['msg'].'<br><br>';
								}
							?>
						</div>
					</center>
				</td>
			</tr>
			<tr>
				<td>
					Promo Code ID:
				</td>
				<td>
					<input type="text" name="prid" value="<?php echo $_SESSION['promo']; ?>" disabled>
				</td>
				<td>
					Promo Code:
				</td>
				<td>
					<input type="text" name="prname" value="<?php echo $rows['promo_code'] ?>" disabled>
				</td>
			</tr>
			<tr>
				<td>
					Amount of Discount:
				</td>
				<td>
					<input type="text" name="dis" placeholder="Enter Discount Amount in %" id="pdis" onkeyup="validateDiscount()" value="<?php echo $rows['amount']; ?>">
					<div id="erpdis" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					Validity:
				</td>
				<td>
					<input type="date" name="prval" id="prdate" min="2001-01-01" max="2400-12-31" onclick="validatePromoDate()" onkeyup="validatePromoDate()" value="<?php echo $rows['validity']; ?>"> 
					<div id="erprdate" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Status:
				</td>
				<td>
					<select name="prstat" id="prstat" onchange="validatePromoStatus()">
						<option value="" <?php if ($rows['status'] == "") {
							echo "selected";
						} ?> >Select Status</option>
						<option value="Enable" <?php if ($rows['status'] == "Enable") {
							echo "selected";
						} ?>>Enable</option>
						<option value="Disable" <?php if ($rows['status'] == "Disable") {
							echo "selected";
						} ?>>Disable</option>
					</select>
					<div id="erprstat" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					Customer ID:
				</td>
				<td>
					<input type="text" name="cid" value="<?php echo $rows['cid']; ?>" disabled>
					
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Update Promo">
				</td>
				<td >
					<input type="reset" name="reset" value="Reset">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
	}else{
		header('location: ../adminLogin.php');
	}
?>