<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';

$img='';
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$qntity = $_POST['quantity'];
	$inDate = $_POST['date'];
	$bprice= $_POST['bPrice'];
	$sprice = $_POST['sPrice'];
	$desc = $_POST['desc'];
	$img = $_FILES['img'];
	$activity = $_POST['active'];
	$subCat = $_POST['subcat'];
	$cat = $_POST['catrgory'];
	$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
	$file = rand().'.'.$ext;
	$vn = validUserName($name);


	if (empty($name) || empty($qntity) || empty($inDate) || empty($bprice) || empty($sprice) || empty($desc) || empty($img) || empty($activity)|| empty($cat) || empty($subCat)) {
		echo "<script>alert('Null submission')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
	}

	else
	{
		if (is_numeric($qntity) OR is_numeric($bPrice) OR is_numeric($sPrice)) {
			if (($qntity<0) OR ($bprice<0) OR ($sprice<0)) {
			echo "<script>alert('Value can't be negative')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
		}
		else
		{

			if (strlen($name)==$vn) {
				if(dupPNameCheck($name)==NULL){
				if ((pathinfo($img['name'], PATHINFO_EXTENSION) == "gif") OR (pathinfo($img['name'], PATHINFO_EXTENSION) == "jpg") OR (pathinfo($img['name'], PATHINFO_EXTENSION) == "png") OR (pathinfo($img['name'], PATHINFO_EXTENSION) == "jpge")) {

				$status = productAdd($name,$qntity,$inDate,$bprice,$sprice,$desc,$file,$activity,$subCat);

				if ($status) {
					$dir = '../upload/'.$file;
					$x = move_uploaded_file($_FILES['img']['tmp_name'], $dir);
							if ($x) {
								echo "<script>alert('Profile updated')</script>";
								echo "<script>window.location='../view/SellerHome.php#profile';</script>";
							}
							else
							{
								echo "<script>alert('File upload error')</script>";
								echo "<script>window.location='../view/SellerHome.php#profile';</script>";
							}
				}
				else
				{
					echo "<script>alert('Something Wrong!!')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
				}


				
			}
			else
			{
				echo "<script>alert('Invalid file type')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
			}
			}
			else
			{
				echo "<script>alert('Same Name product Already added')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
			}
			}
			else
			{
				echo "<script>alert('Invalid Name')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
			}
			
		}
		}
		else
		{
			echo "<script>alert('use Numeric value please')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
		}
	}

}else
{
	header('Location:../view/SellerHome.php');
}



?>