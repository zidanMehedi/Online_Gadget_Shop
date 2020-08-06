<?php
session_start();
require_once('../db/buyerFunctions.php');
if(isset($_POST['total']))
{
	$Username = $_SESSION['Username'];
	$Total = $_POST['total'];
	$cart=getItems($Username);
	$getProduct=getProduct('iPhone');
	$id = getId($Username)['cid'];
	$Date=date("Y-m-d");
	$orderList='';
	$orderQuantity='';
	for ($i=0; $i <count($cart) ; $i++) { 
		$orderList.=$cart[$i]['product_name']."(".$cart[$i]['quantity'].")"."\n";
		$orderQuantity.=$getProduct[0]['pid'].":".$cart[$i]['quantity'].",";
	}
	$delete = deleteCart($Username);
	$status=checkout($id,$orderList,$orderQuantity,$Date,$Total);
	if($status)
	{
		echo "Done";
	}
	else
		echo "Failed";
}
else
	header('location: ../index.php');
?>
