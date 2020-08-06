<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';

if(isset($_POST['del']))
	$ID = $_POST['del'];
	
	if (empty($ID)) {
		echo "Null ID";
	}
	else
	{
		$status=deleteProduct($ID);
		if ($status) {
			echo "<script>alert('Product Deleted')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
		}
		else
		{
			echo "<script>alert('Something wrong')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
		}
	}
?>