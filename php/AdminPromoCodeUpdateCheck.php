<?php
	require_once('../db/AdminPromoFunction.php');
	session_start();

	if (isset($_POST['submit'])) {
		$pdis = $_POST['dis'];
		$validity = $_POST['prval'];
		$status = $_POST['prstat'];

		if (empty($pdis) || empty($validity) || empty($status)){
			header('location: ../view/AdminEnableOrDisablePromoCode.php?id='.$_SESSION['promo'].'&msg=Please fill all data');
		}
		else{
			if (is_numeric($pdis) == false) {
				header('location: ../view/AdminEnableOrDisablePromoCode.php?id='.$_SESSION['promo'].'&msg=Discount amount must be a number');
			}
			else{
				$status = promoCodeUpdate($_SESSION['promo'],$pdis,$validity,$status);
					if ($status){
						header('location: ../view/AdminPromoCodeDetails.php?msg=Promo Code is successfully Updated');
					}else{
						header('location: ../view/AdminPromoCodeDetails.php?msg=Promo Code is not updated');
					}
			}

		}
			
	}else{
		header('location: ../adminLogin.php');
	}
?>