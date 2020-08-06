<?php
if(isset($_GET['product']))
{
	session_start();
	require_once('../../db/buyerFunctions.php');
	$Product=$_GET['product'];

	$getProduct=getProduct($Product);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Accessoy Store</title>
	<link rel="stylesheet" href="../../css/buyerStyle.css">
	<script type="text/javascript" src="../../js/ProductPagesMenu/buyerScript.js"></script>
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
										 <a href="../buyerLogin.php"><div id="sign">Sign In</div></a>
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
					<div id="contentBlock">
							<table border="0px" width="100%" cellpadding="0px" cellspacing="0px" bgcolor="#f1f1f1">
							<tr>
								<td rowspan="4" width="5%"></td>
							</tr>
							<tr>
								<td width="20%"><img src="../../upload/<?=$getProduct[0]['image'];?>" alt="Product Picture" height="400px" width="280px"></td>
								<td width="10%"></td>
								<td id="productDetails">
									Product Name: <span id="productname"><?=$getProduct[0]['name']?></span><br><br>
									Product Price: <span id="productprice"><?=$getProduct[0]['selling_price']?></span><br><br>
									Product Description: <span><?=$getProduct[0]['description']?></span><br><br>
									Availability: <?php
														if($getProduct[0]['quantity']>0)
														{
															echo "In Stock";
														}
														else
															echo "Sold Out";
													?><br><br>
									Quantity: <select id="qty">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
								</td>
							</tr>
							<tr>
								<td colspan="3" height="90px" valign="bottom"><input type="submit" id="addCartBtn" name="addcart" value="Add To Cart" onclick="gotoProduct('<?=$getProduct[0]['quantity']?>')"></td>
							</tr>
							<tr>
								<td height="20px" colspan="3"></td>
							</tr>
						</table>
					</div>
					
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