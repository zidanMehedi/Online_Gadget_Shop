<?php
require_once('../db/buyerFunctions.php');
if(isset($_POST['subCat']))
{
	
	$Cat =$_POST['subCat'];
	$lists=getSubCats($Cat);
	//echo $lists[0]['subcat_name'];
		for ($i=0; $i <count($lists) ; $i++) { 
			$x = $lists[$i]['subcat_name'];
			echo "<li><a href='../../view/ProductPages/camera.php?subCat=".base64_encode($x)."' onclick='abc(this.textContent);'>$x</a></li>";
			$x = '';
		}
	}
	else
		header('location: ../index.php');
?>