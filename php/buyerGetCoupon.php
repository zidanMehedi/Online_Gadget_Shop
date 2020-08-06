<?php
session_start();
require_once('../db/buyerFunctions.php');
if(isset($_POST['cpn']))
{
	$Username = $_SESSION['Username'];
	$Coupon = $_POST['cpn'];
	$id = getId($Username)['cid'];
	if(verifyCouponValidity($Coupon,$id)>0)
	{
		$json = getCoupon($Coupon,$id);
		if($json[0]['Used']==1)
		{
			echo 'used';
		}
		//echo $json[0]['validity'];
		else
		{
			if((date("Y-m-d")<$json[0]['validity'])&&($json[0]['status']=="Enable")&&$json[0]['Used']==0)
			{
				$used=updateDiscountUsage($Coupon,$id);
				header('Content-Type: application/json');
				echo json_encode($json[0]);
			}
			else
			{
				echo "date";
			}
		}

		//echo $obj;
		
	}
	else
		{
			echo "Invalid";
		}

	//print_r(verifyCouponValidity($Coupon,$id));
	}
	else
		header('location: ../index.php');
?>