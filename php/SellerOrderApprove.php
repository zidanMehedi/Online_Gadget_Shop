<?php 
require_once '../db/SellerFunctions.php';

if (isset($_POST['appID'])) {
	$ID = $_POST['appID'];
	$profit = 0;


	if (empty($ID)) {
		echo "<script>alert('NULL submission')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
	}
	else
	{
		$status = order_approve($ID);
		if ($status) {
			echo "Order Approved";
			$unique = '#'.str_replace(".","",microtime(true)).rand(000,999);
			$order = orderDestails($ID);
			$sp1 = explode(',', $order);
			for ($i=0; $i < count($sp1); $i++) { 
				$sp2[$i] = explode(':', $sp1[$i]);
			}
			for ($i=0; $i <count($sp2) ; $i++) { 
				for ($j=0; $j < count($sp1[$i]); $j++) { 
					if ($j==count($sp2[$i])-1) {
						break;
					}
					$profit+=profitCount($sp2[$i][$j],$sp2[$i][$j+1]);
				}
			}

			$status2 = report_add($unique,date("Y-m-d"),$profit,$ID);

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