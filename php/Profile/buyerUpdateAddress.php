<?php

session_start();
require_once('../../db/buyerFunctions.php');
$newAddress = "";



if (isset($_REQUEST['change'])) 
{


	$username = $_SESSION['Username'];
	$newAddress = $_REQUEST['address'];
	
	if(empty($newAddress) == true)
	{
		header('location: ../../view/Profile/buyerChangeAddress.php');
	}
	else
	{
		$update = updateAddress($username,$newAddress);

		header('location: ../buyerLogoutCheck.php');
	}
}
else
	header('location: ../../index.php')
?>