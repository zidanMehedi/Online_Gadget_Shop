<?php
session_start();
error_reporting(0);
require_once '../db/SellerFunctions.php';

if (isset($_POST['submit'])) {
	$uname = $_POST['username'];
	$pass = $_POST['pass'];

   if (auth_check($uname,$pass)) {
      header('Location: ../view/SellerHome.php');
   }
   else
   {
      header('Location: ../ControlPanel.php?msg=Invalid username or password');
   }

}

?>
