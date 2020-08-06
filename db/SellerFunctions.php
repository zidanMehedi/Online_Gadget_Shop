<?php

session_start();
require_once 'SellerDB.php';

function auth_check($uname,$pass)
{
	$conn = getConnection();
	$query="SELECT * FROM system_user WHERE username='{$uname}' AND password='{$pass}' AND eid=2;";
	$result = mysqli_query($conn,$query);
	$row= mysqli_fetch_assoc($result);
	
	if ($row['username']==$uname AND $row['password']==$pass) {
		$_SESSION['ID'] = $row['id'];
		$_SESSION['name'] = $row['username'];
		$_SESSION['type']=2;
		date_default_timezone_set("Asia/Dhaka");
		$_SESSION['time']=date("h:i:sa");
		$cookie_value = md5($row['id'].$row['username']);
		setcookie('timeout',$cookie_value,time()+3600,'/');
		return TRUE;
	}
	else
	{
		return FALSE;
	}

}


function product_details()
{
	$conn = getConnection();
	$query="SELECT * from product,category,subcategory where (product.subcat_id=subcategory.subcat_id) AND (category.cat_id=subcategory.cat_id)";
	$result = mysqli_query($conn,$query);
	return $result ;
}


function product_search($search)
{
	$conn = getConnection();
	$query="SELECT * from product where name like '%$search%'";
	$result = mysqli_query($conn,$query);
	return $result ;
}




function profile($id)
{
	$conn = getConnection();
	$query="SELECT * from system_user where id=$id;";
	$result = mysqli_query($conn,$query);
	return $result ;
}


function updateProfile($fullname,$username,$email,$image)
{
	$conn = getConnection();
	$query="UPDATE system_user SET fullname='$fullname',image='$image',email='$email' WHERE username='$username'";
	if (mysqli_query($conn,$query)) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function updatePassword($newPass,$id)
{
	$conn = getConnection();
	date_default_timezone_set("Asia/Dhaka");
	$time =date("Y-m-d".' (h:i:s A)');
	$query="UPDATE system_user SET password='$newPass', last_update='$time' WHERE id=$id";
	if (mysqli_query($conn,$query)) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}



function customer_details()
{
	$conn = getConnection();
	$query = "SELECT * from customer_user";
	$result = mysqli_query($conn,$query);
	return $result;
}


function getCatageory()
{
	$conn = getConnection();
	$query = "SELECT * from category";
	$result = mysqli_query($conn,$query);
	return $result;
}


function getSubCategory($cat)
{
	$conn = getConnection();
	$query = "SELECT * from subcategory where cat_id=$cat";
	$result = mysqli_query($conn,$query);
	return $result;
}

function productAdd($name,$qnty,$inDate,$bprice,$sprice,$desc,$image,$status,$subcat)
{
	$conn = getConnection();
	$query="INSERT INTO product values ('','$name','$qnty','$inDate','$bprice','$sprice','$desc','$image','$status','$subcat')";

	$result = mysqli_query($conn,$query);
	if ($result) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function categoryAdd($catName)
{
	$conn = getConnection();
	$query = "INSERT INTO category values ('','$catName')";
	$result = mysqli_query($conn,$query);
	if ($result) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}


function subcategoryAdd($cat,$subcat)
{
	$conn = getConnection();
	$query = "INSERT INTO subcategory values ('','$subcat','$cat')";
	$result = mysqli_query($conn,$query);
	if ($result) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}


function GetProductData($id)
{
	$conn = getConnection();
	$query = "SELECT * from product,category,subcategory where (product.subcat_id=subcategory.subcat_id) AND (category.cat_id=subcategory.cat_id) and product.pid=$id";
	$result =mysqli_query($conn,$query);

	return $result;
}


function updateProduct($id,$name,$qntity,$inDate,$buyP,$sellP,$desc,$subcat,$img,$act)
{
	$conn = getConnection();
	$query = "UPDATE product SET name='$name',quantity='$qntity',incoming_date='$inDate',buying_price='$buyP',selling_price='$sellP',description='$desc',image='$img',activity='$act',subcat_id='$subcat' WHERE pid=$id";
	$result=mysqli_query($conn,$query);
	if ($result) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}

}


function deleteProduct($id)
{
	$conn = getConnection();
	$query = "DELETE FROM product WHERE pid=$id";
	if (mysqli_query($conn,$query)) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}


function orders()
{
	$conn = getConnection();
	$query ="SELECT * FROM orders,customer_user where orders.cid=customer_user.cid";
	$result = mysqli_query($conn,$query);
	return $result;
}



function order_approve($orderID)
{
	$conn = getConnection();
	$query = "UPDATE orders SET status='Approved' WHERE order_no=$orderID";
	if (mysqli_query($conn,$query)) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function order_deliver($orderID)
{
	$conn = getConnection();
	$query = "UPDATE orders SET status='Delivered' WHERE order_no=$orderID";
	if (mysqli_query($conn,$query)) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function order_reject($orderID)
{
	$conn = getConnection();
	$query = "UPDATE orders SET status='Rejected' WHERE order_no=$orderID";
	if (mysqli_query($conn,$query)) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}


function report_add($tID,$TDate,$profit,$order_id)
{
	$conn = getConnection();
	$query = "INSERT INTO report values('','$tID','$TDate','$profit','$order_id')";
	if (mysqli_query($conn,$query)) {
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}


function reportShow($d1,$d2)
{
	$conn = getConnection();
	$query = "SELECT * FROM report,orders WHERE report.order_no=orders.order_no AND transaction_date BETWEEN '$d1' AND '$d2'";
	$result = mysqli_query($conn,$query);

	return $result;
}

function dupPNameCheck($name)
{
	$conn = getConnection();
	$query = "SELECT pid  FROM product WHERE name='$name'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);

	return $row['pid'];
}


function orderDestails($id)
{
	$conn = getConnection();
	$query="SELECT item_quantity from orders where order_no=$id";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	return $row['item_quantity'];
}


//============================================= Validation =========================================================

function verifyEmail($email,$key){
		$flag = 0;
		$splitEmail = str_split($email);
		 for ($i=0; $i < count($splitEmail); $i++) { 
		 	if ($splitEmail[$i] == $key) {
		 		$flag += 1;
		 	}
		 	else
		 		continue;
		 }
		 if ($flag == 1) {
		 	return TRUE;
		 }
		 else
		 	return FALSE;
	}


function email_verify($email)
{
	if (verifyEmail($email,'@'))
	{
		$splitEmail = explode("@", $email);
		if (verifyEmail($splitEmail[1], '.')) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	else
	{
		return FALSE;
	}
			
}


function profitCount($id,$q)
{
	$conn = getConnection();
	$query = "SELECT $q*(selling_price-buying_price) 'profit' from product where pid=$id";
	$result = mysqli_query($conn,$query);

	$row = mysqli_fetch_assoc($result);

	return $row['profit'];
}

function dupEmailcheck($mail,$name)
{
	$conn = getConnection();
	$query = "SELECT email FROM system_user WHERE email='$mail' AND username!='$name'";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	return $row['email'];
}


function validUserName($name)
	{
		$letter = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','-','.','0','1','2','3','4','5','6','7','8','9');
		$nameSplit = str_split($name);
		$flag = 0;
		foreach ($nameSplit as $key) {
			foreach ($letter as $c) {
				if ($key == $c) {
					$flag+=1;
				}
			}
		}
		return $flag;
	}


















































?>





