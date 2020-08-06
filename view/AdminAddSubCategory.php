<?php 
	require_once('../db/AdminProductFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Sub-Category</title>
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
		$category = "";
		$result = getAllCategory();
		while ($rows = mysqli_fetch_assoc($result)) {
			$category .= '<option value="'.$rows["cat_name"].'">'.$rows["cat_name"].'</option>';
		}

		$data = getSubCategoryLastId();

	 ?>
	<form method="POST" action="../php/AdminAddSubCategoryCheck.php">
		<table align="center" bgcolor="CornflowerBlue" cellspacing="30px">
			<tr>
				<td colspan="2">
					<center>
						<h1><font color="DarkBlue" face="Cursive"><u>Add Sub-Category</u></font></h1>
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
					Sub-Category ID:
				</td>
				<td>
					<input type="text" name="catid" size="27" value="<?php echo $data['subcat_id']+1; ?>" disabled>
				</td>
			</tr>
			<tr>
				<td>
					Sub-Category Name:
				</td>
				<td>
					<input type="text" name="subcatname" placeholder="Enter Category Name" size="27" id="subcat" onkeyup="validateSubCategoryName()">
					<div id="ersubcatname" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Category:
				</td>
				<td>
					<select name="cat">
						<option value="">Select Category</option>
						<?php echo $category; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Add Sub-Category">
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