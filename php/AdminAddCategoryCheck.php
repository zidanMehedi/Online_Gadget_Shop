<?php
	require_once('../db/AdminProductFunction.php');

	$catname = "";

	$result = getAllCategory();
	
	
	if (isset($_POST['submit'])) {
		$catname = $_POST['catname'];
		$m = 0;
		while ($rows = mysqli_fetch_assoc($result)) {
			if ($rows['cat_name'] == $catname) {
				$m = 1;
				break;
			}else{
				continue;
			}
		}

		$length = validName($catname);

		if (empty($catname)){
			header('location: ../view/AdminAddCategory.php?msg=Please fill all data');
		}elseif (strlen($catname) != $length) {
			header('location: ../view/AdminAddCategory.php?msg=Enter a valid name');
		}elseif ($m == 1) {
			header('location: ../view/AdminAddCategory.php?msg=Category already exist');
		}else{
			$status = categoryAdd($catname);
			if ($status) {
				header('location: ../view/AdminAddCategory.php?msg=Category successfully added');
			}else{
				header('location: ../view/AdminAddCategory.php?msg=Category is not added');
			}
		}
	}else{
		header('location: ../adminLogin.php');
	}