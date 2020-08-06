<?php 
	require_once('../db/AdminProductFunction.php');
	session_start();

	if (isset($_SESSION['username']) && isset($_COOKIE['username'])) {	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
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
	
	<?php 

		$data = getCategoryLastId();

	 ?>
	<form method="POST" action="../php/AdminAddCategoryCheck.php">
		<table align="center" bgcolor="CornflowerBlue" cellspacing="30px">
			<tr>
				<td colspan="2">
					<center>
						<h1><font color="DarkBlue" face="Cursive"><u>Add Category</u></font></h1>
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
					Category ID:
				</td>
				<td>
					<input type="text" name="catid" size="27" value="<?php echo $data['cat_id']+1; ?>" disabled>
				</td>
			</tr>
			<tr>
				<td>
					Category Name:
				</td>
				<td>
					<input type="text" name="catname" placeholder="Enter Category Name" size="27" id="cate" onkeyup="validateCategoryName()">
					<div id="ercatname" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Add Category">
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