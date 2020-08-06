<?php 
session_start();
require_once('../db/buyerFunctions.php');
//print_r(getItemsCount($_SESSION['Username']));
if (isset($_COOKIE['id'])) { 

?>

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
					<?php
					if(getItemsCount($_SESSION['Username'])>0)
					{
						$cart=getItems($_SESSION['Username']);
					?>
						<div style="margin-top: 60px; margin-bottom: 40px">
						<center>
						<table border="0px" width="60%" cellpadding="0px" cellspacing="0px" bgcolor="#E8EBEC">
							<tr>
								<th  style="padding: 5px 0px">Product Name</th>
								<th  style="padding: 5px 0px">Product Price</th>
								<th  style="padding: 5px 0px">Quantity</th>
								<th  style="padding: 5px 0px">Total Price</th>
								<th  style="padding: 5px 0px">Action</th>
							</tr>
						<?php
							for ($i=0; $i <count($cart) ; $i++) { 
								?>
								<tr>
									<td align="center"  style="padding-bottom: 10px "><?= $cart[$i]['product_name']?></td>
									<td align="center"  style="padding-bottom: 10px "><?= $cart[$i]['price']?></td>
									<td align="center" style="padding-bottom: 10px "><?= $cart[$i]['quantity']?></td>
									<td align="center"  style="padding-bottom: 10px "><?= $cart[$i]['total_price']?></td>
									<td align="center"  style="padding-bottom: 10px ">
										 <button type="button" id="delete" value="<?= $cart[$i]['id'].'|'.$cart[$i]['quantity'].'|'.$cart[$i]['product_name']?>"  style="background-color: red; border:none; height: 30px; width: 50px; color: white; border-radius: 5px;" onclick="deleteCart(this.value)">Delete</button>
									</td>
								</tr>
								<?php
							}
						?>
						<tr>
							<th colspan="3" align="right"  >Total</th>
							<th align="center"  >
								<span id="pretotal">
								<?php
								$total = 0;
									for ($i=0; $i <count($cart) ; $i++) { 
										$total+=$cart[$i]['total_price'];
								}
										echo $total;
								?>
							</span>
							</th>
						</tr>
						<tr>
							<th colspan="3" align="right" style="padding-bottom: 10px ">Dicount</th>
							<th  style="padding-bottom: 10px ">-<span id="discount">0.00</span></th>
						</tr>
						<tr>
							<th colspan="3" align="right">Main Total</th>
							<th id="discount">
								<span id="mainTotal">
									<?= $total?>
								</span>
							</th>
						</tr>
					</table>
					</center>
					</div>
					<div style="width: 500px; right: 90px; position: absolute;">
						<table>
							<tr>
								<td><div style="font-size: 25px; color: tomato">Code:</div></td>
								<td><div><input type="text" id="coupon" style="height: 30px;width: 100px"></div></td>
								<td><div><input type="button" id="verifyBtn" value="Verify" onclick="verifyCoupon()" style="height: 30px; width: 70px; background-color: green;
								border-radius: 2px; border:none; color: white;"></div></td>
							</tr>
						</table>
					</div>
					<center>
						<div class="header" style="padding-top: 80px"><font size="12px">Payment Methods</font></div>
						<div id="method">
							<input type="radio" name="payment" value="Cash On Delivery" onclick>Cash On Delivery&emsp;&emsp;<input type="radio" name="payment" value="bKash">bKash
						</div><br>
						<div id='methodType' style="margin-bottom: 40px; color:red; font-size: 30px">Choose Your Option</div>
					</center>
					<div style="margin-bottom: 152px; text-align: center">
						<input id="addCartBtn" type="button" name="checkout" value="Order Now" onclick="checkout()">
					</div>
							<?php
						}
						else
						{
							?>
						<table border="0px" width="100%" cellpadding="0px" cellspacing="0px" bgcolor="#E8EBEC">
						<tr>
							<td colspan="5" height="5px"></td>
						</tr>
						<tr>
							<td colspan="5" height="60px" valign="top"><font color="dodgerblue">&emsp;&emsp;&emsp;&ensp;Shopping Cart</font></td>
						</tr>
						<tr>
							<td width="12%" rowspan="4"></td>
							<td>
								<font color="tomato" size="8px">Your Cart is Empty !</font>
							</td>
							<tr>
								<td rowspan="">There is no ProductPages in your cart</td>
							</tr>
							<tr>
								<td height="20px"></td>
							</tr>
							<tr>
								<td rowspan=""><a href="../index.php"><font color="tomato">Click Here</font></a> to continue Shopping</td>
							</tr>
						</tr>
						<tr>
							<td colspan="5" height="60px"></td>
						</tr>
					</table>
							<?php
						}
					?>
					<table>
						<tr><hr></tr>
					</table>
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
		header('location: buyerLogin.php');

?>

