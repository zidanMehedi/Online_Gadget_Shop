<?php
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';
if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {

$data = getCatageory();

?>


<script type="text/javascript" src="../js/SellerScript.js"></script>
<script type="text/javascript" src="../js/SellerValid.js"></script>
<style type="text/css">
	#subcatT
	{
		width: 30%;
  border-collapse: collapse;
  text-align: center;
  color: black;
	}
	th,td {
  height: 50px;
  border: 2px solid black;
}
</style>


<center>
	<h1>Add SubCategory</h1>
	<form method="POST" action="../php/SellerAddSubCategory.php">
		<table border="1" width="22%" id="subcatT">
			<tr>
				<td>Category Name:</td>
				<td>
					<select name="cat" id="cat" onclick="cateValid()" onchange="cateValid()">
						<option value="">Select Category</option>
						<?php 

							while ($row=mysqli_fetch_assoc($data)) {
								echo "

									<option value='".$row['cat_id']."'>".$row['cat_name']."</option>

								";
							}

						 ?>
					</select>


				</td><b id="Ce" style="color: red"></b>
			</tr>
			<tr>
				<td>Sub-Category Name:</td>
				<td><input type="text" name="subcat" id="subcat" onclick="subcarValid()" onkeyup="subcarValid()"></td><b id="sCe" style="color: red"></b>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Add" id="addP"></td>
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