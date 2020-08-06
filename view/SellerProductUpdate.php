<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';
if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {
	if (is_numeric($_POST['edit'])) {
		$ID = $_POST['edit'];
		
		if (empty($_POST['edit'])) {
			echo "<script>alert('NUll ID')</script>";
		}
		else
		{
			$_SESSION['PID'] = $ID;
			$data = GetProductData($ID);
			while ($row=mysqli_fetch_assoc($data)) {
				$name = $row['name'];
				$qunt = $row['quantity'];
				$sPrice = $row['selling_price'];
				$bPrice = $row['buying_price'];
				$desc = $row['description'];
				$cat = $row['cat_id'];
				$subcat = $row['subcat_id'];
				$image = $row['image'];
				$act = $row['activity'];
				$_SESSION['pImg'] = $row['image'];
				$date = $row['incoming_date'];
		}
	}
}

?>

<script type="text/javascript" src="../js/SellerScript.js"></script>
<br><br>
<center>
	<h1>Product Update</h1>
	<form method="POST" action="../php/SellerUpdateProduct.php" enctype="multipart/form-data">
		<table border="1" width="40%">
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" id="name" onclick="Pname()" onkeyup="Pname()" value="<?=$name;?>"></td><b id="Ne" style="color: red"></b>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" id="qntity" onclick="Pquantity()" onkeyup="Pquantity()" name="quantity" value="<?=$qunt;?>"></td><b id="Qe" style="color: red"></b>
			</tr>
			<tr>
				<td>Buying price</td>
				<td><input type="text" name="bPrice" onclick="Pbuy()" onkeyup="Pbuy()" id="bp" value="<?=$bPrice?>"></td></td><b id="Be" style="color: red"></b>
			</tr>
			<tr>
				<td>Selling price</td>
				<td><input type="text" id="sp" onclick="Psell()" onkeyup="Psell()" name="sPrice" value="<?=$sPrice;?>"></td></td><b id="Se" style="color: red"></b>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="desc" onclick="Pdesc()" onkeyup="Pdesc()"><?=$desc;?></textarea></td></td><b id="Dse" style="color: red"></b>
			</tr>
			<tr>
				<td>Incoming Date</td>
				<td><input type="date" id="date" onclick="Pdate()" onchange="Pdate()" name="date" value="<?=$date;?>"></td></td><b id="De" style="color: red"></b>
			</tr>
			<tr>
				<td>Category</td>
				<td>
					<select name="cat" id="cat" onclick="Pcat()" onchange="getSubCat();Pcat()">
						<?php 
							$getCat = getCatageory();
							$s = '';
							
							while ($icat=mysqli_fetch_assoc($getCat)) {
								if ($icat['cat_id']==$cat) {
									$s='selected';
								}
								else
								{
									$s = '';
								}
								echo "
								<option value='".$icat['cat_id']."' ".$s." >".$icat['cat_name']."</option>
								";
							}

						 ?>
					</select>
				</td></td><b id="Ce" style="color: red"></b>
			</tr>
			<tr>
				<td>Sub-Category</td>
				<td>
					<select name="subcat" id="sub">
					<?php 
						$sel = "";
						$getSubcat = getSubCategory($cat);
						while ($isubcat=mysqli_fetch_assoc($getSubcat)) {
							if ($isubcat['subcat_id']==$subcat) {
								$sel ='selected';
							}
							else
							{
								$sel='';
							}

							echo "
								<option value='".$isubcat['subcat_id']."' ".$sel." >".$isubcat['subcat_name']."</option>

							";
						}

					 ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="image"><img src="../upload/<?=$image;?>" wigth="100" height="100"></td>
			</tr>
			<tr>
				<td>Activity</td>
				<td>
					<select name="activity">

						<option value="1" <?php if ($act==1)
						{echo "selected";} ?>
							
						>Active</option>
						<option value="0"

						<?php if ($act==0)
						 {echo "selected";} ?>
							
						>Inactive</option>
					</select>
				</td>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="update" id="addP"></td>
				</tr>
			</tr>
		</table>
	</form>
</center>


<?php 

}
else

{
	header('Location:../php/SellerHome.php');
}

?>