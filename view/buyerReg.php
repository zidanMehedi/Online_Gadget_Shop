<?php 

if (!isset($_COOKIE['id'])) { ?>

<!DOCTYPE html>
<html>
<head>
	<title>Accessoy Store</title>
	<link rel="stylesheet" href="../css/buyerStyle.css">
	<script type="text/javascript" src="../js/LoginMenu/buyerScript.js"></script>
</head>

<body>
					<table border="0px" width="100%" cellpadding="0px" cellspacing="0px" bgcolor="#f1f1f1">
						<tr>
							<td width="20%" height="70px" align="center"><font size="20px" color="dodgerblue"><b>TITLE</b></font></td>
							<td width="">
								<form action="ProductPages/buyerSearch.php" method="post">
									<input type="text" name="search" id="search" placeholder="Search..." ><input type="submit" id="btn" value="Search" name="btn">
								</form>
							</td>
							<td width="30%">
								<?php
									if (isset($_COOKIE['id'])) {
										?>
										<a href="Profile/buyerDashboard.php"><div id="myAccount">My Account</div></a>
										<?php
									}
									else{
										?>
										 <a href="buyerLogin.php"><div id="sign">Sign In</div></a>
										 <?php
									}
									?>

								<a href="cart.php"><div id="cart">Cart</div></a>
							</td>
						</tr>
					</table>
					<div id="menuBar">
						<nav id="menuContainer">
							<menu id="listContainer">
								<ul id="lists">
								
									<li><a href="../index.php">Home</a></li>
									
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
					<div id="loginReg">
						<table border="0px" width="100%" cellpadding="0px" cellspacing="0px">
						<tr>
							<td width="30%"></td>
							
							<td bgcolor="#E8EBEC" align="center">
								<table border="0px" width="100%" cellpadding="0px" cellspacing="0px">
									<!-- <form action="../php/buyerRegCheck.php" method="post"> -->
									<tr>
										<td>
											
												<table border="0px" width="100%" cellpadding="0px" cellspacing="0px">
													<tr>
														<td bgcolor="dodgerblue" height="5px" colspan="4"></td>
													</tr>
													<tr>
														<th height="30%" align="center" colspan="4"><h2><div class="header">Registration</div></h2></th>
													</tr>
													<tr><td height="40px" colspan="4"></td></tr>
													<tr>
														<td width="30px"></td>
														<td width="120px">Name :</td>
														<td>
															<input type="text" class="loginReg" id="NAME" name="name" placeholder="Name" id="nameBox">
														</td>
														<td width="200px" id="nameMsg" align="center"></td>
													</tr>
													<tr><td height="20px" colspan="4" ><div id="nameError"></div></td></tr>
													<tr>
														<td width="100px"></td>
														<td>Email :</td>
														<td>
															<input type="text" id="EMAIL" class="loginReg" name="email" placeholder="youremail@example.com">
														</td>
														<td width="200px" id="emailMsg" align="center"></td>
													</tr>
													<tr><td height="20px" colspan="4"></td></tr>
													<tr>
														<td width="100px"></td>
														<td>Date Of Birth :</td>
														<td>
															<input class="loginReg" id="DOB" type="date" name="dob">
														</td>
														<td width="200px" id="dobMsg" align="center"></td>
													</tr>
													<tr><td height="20px" colspan="4"></td></tr>
													<tr>
														<td width="100px"></td>
														<td>Address :</td>
														<td>
															<textarea name="address" id="address" cols="25" rows="5" placeholder="Address"></textarea>
														</td>
														<td width="200px" id="addressMsg" align="center"></td>
													</tr>
													<tr><td height="17px" colspan="4"></td></tr>
													<tr>
														<td width="100px"></td>
														<td>Contact No :</td>
														<td>
															<input type="text" class="loginReg" id="CON" name="phnNo" placeholder="01XXXXXXXXX">
														</td>
														<td width="200px" id="conMsg" align="center"></td>
													</tr>
													<tr><td height="20px" colspan="4"></td></tr>
													<tr>
														<td width="100px"></td>
														<td>Gender :</td>
														<td>
															<input type="radio" name="gender" value="Male">Male
															&emsp;&emsp;&ensp;
															<input type="radio" name="gender" value="Female">Female
														</td>
														<td width="70px"></td>
													</tr>
													<tr><td height="20px" colspan="4"></td></tr>
													<tr>
														<td width="100px"></td>
														<td>Username :</td>
														<td>
															<input type="text" class="loginReg" id="UNAME" name="username" placeholder="Username">
														</td>
														<td width="200px" id="unameMsg" align="center"></td>
													</tr>
													<tr><td height="20px" colspan="4"></td></tr>
													<tr>
													<tr>
														<td width="100px"></td>
														<td>Password :</td>
														<td>
															<input type="password" class="loginReg" id="PASS" name="userPass" placeholder="Password">
														</td>
														<td width="70px"></td>
													</tr>
													<tr><td height="20px" colspan="4"></td></tr>
													<tr>
														<td width="100px"></td>
														<td>Confirm Password :</td>
														<td>
															<input type="password" class="loginReg" id="CONPASS" name="confPass" placeholder="Confirm Password">
														</td>
														<td width="70px"></td>
													</tr>
													<tr><td height="40px" colspan="4"></td></tr>
													<tr>
														<td align="center" colspan="4"><input type="submit" id="loginRegBtn" name="userreg" value="Register" onclick="gotoReg(this.value)">
															<br><br>
														</td>
													</tr>
													<tr><td height="20px" colspan="4"></td></tr>
													<tr>
														<td align="center" colspan="4">Have an Account | Want to Log in <br></td>
													</tr>
													<tr><td align="center" colspan="4"><a href="buyerLogin.php"><font color="tomato">Sign In</font></a> <br><br></td></tr>
												</table>
											
										</td>
									</tr>
								</table>
							</td>
							<td width="30%"></td>
						</tr>
					</table>
					</div>
					<table>
						<tr><hr></tr>
					</table>
				</form>
					<table border="0px" width="100%" cellpadding="0px" cellspacing="0px" bgcolor="#f1f1f1">
						<tr>
							<td width="10%"></td>
							<td align="center">
								<div class="footerHeader"><h4>KNOW US</h4></div>
								<a href="FooterInfo/aboutus.php"><div class="footerContents">About Us</div></a>
								<a href="FooterInfo/privacypolicy.php"><div class="footerContents">Privacy Policy</div></a>
								<a href="FooterInfo/cookiepolicy.php"><div class="footerContents">Cookie Ploicy</div></a>
								<a href="FooterInfo/warrentypolicy.php"><div class="footerContents">Warrenty Policy</div></a>
								<a href="FooterInfo/shippingpolicy.php"><div class="footerContents">Shipping Policy</div></a>
								<a href="FooterInfo/whyshopping.php"><div class="footerContents">Why Shopping Here</div></a>
								<a href="FooterInfo/termspolicy.php"><div class="footerContents">Terms & Conditions</div></a>
							</td>
							<td width="10%"></td>
							<td align="center" valign="top">
								<div class="footerHeader"><h4>YOUR CONCERN</h4></div>
								<?php
									if (isset($_COOKIE['id'])) {
								?>
										<a href="Profile/buyerDashboard.php"><div class="footerContents">Your Account</div></font></a>
										<a href="Profile/buyerOrder.php"><div class="footerContents">Your Orders</div></a>
								<?php }
									else 
										{
								?>
										<a href="buyerLogin.php"><div class="footerContents">Your Account</div></a>
										<a href="buyerLogin.php"><div class="footerContents">Your Orders</div></a>
								<?php
									}
								?>
								<a href="FooterInfo/howorder.php"><div class="footerContents">How to make an Order</div></a>
							</td>
							<td width="10%"></td>
							<td align="center" valign="top">
								<div class="footerHeader"><h4>GET IN TOUCH US</h4></div>
								<a href="FooterInfo/contactus.php"><div class="footerContents">Contact Us</div></a>
								<div class="footerHeader"><h4>PAYMENT METHODS</h4></div>
								<a href="FooterInfo/cod.php"><div class="footerContents">Cash On Delivery</div></a>
								<a href="FooterInfo/bkash.php"><div class="footerContents">bKash</div></a>
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
		header('location: ../index.php');

?>


