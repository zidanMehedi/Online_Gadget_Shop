<?php 
	require_once('../db/AdminProductFunction.php');
	session_start();

	if (isset($_SESSION['username']) && isset($_COOKIE['username'])) {	
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product Details</title>
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
		<h1><font color="DarkBlue" face="Cursive"><u>Product Details</u></font></h1><br>
		<div style="color: red;font-weight: bold;">
			<?php 
				if (isset($_GET['msg'])) {
					echo $_GET['msg'].'<br><br>';
				}
			?>
		</div>
		
		<input type="text" name="searchkey" placeholder="Search Product By Name" size="50" id="key" onkeyup="getProductBySearch()" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 47 && event.charCode < 58) || (event.charCode ==32) || (event.charCode ==46) || (event.charCode ==40) ||(event.charCode ==41)">
	</center>
	
	<div id="select">
		<table width="100%" cellspacing="20px" style="margin-top: 2.5%">
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Category</th>
				<th>Sub-Category</th>
				<th>Quantity</th>
				<th>Incoming Date</th>
				<th>Buying Price</th>
				<th>Selling Price</th>
				<th>Description</th>
				<th>Image</th>
				<th>Activity</th>
				<th colspan="2">Operation</th>
			</tr>

			<?php 

				$result = getAllProduct();
				while ($rows = mysqli_fetch_assoc($result)) {

				$des = explode('.', $rows['description']);
				$fdes = "";
				$i = 0;
				while ($des[$i] != "") {
					$fdes .= $des[$i]."<br>";
					$i++;
				}

			?>

			<tr align="center">
				<td><?php echo $rows['pid']; ?></td>
				<td><?php echo $rows['name']; ?></td>
				<td><?php echo $rows['cat_name']; ?></td>
				<td><?php echo $rows['subcat_name']; ?></td>
				<td><?php echo $rows['quantity']; ?></td>
				<td><?php echo $rows['incoming_date']; ?></td>
				<td><?php echo $rows['buying_price']; ?></td>
				<td><?php echo $rows['selling_price']; ?></td>
				<td><?php echo $fdes; ?></td>
				<td><img src="../upload/<?php echo $rows['image'];?>" width="150px" height="150px"></td>
				<td><?php if ($rows['activity']==1) {
							echo "Available";
						  }else{
							echo "Sold-Out";
						} ?>
				</td>
				<td><a href="AdminUpdateProduct.php?pid=<?php echo $rows['pid']; ?>" class="a1">Update</a></td>
				<td><button class="btn" onclick="DeleteProduct(<?php echo $rows['pid']; ?>)">Delete</button></td>
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