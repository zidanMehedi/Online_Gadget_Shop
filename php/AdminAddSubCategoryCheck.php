<?php
	require_once('../db/AdminProductFunction.php');

	$subcatname = "";
	$catname = "";

	if (isset($_POST['submit'])) {
		$subcatname = $_POST['subcatname'];
		$catname = $_POST['cat'];
		$result = getCategoryAndSubcategory();
		$m = 0;
		while ($rows = mysqli_fetch_assoc($result)) {
			if ($rows['cat_name'] == $catname && $rows['subcat_name'] == $subcatname) {
				$m = 1;
				break;
			}else{
				continue;
			}
		}

		$length = validName($subcatname);

		if (empty($subcatname) || empty($catname)){
			header('location: ../view/AdminAddSubCategory.php?msg=Please fill all data');
		}elseif (strlen($subcatname) != $length) {
			header('location: ../view/AdminAddSubCategory.php?msg=Enter a valid name');
		}elseif ($m == 1) {
			header('location: ../view/AdminAddSubCategory.php?msg=Sub-Category under this category is already exist');
		}else{
			$status = subcategoryAdd($subcatname,$catname);
			if ($status) {
				header('location: ../view/AdminAddSubCategory.php?msg=Sub-Category successfully added');
			}else{
				header('location: ../view/AdminAddSubCategory.php?msg=Sub-Category is not added');
			}
		}
	}else{
		header('location: ../adminLogin.php');
	}