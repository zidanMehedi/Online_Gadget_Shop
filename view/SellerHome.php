<?php
session_start();
if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {

?>


<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/sellerDashboard.css">
	<script type="text/javascript" src="../js/SellerScript.js"></script>
	<script type="text/javascript" src="../js/SellerValid.js"></script>
	<script type="text/javascript">
		

	</script>
</head>
<body >
<div id="header">
	<center><H1>Welcome to System Panel</H1></center>
</div>


<div id="bar">
	<p id="path">PATH: </p><p id="loginas" align="right">Login as <button id="btnuname" onclick="profile()"><b><?=$_SESSION['name'];?> &nbsp</b></button></p>
</div>
<br>
<div id="left-sticky">
	<div id="menu">
		<button id="btn1" onclick="home()">Home</button>
		<br><br>
		<button id="btn2" onclick="product_option()">Product</button>
		<br><br>
		<button id="btn3" onclick="profileOption()">Setting</button>
		<br><br>
		<button id="btn9" onclick="customer_details()">Customer List</button>
		<br><br>
		<button id="btn4" onclick="report()">Report</button>
		<br><br>
		<button id="btn5" onclick="orders();">Orders</button>
		<br><br>
		<button id="btn6" onclick="logout()" >Logout</button>
	</div>
</div>
	<div id="body" align="center">
		<p id="product">Welcome <b><?=$_SESSION['name'];?></b> </p>
	</div>


<div id="footer">
	<marquee>Last login :<?="Time: ".$_SESSION['time'];?></marquee>
</div>

</body>
</html>

<?php

}
else
{
	header('Location:../ControlPanel.php');
}

?>