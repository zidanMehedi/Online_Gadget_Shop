<?php
session_start();
require_once('../db/buyerFunctions.php');
if(isset($_POST['ProName']))
{
	$Username = $_SESSION['Username'];
	$Productname = $_POST['ProName'];
	$Productprice = doubleval($_POST['ProPrice']);
	$ProductQty = intval($_POST['ProQty']);
	$TotalQty = $Productprice*$ProductQty;
	$availableQuantity=$_POST['avQ'];
	if($availableQuantity<=0)
	{
		echo 'Failed';
	}
	elseif($availableQuantity<$ProductQty)
	{
		echo 'Failed';
	}
	else
	{
		$availableQuantity-=$ProductQty;
		$update=updateProductQty($availableQuantity,$Productname);
		$Status = setCart($Username,$Productname,$Productprice,$ProductQty,$TotalQty);
		 if($Status)
		 {
		 	echo "Done";
		 }
		 else
		 	echo "Failed";

	 	//echo $Productprice;
		}
}
else
	header('location: ../index.php');
?>