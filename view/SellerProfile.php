<?php
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';
if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {

	$data =profile($_SESSION['ID']);
	while ($row=mysqli_fetch_assoc($data))
	{
		$username = $row['username'];
		$fullname = $row['fullname'];
		$email = $row['email'];
		$img = $row['image'];

		$pp = "<img src='../upload/".$img."' height='100' weight='100'>";
	}

?>


<style type="text/css">
	table {
  width: 25%;
  border-collapse: collapse;
}

th,td {
  height: 50px;
  border: 2px solid black;
}
</style>


<br><br>
<style type="text/css">

</style>
<center>
	<h2>Profile</h2>
</center>
<table border="0" width="40%">
	<tr>
		<td align="center" colspan="2"><?=$pp;?></td>
	</tr>
	<tr>
		<th>Username:</th>
		<td align="center"><?=$username;?></td>
	</tr>
	<tr>
		<th>Full Name:</th>
		<td align="center"><?=$fullname;?></td>
	</tr>
	<tr>
		<th>Email:</th>
		<td align="center"><?=$email;?></td>
	</tr>

</table>


<?php
}
else
{
	header('Location:../ControlPanel.php');
}

?>