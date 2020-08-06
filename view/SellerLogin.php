
<html>
<head>
	<title>System Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/SellerScript.js"></script>
	<script src="js/SellerValid.js"></script>
</head>
<body id="login_body">
<center>
<form method="POST" action="php/SellerAuthCheck.php">
		<table border="0" width="80%">
			<tr align="center">
				<td colspan="2">
					<img src="upload/panel_logo.png" width="100" height="100">
				</td>
			</tr>
			<tr>
				<td><i><b><p>Username  </p></b></i></td>
				<td>
					<input type="text" name="username" size="28" placeholder="Username" id="name">
				</td>
			</tr>
			<tr>
				<td><i><b><p>Password</p></b></i></td>
				<td>
					<input type="password" name="pass" size="28" placeholder="Password" id="pass">
				</td>
			</tr>
			<tr>
				<td></td>
				<td >
					<a href="#" style="text-decoration: none;" onclick="alert('Contact with Admin')"><p> &nbsp; Forget password?</p></a>
				</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2" >
					<input type="submit" name="submit" onclick="return LFV()" value="Sign in"> &nbsp <input type="reset" name="reset">
				</td>
			</tr>
		</table>
</form>
</center>
</body>
</html>