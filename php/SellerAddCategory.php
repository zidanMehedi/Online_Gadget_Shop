<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';
$token="";
if (isset($_POST['submit'])) {
	$cat = $_POST['cat'];
	$data = getCatageory();
	$vn = validUserName($cat);

	if (empty($cat)) {
		echo "<script>alert('Null submission')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
	}
	else
	{
		while ($row=mysqli_fetch_assoc($data)) {
			if ($row['cat_name']==$cat) {
				$token = 0;
				break;

			}
			else
			{
				$token=1;
			}
		}

		if ($token==1) {
			if (strlen($cat)==$vn) {
						$status = categoryAdd($cat);
					if ($status) {
						echo "<script>alert('Category Added')</script>";
						echo "<script>window.location='../view/SellerHome.php';</script>";
					}
					else
					{
						echo "<script>alert('Something Wrong')</script>";
						echo "<script>window.location='../view/SellerHome.php';</script>";
					}
			}
			else
			{
				echo "<script>alert('Invalid Category Name')</script>";
						echo "<script>window.location='../view/SellerHome.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Category Already added')</script>";
				echo "<script>window.location='../view/SellerHome.php';</script>";
		}



	}
}
else
{
	header('Location:../view/SellerHome.php');
}


 ?>