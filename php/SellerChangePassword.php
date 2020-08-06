<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';



if (isset($_POST['update'])) {
	$np = $_POST['npass'];
	$cnp = $_POST['cnpass'];
	$cp = $_POST['cpass'];

	$data = profile($_SESSION['ID']);

	$row = mysqli_fetch_assoc($data);


	if (empty($np) OR empty($cnp) OR empty($cp)) {
		echo "<script>alert('NULL submission')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
	}
	else
	{
		if ($np!=$cnp) {
			echo "<script>alert('Confirm password not match')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
		}
		else
		{
			if ($cp!=$row['password']) {
				echo "<script>alert('Current password wrong')</script>";
				echo "<script>window.location='../view/SellerHome.php#profile';</script>";
		}
			else
			{
				$result = updatePassword($np,$_SESSION['ID']);
			}
		}
	}


	if ($result) {
		header('Location:../ControlPanel.php?msg=update success. Login with your new password');
		session_destroy();
	}
	else
	{
		echo "<script>alert('Something Wrong')</script>";
			echo "<script>window.location='../view/SellerHome.php#profile';</script>";
	}
}





 ?>