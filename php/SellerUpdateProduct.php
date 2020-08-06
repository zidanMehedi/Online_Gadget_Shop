<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$qntity = $_POST['quantity'];
	$bPrice = $_POST['bPrice'];
	$sPrice = $_POST['sPrice'];
	$desc = $_POST['desc'];
	$cat = $_POST['cat'];
	$subcat = $_POST['subcat'];
	$img = $_FILES['image'];
	$act = $_POST['activity'];
	$date = $_POST['date'];
	$vn = validUserName($name);


	if (empty($name) || empty($qntity) || empty($bPrice) || empty($sPrice) || empty($desc) || empty($cat) || empty($subcat) || empty($date)) {
		echo "<script>alert('Null Submision')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
	}
	else
	{
		if (!(is_numeric($qntity)) || !(is_numeric($bPrice)) || !(is_numeric($bPrice))) {
			echo "<script>alert('Invalid Date type')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
		}
		else
		{
			if ($qntity<0 || $bPrice<0 || $sPrice<0) {
				echo "<script>alert('Value Can't be negative)</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
			}
			else
			{
				if (strlen($name)==$vn) {
					if ($img['name']=='') {
					$img = $_SESSION['pImg'];
					$status = updateProduct($_SESSION['PID'],$name,$qntity,$date,$bPrice,$sPrice,$desc,$subcat,$img,$act);
					if ($status) {
						echo "<script>alert('Product updated')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
						unset($_SESSION['pImg']);
						unset($_SESSION['PID']);
					}
					else
					{
						echo "<script>alert('Something Wrong')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
					}

				}
				else
				{
					$ext = pathinfo($img['name'], PATHINFO_EXTENSION);
					$file = rand().'.'.$ext;
					if ((pathinfo($img['name'], PATHINFO_EXTENSION) == "gif") OR (pathinfo($img['name'], PATHINFO_EXTENSION) == "jpg") OR (pathinfo($img['name'], PATHINFO_EXTENSION) == "png") OR (pathinfo($img['name'], PATHINFO_EXTENSION) == "jpge")) 
					{
						$status = updateProduct($_SESSION['PID'],$name,$qntity,$date,$bPrice,$sPrice,$desc,$subcat,$file,$act);
						if ($status) {
							echo "Product Updated";
							unset($_SESSION['pImg']);
							unset($_SESSION['PID']);
							$dir = '../upload/'.$file;
							$x = move_uploaded_file($_FILES['image']['tmp_name'], $dir);
									if ($x) {
										echo "<script>alert('Product updated')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
									}
									else
									{
										echo "<script>alert('File upload error')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
									}

						}
						else
						{
							echo "<script>alert('Something Wrong')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
						}
					}
					else
					{
						echo "<script>alert('Invalid file type')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
					}

				}
				}
				else
				{
						echo "<script>alert('Invalid Name')</script>";
										echo "<script>window.location='../view/SellerHome.php';</script>";
				}
			}
		}
		
	}
}
else
{
	header('Location:../view/SellerHome.php');
}


?>