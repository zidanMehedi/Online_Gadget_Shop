<?php 
	error_reporting(0);
	session_start();
	if ($_SESSION['username'] AND $_COOKIE['username']) {
		header('location: view/AdminHome.php');
	}
	else
	{
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/Design.css">
</head>
<body>
	<div class="header">
		<marquee><h1>Online Accessories Store</h1></marquee>
	</div>
	
	<form method="POST" action="php/AdminLoginCheck.php">
		<table align="center" bgcolor="LightBlue" width="40%" cellspacing="5px">
			<tr>
				<td>
					<img src="upload/LoginLogo.jpg" align="left" width="100px" height="100px">
					<center>
						<h1><font color="DarkBlue" face="Cursive"><u>Login Panel</u></font></h1>
						<div style="color: red;font-weight: bold;">
							<?php 

								if (isset($_GET['msg'])) {
								echo $_GET['msg'].'<br><br>';
								}
							 ?>
						</div>
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<fieldset>
						<legend><h3>Login</h3></legend><br>
						<table cellspacing="30px">
							<tr>
								<td width="35%">
									<h4>User Name :</h4>
								</td>
								<td>
									<input type="text" name="username" placeholder="Enter a Valid User Name">
								</td>
							</tr>
							<tr>
								<td width="35%">
									<h4>Password :</h4>
								</td>
								<td>
									<input type="Password" name="password" placeholder="Enter the Password">
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="submit" value="Log In">
								</td>
								<td >
									<input type="reset" name="reset" value="Reset">
								</td>
							</tr>
						</table>
					</fieldset>
				</td>
			</tr>
		</table>
	</form>
		
</body>
</html>

<?php 

}
 ?>