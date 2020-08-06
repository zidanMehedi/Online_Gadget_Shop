<?php

session_start();
require_once '../db/SellerFunctions.php';


if (isset($_POST['cat'])) {
	$cat = $_POST['cat'];

	if (empty($cat)) {
		// valadation need
	}
	else
	{

		if ($cat==0) {
			echo '<option>Select SubCategory</option>';
		}
		else
		{
			$data = getSubCategory($cat);
		while ($row=mysqli_fetch_assoc($data)) {
			echo "
					<option value='".$row['subcat_id']."'>".$row['subcat_name']."</option>
			";
		}
		}
		
	}
}



?>