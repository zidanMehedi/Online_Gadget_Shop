<?php
	require_once('../db/AdminProductFunction.php');

	$pname = "";
	$cat = "";
	$subcat = "";
	$quan = "";
	$buy = "";
	$sell = "";
	$date = "";
	$des = "";
	$activity = "";
	$rname = "";

	

	if (isset($_POST['submit'])) {
		$pname = $_POST['pname'];
		$cat = $_POST['pcat'];
		$subcat = $_POST['subcat'];
		$quan = $_POST['quantity'];
		$buy = $_POST['buyprice'];
		$sell = $_POST['sellprice'];
		$date = $_POST['incomedate'];
		$des = $_POST['describe'];
		$activity = $_POST['act'];

		$length = validName($pname);

		if (empty($pname) || empty($cat) || empty($subcat) || empty($quan) ||empty($buy) || empty($sell) || empty($date) || empty($des) || empty($activity) || empty($_FILES['pimage']['name'])) {
			
			header('location: ../view/AdminAddProduct.php?msg=Please fill all data');
		}
		else
		{
			if (strlen($pname) != $length) 
			{
				header('location: ../view/AdminAddProduct.php?msg=Product name not valid');
			}
			else
			{
									if (strpos($des, '.') == false) 
									{
										header('location: ../view/AdminAddProduct.php?msg=Give fullstop after each line in description');
									}
									else
									{
										$dir ="../upload/";
										$name =$_FILES['pimage']['tmp_name'];
										$rname = $_FILES['pimage']['name'];
										$ext = explode('.', $rname);
										$newname = uniqid().'.'.$ext[1];
										move_uploaded_file($name, $dir.$newname);

										if ($activity == "Available") {
											$finalAct = 1;
										}else{
											$finalAct = 0;
										}
						

										$status = productAdd($pname,$subcat,$quan,$buy,$sell,$date,$des,$finalAct,$newname);

										echo "Mara kha : ".$status;

										if ($status) {
											header('location: ../view/AdminAddProduct.php?msg=Product successfully added');
										}else{
											//header('location: ../view/AdminAddProduct.php?msg=Product is not added');
										}

									}
			}
		}



	
	}
	else{
		header('location: ../adminLogin.php');
	}

?>