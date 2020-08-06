<?php
require_once('buyerDB.php');
function loginCheck($id,$pass)
{
	$conn= getConnection();
	$sql = "select * from customer_user where username='{$id}'";
	$result = mysqli_query($conn, $sql);
	$users = mysqli_fetch_assoc($result);

	return $users;
}

function registration($id,$pass,$name,$email,$dob,$address,$gender,$con)
{
	$conn= getConnection();
	$sql = "insert into customer_user values ('','{$id}','{$pass}','{$name}','{$email}','{$dob}','{$gender}','{}','{$con}','{$address}','')";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function updatePass($username,$newPass)
{
	$conn= getConnection();
	$sql = "update customer_user set password='{$newPass}' where username='{$username}'";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function updateAddress($username,$newAddress)
{
	$conn= getConnection();
	$sql = "update customer_user set billing_address='{$newAddress}' where username='{$username}'";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function updateInfo($username,$newName,$newEmail,$newCon)
{
	$conn= getConnection();
	$sql = "update customer_user set fullname='{$newName}',email='{$newEmail}',phone='{$newCon}' where username='{$username}'";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}


function getSubCats($Cat)
{
	$conn = getConnection();
	$sql1 = "select cat_id from category where cat_name='{$Cat}'";
	$result1 = mysqli_query($conn, $sql1);
	$list = mysqli_fetch_assoc($result1);
	$sql = "select subcat_name from subcategory where cat_id='{$list["cat_id"]}'";
	$result = mysqli_query($conn, $sql);
	//$lists[]=array();
	while($getResult = mysqli_fetch_assoc($result))
	{
		$lists[]=$getResult;
	}
	return $lists;
	
}

function getProductLists($Cat)
{
	$conn = getConnection();
	$sql1 = "select subcat_id from subcategory where subcat_name='{$Cat}'";
	$result1 = mysqli_query($conn, $sql1);
	$list = mysqli_fetch_assoc($result1);
	$sql = "select * from product where subcat_id='{$list["subcat_id"]}'";
	$result = mysqli_query($conn, $sql);
	//$lists[]=array();
	while($getResult = mysqli_fetch_assoc($result))
	{
		$lists[]=$getResult;
	}
	return $lists;
}

function getProduct($Product)
{
	$conn = getConnection();
	$sql = "select * from product where name='{$Product}'";
	$result = mysqli_query($conn, $sql);
	while($getResult = mysqli_fetch_assoc($result))
	{
		$lists[]=$getResult;
	}
	return $lists;
}

function setCart($username,$Productname,$Productprice,$ProductQty,$Totalqty)
{
	$conn= getConnection();
	$sql = "insert into cart values ('','{$username}','{$Productname}','$Productprice','$ProductQty','$Totalqty')";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function getItems($username)
{
	$conn = getConnection();
	$sql = "select * from cart where username='{$username}'";
	$result = mysqli_query($conn, $sql);
	while($getResult = mysqli_fetch_assoc($result))
	{
		$lists[]=$getResult;
	}
	return $lists;
}

function getItemsCount($username)
{
	$conn = getConnection();
	$sql = "select * from cart where username='{$username}'";
	$result = mysqli_query($conn, $sql);
	$users=mysqli_fetch_assoc($result);
	return count($users);
}

function getId($id)
{
	$conn= getConnection();
	$sql = "select cid from customer_user where username='{$id}'";
	$result = mysqli_query($conn, $sql);
	$users = mysqli_fetch_assoc($result);

	return $users;
}

function checkout($id,$orderList,$orderQuantity,$Date,$Total)
{
	$conn= getConnection();
	$sql = "insert into orders values ('','{$Date}','{$orderList}','{$orderQuantity}','$Total','Pending','$id')";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function deleteCart($username)
{
	$conn= getConnection();
	$sql = "delete from cart where username='{$username}'";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function getOrderCount($ID)
{
	$conn = getConnection();
	$sql = "select * from orders where cid='{$ID}'";
	$result = mysqli_query($conn, $sql);
	$users=mysqli_fetch_assoc($result);
	return count($users);
}

function getOrderList($id)
{
	$conn = getConnection();
	$sql = "select * from orders where cid='{$id}'";
	$result = mysqli_query($conn, $sql);
	while($getResult = mysqli_fetch_assoc($result))
	{
		$lists[]=$getResult;
	}
	return $lists;
}


function searchProduct($ProductName)
{
	$conn = getConnection();
	$sql = "select name,image from product where name like '%{$ProductName}%'";
	$result = mysqli_query($conn, $sql);
	while($getResult = mysqli_fetch_assoc($result))
	{
		$lists[]=$getResult;
	}
	return $lists;
}

function deleteFromCart($Delete)
{
	$conn= getConnection();
	$sql = "delete from cart where id='$Delete'";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function verifyCouponValidity($Coupon,$id)
{
	$conn = getConnection();
	$sql = "select * from discount where promo_code='{$Coupon}' and cid='{$id}'";
	$result = mysqli_query($conn, $sql);
	$status = mysqli_fetch_assoc($result);
	return count($status);
}

function getCoupon($Coupon,$id)
{
	$conn = getConnection();
	$sql = "select * from discount where promo_code='{$Coupon}' and cid='{$id}'";
	$result = mysqli_query($conn, $sql);
	while($getResult = mysqli_fetch_assoc($result))
	{
		$lists[]=$getResult;
	}
	return $lists;
}

function updateDiscountUsage($Coupon,$id)
{
	$conn= getConnection();
	$sql = "update discount set Used='1' where promo_code='{$Coupon}' and cid='{$id}'";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function updateProductQty($availableQuantity,$Productname)
{
	$conn= getConnection();
	$sql = "update product set quantity='$availableQuantity' where name='{$Productname}'";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}

function resetProduct($NAME,$currentQty)
{
	$conn= getConnection();
	$sql = "update product set quantity='$currentQty' where name='{$NAME}'";
	if(mysqli_query($conn, $sql))
	{
		return true;	
	}
	else 
		return false;
}