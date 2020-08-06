<?php 
	require_once('AdminProductFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	

		$searchkey = $_POST['skey'];
		
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../js/AdminScript.js"></script>
</head>
<body>
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

			$result = getSearchProduct($searchkey);
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

</body>
</html>




<?php
	}else{
		header('location: ../adminLogin.php');
	}
?>