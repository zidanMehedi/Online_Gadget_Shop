<?php 
require_once '../db/SellerFunctions.php';

if (isset($_POST['appID'])) {
	$ID = $_POST['appID'];

	if (empty($ID)) {
		echo "NULL submission";
	}
	else
	{
		$status = order_deliver($ID);
		if ($status) {
			echo "Order Delivered";
		}
		else
		{
			echo "Something Wrong";

		}
	}
}
else
{
	header('Location:../view/SellerHome.php');
}

?>