<?php
require_once('../db/buyerFunctions.php');
if(isset($_POST['delete']))
{
	$Delete = $_POST['delete'];
	$Quantity = $_POST['Qty'];
	$NAME=$_POST['Name'];
	deleteFromCart($Delete);
	$currentQty=getProduct($NAME);
	$Store = $currentQty[0]['quantity']+$Quantity;
	resetProduct($NAME,$Store);
}
else
	header('location: ../index.php');
?>