<?php 
session_start();

if ($_SESSION['name'] AND $_SESSION['type']  AND $_COOKIE['timeout']) {
$msg='';
if (isset($_GET['msg'])) {
	$msg = htmlspecialchars($_GET['msg']);
}


?>




<style type="text/css">
	table {
  width: 30%;
  border-collapse: collapse;
}

th,td {
  height: 20px;
  border: 2px solid black;
}

#npass,#cnpass,#cpass
{
	width: 100%;
}

</style>
<script type="text/javascript" src="../js/SellerScript.js"></script>
<script type="text/javascript" src="../js/SellerValid.js"></script>


<center>
	<h3><?=$msg;?></h3>
	<h2>Change Password</h2>
</center>
	<form action="../php/SellerChangePassword.php" method="POST">
	<table border="1" align="center">
	<tr>
		<td>New Password:</td>
		<td><input type="password" name="npass" id="npass" onkeyup="changepass1()" onclick="changepass1()"></td><b id="newP" style="color: red"></b>
	</tr>
	<tr>
		<td>Confirm New Password:</td>
		<td><input type="password" name="cnpass" id="cnpass" onkeyup="changepass2()" onclick="changepass2()"></td><b id="CnewP" style="color: red"></b>
	</tr>
	<tr>
		<td>Current Password</td>
		<td><input type="password" name="cpass" id="cpass" onkeyup="changepass3()" onclick="changepass3()"></td><b id="CP" style="color: red"></b>
	</tr>
	
	<tr>
		<td colspan="2"></td>
	</tr>

	<tr>
		<td colspan="2" align="center"> <input type="submit" name="update" value="update" id="updatepass" ></td>
	</tr>
</table>

</form>



<?php

}
else
{
	header('Location:../ControlPanel.php');
}

?>