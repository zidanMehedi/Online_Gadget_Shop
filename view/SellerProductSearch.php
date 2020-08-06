<?php
session_start();
error_reporting(0);
require_once '../db/SellerFunctions.php';
if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {
?>

	<link rel="stylesheet" type="text/css" href="../css/SellerProduct.css">
	<script type="text/javascript" src="../js/SellerScript.js"></script>
	<script type="text/javascript" src="../js/SellerValid.js"></script>
	<center><h1>Product Search</h1></center>
	
	<center>
		<input type="text" name="search" id='src' onkeyup="search_product()" placeholder="name wise"> <button onclick="search_product()">Search</button>
		<p id="pdata"></p>
	
	</center>


<?php
}
else
{
	header('Location:../ControlPanel.php');
}


?>