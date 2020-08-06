<?php 
session_start();
require_once('../../db/buyerFunctions.php');
//echo getOrderCount($ID);
if (isset($_SESSION['NAME'])) { ?>


<!DOCTYPE html>
<html>
<head>
	<title>Accessoy Store</title>
	<link rel="stylesheet" href="../../css/buyerStyle.css">
	<script type="text/javascript" src="../../js/viewProfileMenu/buyerScript.js"></script>
</head>

<body>
					<table border="0px" width="100%" cellpadding="0px" cellspacing="0px" bgcolor="#f1f1f1">
						<tr>
							<td width="20%" height="70px" align="center"><font size="20px" color="dodgerblue"><b>TITLE</b></font></td>
							<td width="">
								<form action="../ProductPages/buyerSearch.php" method="post">
									<input type="text" name="search" id="search" placeholder="Search..." ><input type="submit" id="btn" value="Search" name="btn">
								</form>
							</td>
							<td width="30%">
								<?php
									if (isset($_COOKIE['id'])) {
										?>
										<a href="../Profile/buyerDashboard.php"><div id="myAccount">My Account</div></a>
										<?php
									}
									else{
										?>
										 <a href="buyerLogin.php"><div id="sign">Sign In</div></a>
										 <?php
									}
									?>

								<a href="../cart.php"><div id="cart">Cart</div></a>
							</td>
						</tr>
					</table>
					<div id="menuBar">
						<nav id="menuContainer">
							<menu id="listContainer">
								<ul id="lists">
								
									<li><a href="../../index.php">Home</a></li>
									
									<li><a href="" onmouseover="smartphone()" id="smartphone">Smartphone</a>
										<ul id="sub_list">
											
										</ul>
									</li>
									
									<li><a href="" onmouseover="computer()" id="computer">Computer</a>
										<ul id="ComCat">
											
										</ul>
									</li>
									
									<li><a href="" onmouseover="camera()" id="camera">Camera</a>
										<ul id="CamCat">
											
										</ul>
									</li>
									
									<li><a href="" onmouseover="lifestyle()" id="lifestyle">Lifestyle</a>
										<ul id="LifeCat">
											
										</ul>
									</li>
								</ul>
							</menu>
						</nav>
					</div>
					
					<table border="0px" width="100%" cellpadding="0px" cellspacing="0px">
						<tr>
							<td height="5px" bgcolor="white" colspan="1">
							<td height="5px" bgcolor="white" colspan="2"></td>
							<td height="5px" bgcolor="white" colspan="1">
							<td height="5px" bgcolor="white" colspan="2"></td>
						</tr>
						<tr>
							<td width="5%"></td>
							<td width="1%" bgcolor="#E8EBEC"></td>
							<td width="15%" bgcolor="#E8EBEC">
								<table border="0px" width="100%" cellpadding="0px" cellspacing="0px">
									<tr><td height="30px"></td></tr>
									<tr>
										<td><a href="../../php/buyerLogoutCheck.php"><font color="black">Logout</font></a></td>
									</tr>
									<tr><td height="20px"></td></tr>
									<tr>
										<td><a href="buyerDashboard.php"><font color="black">My Dashboard</font></a></td>
									</tr>
									<tr><td height="20px"></td></tr>
									<tr>
										<td><a href="buyerContact.php"><font color="black">Account Information</font></a></td>
									</tr>
									<tr><td height="20px"></td></tr>
									<tr>
										<td><a href="buyerAddress.php"><font color="black">Address</font></a></td>
									</tr>
									<tr><td height="20px"></td></tr>
									<tr>
										<td><a href="buyerOrder.php"><font color="black">My Orders</font></a></td>
									</tr>
									<tr><td height="20px"></td></tr>
								</table>
							</td>
							<td width="2%"></td>
							<td width="1%" bgcolor="white"></td>
							<td bgcolor="">
								<center>
									<table border="0px" width="100%" cellpadding="0px" cellspacing="0px" bgcolor="#E8EBEC">
										<?php
									$ID = getId($_SESSION['Username']);
									//echo $ID['cid'];
									if(getOrderCount($ID['cid'])>0)
									{
										$order=getOrderList($ID['cid']);
									?>
										<div style="margin-top: 60px;">
										<center>
										<table border="0px" width="60%" cellpadding="0px" cellspacing="0px" bgcolor="#E8EBEC">
											<tr>
												<th  style="padding: 5px 0px">Products</th>
												<th  style="padding: 5px 0px">Total Price</th>
												<th  style="padding: 5px 0px">Order Date</th>
												<th  style="padding: 5px 0px">Status</th>
											</tr>
										<?php
											for ($i=0; $i <count($order) ; $i++) { 
												?>
												<tr>
													<td align="center" width="140px" style="padding-bottom: 10px "><?= $order[$i]['order_products']?></td>
													<td align="center"  style="padding-bottom: 10px "><?= $order[$i]['total_cost']?></td>
													<td align="center" style="padding-bottom: 10px "><?= $order[$i]['order_date']?></td>
													<td align="center"  style="padding-bottom: 10px "><?= $order[$i]['status']?></td>
												</tr>
												<?php
											}
										?>
									</table>
									</center>
									<div style="margin-bottom: 210px"></div>
									</div>
											<?php
										}
										else{
											?>
										
										<tr>
											<td colspan="5" height="30px"></td>
										</tr>
										<tr>
											<td colspan="5" height="60px" valign="top"><font color="dodgerblue">&emsp;&emsp;&emsp;&ensp;Order List</font></td>
										</tr>
										<tr>
											<td width="12%" rowspan="4"></td>
											<td>
												<font color="tomato" size="8px">No Order(s) !</font>
											</td>
											<tr>
												<td rowspan="">There is no ProductPages in Order list</td>
											</tr>
											<tr>
												<td height="20px"></td>
											</tr>
											<tr>
												<td rowspan=""><a href="../../index.php"><font color="tomato">Click Here</font></a> to continue Shopping</td>
											</tr>
										</tr>
										<tr>
											<td colspan="5" height="60px"></td>
										</tr>
										
															</table>
											</td>
											<td width="5%"></td>
										</tr>
										<?php
									}
									?>
									</table>
					<table>
						<tr><hr></tr>
					</table>
					<table border="0px" width="100%" cellpadding="0px" cellspacing="0px" bgcolor="#f1f1f1">
						<tr>
							<td width="10%"></td>
							<td align="center">
								<div class="footerHeader"><h4>KNOW US</h4></div>
								<a href="../FooterInfo/aboutus.php"><div class="footerContents">About Us</div></a>
								<a href="../FooterInfo/privacypolicy.php"><div class="footerContents">Privacy Policy</div></a>
								<a href="../FooterInfo/cookiepolicy.php"><div class="footerContents">Cookie Ploicy</div></a>
								<a href="../FooterInfo/warrentypolicy.php"><div class="footerContents">Warrenty Policy</div></a>
								<a href="../FooterInfo/shippingpolicy.php"><div class="footerContents">Shipping Policy</div></a>
								<a href="../FooterInfo/whyshopping.php"><div class="footerContents">Why Shopping Here</div></a>
								<a href="../FooterInfo/termspolicy.php"><div class="footerContents">Terms & Conditions</div></a>
							</td>
							<td width="10%"></td>
							<td align="center" valign="top">
								<div class="footerHeader"><h4>YOUR CONCERN</h4></div>
								<?php
									if (isset($_COOKIE['id'])) {
								?>
										<a href="../Profile/buyerDashboard.php"><div class="footerContents">Your Account</div></font></a>
										<a href="../Profile/buyerOrder.php"><div class="footerContents">Your Orders</div></a>
								<?php }
									else 
										{
								?>
										<a href="../buyerLogin.php"><div class="footerContents">Your Account</div></a>
										<a href="../buyerLogin.php"><div class="footerContents">Your Orders</div></a>
								<?php
									}
								?>
								<a href="../FooterInfo/howorder.php"><div class="footerContents">How to make an Order</div></a>
							</td>
							<td width="10%"></td>
							<td align="center" valign="top">
								<div class="footerHeader"><h4>GET IN TOUCH US</h4></div>
								<a href="../FooterInfo/contactus.php"><div class="footerContents">Contact Us</div></a>
								<div class="footerHeader"><h4>PAYMENT METHODS</h4></div>
								<a href="../FooterInfo/cod.php"><div class="footerContents">Cash On Delivery</div></a>
								<a href="../FooterInfo/bkash.php"><div class="footerContents">bKash</div></a>
							</td>
							<td width="10%"></td>
							<td align="center" valign="top">
								<div class="footerHeader"><h4>LOCATION</h4></div>
								Dhaka, Bangladesh
							</td>
							<td width="10%"></td>
						</tr>
						<tr>
							<td colspan="9" bgcolor="#222222" height="60px" valign="middle"><font color="#787878" size="2px">&emsp;&emsp;&emsp;&emsp;&copy;2019 blah blah | All rights reserved</font></td>
						</tr>
					</table>
</body>
</html>

<?php
}
	else
		header('location: ../../index.php');

?>