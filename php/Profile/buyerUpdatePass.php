<?php

session_start();
require_once('../../db/buyerFunctions.php');
$oldPass = "";
$newPass = "";
$conNewPass = "";

if (isset($_REQUEST['savepass'])) 
{


	$username = $_SESSION['Username'];
	$oldPass = $_REQUEST['oldpass'];
	$newPass = $_REQUEST['newpass'];
	$conNewPass = $_REQUEST['connewpass'];
	
	if(empty($oldPass) == true || empty($newPass) == true || empty($conNewPass) == true)
	{
		header('location: ../../view/Profile/buyerChangePass.php?msg=Fill All The Fields');
	}
	elseif(strlen($newPass)<8)
	{
		header('location: ../../view/Profile/buyerChangePass.php?msg=Password Length Must Be 8');
	}
	elseif($oldPass!=$_SESSION['Pass'])
	{
		header('location: ../../view/Profile/buyerChangePass.php?msg=Old Password Is Wrong');
	}
	elseif ($newPass!=$conNewPass) 
	{
		header('location: ../../view/Profile/buyerChangePass.php?msg=Password Did Not Matched');
	}
	else
	{
		$update = updatePass($username,$newPass);
					
		header('location: ../buyerLogoutCheck.php');
	}
}
else
	header('location: ../../index.php')
?>