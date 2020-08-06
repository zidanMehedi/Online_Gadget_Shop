<?php
session_start();
error_reporting(0);
if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {

	header('Location:view/SellerHome.php');

}
else
{


?>


<html>
<head>
	<title>System Login</title>
	<link rel="stylesheet" type="text/css" href="css/SellerLogin.css">
	<script src="js/SellerScript.js"></script>
</head>
<body id="login_body" onload="BCG()">
<br><br><br>
<br><br><br>
<br><br><br>
<center>
	
	<h1>System Login Panel</h1>
<div id="login_form">
	<fieldset id="login_fieldset">
		<div id="selection">
			<p id="data">
				<?php
		if (isset($_GET['msg'])) {
			echo htmlspecialchars($_GET['msg']).'<br><br>';
		}
	?>
				<button onclick="login_show()" id="btnSignin">Sign in</button> &nbsp<button onclick="alert('Contact with Admin')" id="btnSignin">Sign up</button>
			</p>

		</div>
	</fieldset>
</div>

</center>
</body>
</html>




<?php 



}
 ?>