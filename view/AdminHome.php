<?php
	session_start();
	
	if ($_SESSION['username']  AND $_COOKIE['username']) {
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/Navigate.css">
</head>
<body style="background-color: CornflowerBlue; margin: 0;">

	<div style="background-color: DodgerBlue; padding: 20px; text-align: center;">
		<marquee scrolldelay="1" behavior="alternate"><h1 style="font-family:Cursive; color: DarkBlue">Welcome To Admin Panel</h1></marquee>
	</div>

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


	<div style="width: 15%; margin-top: 2.5%; margin-left: 5%">
		<a href="AdminAddProduct.php" class="a1">Add Product</a>
		<a href="AdminAddUser.php" class="a1">Add User</a>
		<a href="AdminGenerateReport.php" class="a1">Generate Report</a>
		<a href="AdminGeneratePromoCode.php" class="a1">Generate Promo</a>
		<a href="AdminProfileView.php" class="a1">My Profile</a>
	</div>

	<div style="background-color: DodgerBlue; padding: 5px; text-align: center; margin-top: 2.5%">
		<p style="text-align: right; font-weight: bold;">Username: <?php echo $_SESSION['username']; ?></p>
		
		<p style="text-align: right; font-weight: bold;">Last Login Time: <?php echo $_SESSION['time']; ?></p>
	</div>
</body>
</html>


<?php
	}else{
		header('location: ../adminLogin.php');
		echo "You are not Admin";
	}

?>

