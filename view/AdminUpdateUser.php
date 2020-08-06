<?php 
	require_once('../db/AdminUserFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	
		if (isset($_GET['id'])) {
			$data =singleUser($_GET['id']);
			$rows = mysqli_fetch_assoc($data);
			$_SESSION['uid'] = $rows['id'];
			$fullname = $rows['fullname'];
			$fl = explode('  ', $fullname);
			$t = $rows['eid'];
		}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
	<link rel="stylesheet" type="text/css" href="../css/Navigate.css">
	<link rel="stylesheet" type="text/css" href="../css/Design.css">
	<script type="text/javascript" src="../js/AdminScript.js"></script>
</head>
<body style="background-color: CornflowerBlue; margin: 0;">

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
	<form method="POST" action="../php/AdminUpdateUserCheck.php" enctype="multipart/form-data">
		<table align="center" bgcolor="CornflowerBlue" cellspacing="30px">
			<tr>
				<td colspan="4">
					<center>
						<h1><font color="DarkBlue" face="Cursive"><u>Update User</u></font></h1>
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
					User ID:
				</td>
				<td>
					<input type="text" name="uid" value="<?php echo $_SESSION['uid']; ?>" disabled>
				</td>
				<td>
					First Name:
				</td>
				<td>
					<input type="text" name="upfname" placeholder="Enter First Name" id="fname" onkeyup="validateFName()" value="<?php echo $fl[0]; ?>">
					<div id="erfname" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Last Name:
				</td>
				<td>
					<input type="text" name="uplname" placeholder="Enter Last Name" id="lname" onkeyup="validateLName()" value="<?php echo $fl[1]; ?>">
					<div id="erlname" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					Username:
				</td>
				<td>
					<input type="text" name="upuname" placeholder="Enter Username" id="uname" onkeyup="validateUName()" value="<?php echo $rows['username']; ?>">
					<div id="eruname" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Email:
				</td>
				<td>
					<input type="text" name="upemail" placeholder="Enter User Email" id="email" onkeyup="validateEmail()" value="<?php echo $rows['email']; ?>">
					<div id="eremail" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					User Type:
				</td>
				<td>
					<select name="uputype" id="utype" onchange="validateUserType()">
						<option value="" <?php if ($t == "") {
							echo "selected";
						} ?>>Select Type</option>
						<option value="1" <?php if ($t == 1) {
							echo "selected";
						} ?>>Admin</option>
						<option value="2" <?php if ($t == 2) {
							echo "selected";
						} ?>>Seller</option>
					</select>
					<div id="erutype" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type="Password" name="upupass" placeholder="Enter Password" id="upass" onkeyup="validatePassword()" value="<?php echo $rows['password']; ?>">
					<div id="erupass" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					Confirm Password:
				</td>
				<td>
					<input type="Password" name="upucpass" placeholder="Enter Confirm Password" id="ucpass" onkeyup="validateCpass()"  value="<?php echo $rows['password']; ?>">
					<div id="erucpass" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Image:
				</td>
				<td>
					<input type="file" name="upuimage" accept="image/x-png,image/jpeg,image/jpg">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Update User">
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