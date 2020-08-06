<?php
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';

if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {

$msg="";
if (isset($_GET['msg'])) {
	$msg = htmlspecialchars($_GET['msg']);
}

$data =profile($_SESSION['ID']);
	while ($row=mysqli_fetch_assoc($data))
	{
		$username = $row['username'];
		$fullname = $row['fullname'];
		$email = $row['email'];
		$_SESSION['img'] = $row['image'];
		$_SESSION['pass'] = $row['password'];

		$pp = "<img src='../upload/".$_SESSION['img']."' height='100' weight='100'>";
	}

?>

<script type="text/javascript" src="../js/SellerScript.js"></script>
<script type="text/javascript" src="../js/SellerValid.js"></script>
<link rel="stylesheet" type="text/css" href="../css/SellerSettings.css">
<center>

	<center>
		<h3><?=$msg;?></h3>
	</center>

	<h1>Edit Profile</h1>
	<form method="POST" enctype="multipart/form-data" action="../php/SellerProfileUpdate.php">
		<table border="1" width="20%">
		<tr>
			<td colspan="2" align="center">
				<?=$pp;?>
			</td>
		</tr>
		<tr>
			<td>UserName: </td>
			<td align="center"><input type="text" name="uname" disabled value="<?=$username;?>"></td>
		</tr>
		<tr>
			<td>Full Name</td>
			<td align="center"><input type="text" name="fullname" onkeyup="profileName()" onclick="profileName()" value="<?=$fullname;?>" id="name"><b id="Nalert" style="color: red"></b></td><b><p id="nmsg" style="color: red"></p></b>
		</tr>
		<tr>
			<td>Email</td>
			<td align="center"><input type="text" onkeyup="valid_email()" name="email" value="<?=$email;?>" id="email" ><b id="alert" style="color: red"></b></td><b><p id="pmsg" style="color: red"></p></b>
		</tr>
		<tr>
			<td>Current Password</td>
			<td align="center"><input type="password" id="cpass" name="pass" onkeyup="validCurrentPass()" onclick="alidCurrentPass()"></td><b><p id="passmsg" style="color: red"></p></b>
		</tr>
		<tr>
			<td>Image</td>
			<td align="center"><input type="file" name="profile"></td>
		</tr>
		<tr>
			<td></td>
			<td><button name="update" onclick="validateEmail()" id="updateProfile" disabled="">Update</button></td>
		</tr>
	</table>
	</form>
</center>




<?php

}
else
{
	header('Location:../ControlPanel.php');
}

?>