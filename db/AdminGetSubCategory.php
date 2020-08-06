<?php 

	require_once('../db/adminDB.php');

	$catname = $_POST['key'];
	$conn = getConnection();
	$sql1 = "select cat_id from category where cat_name = '{$catname}'";
	$result1 = mysqli_query($conn,$sql1);
	$catid = mysqli_fetch_assoc($result1);
	$id = $catid['cat_id'];

	$subcategory = "";

	$sql2 = "select * from subcategory where cat_id = '{$id}'";
	$result2 = mysqli_query($conn,$sql2);

	while ($rows = mysqli_fetch_assoc($result2)) {
			$subcategory .= "<option value={$rows["subcat_name"]}>{$rows["subcat_name"]}</option>";
		}

	echo $subcategory;

 ?>