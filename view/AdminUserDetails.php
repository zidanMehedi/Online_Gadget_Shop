<?php 
	require_once('../db/AdminUserFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
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
		
		<input type="text" name="searchkey" placeholder="Search User By Name or Type or Email" size="50" id="skey" onkeyup="getUserBySearch()" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 47 && event.charCode < 58) || (event.charCode ==32) || (event.charCode ==46) || (event.charCode ==64)">
	</center>
	
	<div id="userdata">
		<table width="100%" cellspacing="20px" style="margin-top: 2.5%">
			<tr>
				<th>User ID</th>
				<th>Username</th>
				<th>Email</th>
				<th>Full Name</th>
				<th>Image</th>
				<th>User Type</th>
				<th colspan="2">Operation</th>
			</tr>

			<?php 

				$result = getUserDetails();
				while ($rows = mysqli_fetch_assoc($result)) {

			?>

			<tr align="center">
				<td><?php echo $rows['id']; ?></td>
				<td><?php echo $rows['username']; ?></td>
				<td><?php echo $rows['email']; ?></td>
				<td><?php echo $rows['fullname']; ?></td>
				<td><img src="../upload/<?php echo $rows['image'];?>" width="150px" height="150px"></td>
				<td><?php echo $rows['type']; ?></td>
				<td><a href="AdminUpdateUser.php?id=<?php echo $rows['id']; ?>" class="a1">Update</a></td>
				<td><button class="btn" onclick="DeleteUser(<?php echo $rows['id']; ?>)">Delete</button></td>
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