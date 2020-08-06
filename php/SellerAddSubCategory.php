<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';
$flag="";
if (isset($_POST['submit'])) {
	$subcat = $_POST['subcat'];
	$cat = $_POST['cat'];
	$vn = validUserName($subcat);

	if (empty($subcat) || empty($cat)) {
		echo "<script>alert('Null submission')</script>";
		echo "<script>window.location='../view/SellerHome.php#profile';</script>";
	}
	else
	{
		$data = getSubCategory($cat);
		if ($data->num_rows!=0) {
			while ($row=mysqli_fetch_assoc($data)) {
			if ($row['subcat_name']==$subcat) {
				$flag=0;
				break;
			}
			else
			{
				$flag=1;
			}

		}
		}
		else
		{
			$flag=1;
		}
		
		
		if ($flag) {
				if (strlen($subcat)==$vn) {
					$status = subcategoryAdd($cat,$subcat);
					if ($status) {
						echo "<script>alert('Sub-Category Added')</script>";
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
					echo "<script>alert('Invalid Sub-Categoru Name')</script>";
						echo "<script>window.location='../view/SellerHome.php';</script>";
				}
		}
		else
		{
			echo "<script>alert('Same name sub-category already added under selected category')</script>";
			echo "<script>window.location='../view/SellerHome.php';</script>";
		}
	}

}
else
{
	header('Location: ../view/SellerHome.php');
}

 ?>