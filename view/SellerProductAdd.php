<?php
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';

if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {

?>
<script type="text/javascript" src="../js/SellerScript.js"></script>
<script type="text/javascript" src="../js/SellerValid.js"></script>
<style type="text/css">
	input
	{
		width: 100%;

	}
	table {
	  width: 40%;
	  border-collapse: collapse;
	  color: black;

}

th,td {
  height: 20px;
  border: 2px solid black;
}
</style>
<center>
	<h1>Add Product</h1>
	<form method="POST" action="../php/SellerAddProduct.php" enctype="multipart/form-data">
	<table border="1" width="30%">
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" id="name" onkeyup="Pname()" onclick="Pname()"></td><b id="Ne" style="color: red"></b>
		</tr><tr>
			<td>Quantity</td>
			<td><input type="text" name="quantity" id="qntity" onkeyup="Pquantity()" onclick="Pquantity()"></td><b id="Qe" style="color: red"></b>
		</tr><tr>
			<td>Incoming Date</td>
			<td><input type="date" name="date" id="date" onclick="Pdate()" onkeyup="Pdate()" onchange="Pdate()"></td><b id="De" style="color: red"></b>
		</tr><tr>
			<td>Buying Price</td>
			<td><input type="text" name="bPrice" id="bp" onclick="Pbuy()" onkeyup="Pbuy()"></td><b id="Be" style="color: red"></b>
		</tr><tr>
			<td>Selling Price</td>
			<td><input type="text" name="sPrice" id="sp" onkeyup="Psell()" onclick="Psell()"></td><b id="Se" style="color: red"></b>
		</tr><tr>
			<td>Description</td>
			<td><textarea name="desc" id="desc" onclick="Pdesc()" onkeyup="Pdesc()"></textarea style="width: 100%;"></td><b id="Dse" style="color: red"></b>
		</tr><tr>
			<td>Image</td>
			<td><input type="file" name="img" id="img" onclick="Pimg()" onchange="Pimg()"></td><b id="Ie" style="color: red"></b>
		</tr><tr>
			<td>Acivity</td>
			<td>
				<select name="active">
					<option value="1">Active</option>
					<option value="0">Inactive</option>
				</select>
			</td>
		</tr><tr>
			<td>Catrgory</td>
			<td>
				<select name="catrgory" id="cat" onchange="getSubCat();Pcat()" onclick="Pcat()">
					<option value="">Select Category</option>
				<?php
				$data = getCatageory();
				while ($row=mysqli_fetch_assoc($data)) {
					echo "
					<option value='".$row['cat_id']."'>".$row['cat_name']."</option>
					";
				}

				?>
				</select>
			</td><b id="Ce" style="color: red"></b>
		</tr><tr>
			<td>SubCatrgory</td>
			<td>
				<select name="subcat" id="sub">
					<option value="">Select SubCategory</option>
				</select>
			</td>
		</tr><tr>
			<td colspan="2" align="center"><br><input type="submit" name="submit" id="addP" style="width: 20%; background-color: white;"><br></td>
		</tr>
	</table>
	</form>
</center>









<?php 


}
else
{
	header('Location:../ControlPanel.php');
}

 ?>