<?php 
	require_once('../db/AdminProductFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	
		
?>
  
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="../css/Navigate.css">
	<link rel="stylesheet" type="text/css" href="../css/Design.css">
	<script type="text/javascript" src="../js/AdminScript.js"></script>
	<script type="text/javascript" src="../js/jquery-3.4.1.js"></script>
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
		
		/*foreach($rows as $data)
		{
			 $category .= '<option value="'.$data["cat_name"].'">'.$data["cat_name"].'</option>';
		}
*/
		while ($rows = mysqli_fetch_assoc($result)) {
			$category .= '<option value="'.$rows["cat_name"].'">'.$rows["cat_name"].'</option>';
		}

		$data = getProductLastId();
	 ?>
	<form method="POST" action="../php/AdminAddProductCheck.php" enctype="multipart/form-data">
		<table align="center" bgcolor="CornflowerBlue" cellspacing="30px">
			<tr>
				<td colspan="4">
					<center>
						<h1><font color="DarkBlue" face="Cursive"><u>Add Product</u></font></h1>
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
					Product ID:
				</td>
				<td>
					<input type="text" name="pid" value="<?php echo $data['pid']+1; ?>" disabled>
				</td>
				<td>
					Product Name:
				</td>
				<td>
					<input type="text" name="pname" placeholder="Enter Product Name" id="valpname" onkeyup="validateName()">
					<div id="erpname" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Category:
				</td>
				<td>
					<select name="pcat" id="cat" onchange="getSubCategory()" onclick ="validateCategory()">
						<option value="">Select Category</option>
						<?php echo $category; ?>
					</select>
					<div id="ercat" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					Sub-Category:
				</td>
				<td>
					<select name="subcat" id="sub">
						<option value="">Select Sub-Category</option>
						
					</select>
					
				</td>
			</tr>
			<tr>
				<td>
					Quantity:
				</td>
				<td>
					<input type="number" name="quantity" placeholder="Enter Quantity" id="pquan" onclick="validateQuantity()" onkeyup="validateQuantity()" min="0">
					<div id="erquan" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					Buying Price:
				</td>
				<td>
					<input type="number" name="buyprice" placeholder="Enter Buying Price" step="0.01" id="pbuy" onclick="validateBuyingPrice()" onkeyup="validateBuyingPrice()" min="0">
					<div id="erbuy" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Selling Price:
				</td>
				<td>
					<input type="number" name="sellprice" placeholder="Enter Selling Price" step="0.01" min="0" id="psel" onclick="validateSellingPrice()" onkeyup="validateSellingPrice()">
					<div id="ersel" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					Incoming Date:
				</td>
				<td>
					<input type="date" name="incomedate" id="pin" onclick="validateIncomedate()" onchange="validateIncomedate()" onkeyup="validateIncomedate()" min="2001-01-01" max="2400-12-31">
					<div id="erin" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Description:
				</td>
				<td colspan="3">
					<textarea placeholder="Enter Product Description" name="describe" cols="70" id="pdes" onkeyup="validateDescription()"></textarea>
					<div id="erdes" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					Activity:
				</td>
				<td>
					<select name="act" id="pact" onchange="validateActivity()">
						<option value="">Select Activity</option>
						<option value="Available">Available</option>
						<option value="Sold-Out">Sold-Out</option>
					</select>
					<div id="eract" style="color: red;font-weight: bold;"></div>
				</td>
				<td>
					Image:
				</td>
				<td>
					<input type="file" name="pimage" accept="image/x-png,image/jpeg,image/jpg" id="pimg" onclick="validateFile()">
					<div id="erimg" style="color: red;font-weight: bold;"></div>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="Add Product">
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