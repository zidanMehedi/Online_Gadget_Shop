<?php
session_start();
error_reporting(0);
require_once '../db/SellerFunctions.php';
if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {
$act="";
?>
	<link rel="stylesheet" type="text/css" href="../css/SellerProduct.css">
	<script type="text/javascript" src="../js/SellerScript.js"></script>
	<center><h1>Product Details</h1></center>
	<div id="div1">
	<table border="1" width="50%" align="center">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Quantity</th>
		<th>Buying price</th>
		<th>Selling price</th>
		<th>Incoming Date</th>
		<th>Description</th>
		<th>Category</th>
		<th>Sub-Category</th>
		<th>Image</th>
		<th>Activity</th>
		<th>Action</th>
	</tr>
	<tbody>
		<?php 
			$data = product_details();
			while ($row=mysqli_fetch_assoc($data)) {
				if ($row['activity']==1) {
					$act="Active";
				}
				else
				{
					$act="Inactive";
				}
				echo 
				"<tr>
				<td align='center'><b>".$row['pid']."</b></td>
				<td align='center'>".$row['name']."</td>
				<td align='center'>".$row['quantity']."</td>
				<td align='center'>".$row['buying_price']."</td>
				<td align='center'>".$row['selling_price']."</td>
				<td align='center'>".$row['incoming_date']."</td>
				<td align='center'>".$row['description']."</td>
				<td align='center'>".$row['cat_name']."</td>
				<td align='center'>".$row['subcat_name']."</td>
				<td align='center'><img src='../upload/".$row['image']."' height='100' width='100'></td>
				<td align='center'>".$act."</td>

				<td align='center'><button id='edit' onclick='product_update(this.value);' name ='edit' value='".$row['pid']."'>Edit</button> &nbsp <button id='del' value='".$row['pid']."' name='del' onclick='deleteProduct(this.value)'>Delete</button></td>
				</tr>

				";
			}
		 ?>
		 </tbody>
</table>
</div>

<?php
}
else
{
	header('Location:../ControlPanel.php');
}


?>