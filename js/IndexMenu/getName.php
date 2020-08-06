<?php
session_start();
require_once('../db/buyerFunctions.php');

if (isset($_POST['getCAT']) 
{
	$value=$_POST['getCAT'];
	//getSubCAT($value);

	$_SESSION['GET_CAT'] = $value;
}

?>