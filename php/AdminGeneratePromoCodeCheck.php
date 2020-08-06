<?php
	require_once('../db/AdminPromoFunction.php');
	require_once('../db/AdminUserFunction.php');

	if (isset($_POST['submit'])) {
		$pcode = $_POST['prname'];
		$pdis = $_POST['dis'];
		$validity = $_POST['prval'];
		$status = $_POST['prstat'];
		$cus = $_POST['cid'];
		$result = getPromoAndCID();
		$result1 = getCustomerDetails();
		$m = 0;
		while ($rows = mysqli_fetch_assoc($result)) {
			if ($rows['promo_code'] == $pcode && $rows['cid'] == $cus) {
				$m = 1;
				break;
			}else{
				continue;
			}
		}
		$c = 0;
		while ($data = mysqli_fetch_assoc($result1)) {
			if ($data['cid'] == $cus) {
				$c = 1;
				break;
			}else{
				continue;
			}
		}
		if (empty($pcode) || empty($pdis) || empty($validity) || empty($status) || empty($cus)){
			header('location: ../view/AdminGeneratePromoCode.php?msg=Please fill all data');
		}else{
			if (validPromoName($pcode) == false) {
				header('location: ../view/AdminGeneratePromoCode.php?msg=Promo Code must be one word');
			}
			else{
				if (is_numeric($cus) == false) {
					header('location: ../view/AdminGeneratePromoCode.php?msg=Customer ID must be a number');
				}
				else{
					if ($m == 1) {
						header('location: ../view/AdminGeneratePromoCode.php?msg=Promo Code exists for this customer');
					}
					else{
						if ($c == 0) {
							header('location: ../view/AdminGeneratePromoCode.php?msg=Customer is not available');
						}
						else{
							if (is_numeric($pdis) == false) {
								header('location: ../view/AdminGeneratePromoCode.php?msg=Discount amount must be a number');
							}
							else{
								$status = promoCodeAdd($pcode,$pdis,$validity,$status,$cus);
								if ($status) {
									header('location: ../view/AdminGeneratePromoCode.php?msg=Promo Code is successfully added for this customer');
								}else{
									header('location: ../view/AdminGeneratePromoCode.php?msg=Promo Code is not added');
								}
							}
						}
					}
				}
			}
		}
	}else{
		header('location: ../adminLogin.php');
	}

?>