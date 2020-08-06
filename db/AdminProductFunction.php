<?php 

	require_once('adminDB.php');

	function getAllCategory(){

		$conn = getConnection();
		$sql = "select * from category";
		$result = mysqli_query($conn,$sql);

		return $result;
	}

	function getProductLastId(){

		$conn = getConnection();
		$sql = "select max(pid) as 'pid' from product";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_assoc($result);

		return $data;
	}

	function validName($name)
	{
		$letter = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','-','(',')','0','1','2','3','4','5','6','7','8','9');
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


	function productAdd($pname,$subcat,$quan,$buy,$sell,$date,$des,$activity,$rname){

		$conn = getConnection();
		$sql1 = "select * from subcategory where subcat_name = '{$subcat}'";
		$result1 = mysqli_query($conn,$sql1);
		$sub = mysqli_fetch_assoc($result1);
		$subcatid = $sub['subcat_id'];

		$sql2 = "insert into product values ('','{$pname}','{$quan}','{$date}','{$buy}','{$sell}','{$des}','{$rname}','{$activity}','{$subcatid}')";
		if (mysqli_query($conn,$sql2)) {
			return true;
		}else{
			return false;
		}
	}

	function getAllProduct(){

		$conn = getConnection();
		$sql = "select product.pid, product.name, category.cat_name, 			subcategory.subcat_name, product.quantity, 						product.incoming_date, product.buying_price, 					product.selling_price, product.description, product.image, 		product.activity from product , category , subcategory where 	 product.subcat_id = subcategory.subcat_id and 					subcategory.cat_id = category.cat_id order by product.pid asc";
		$result = mysqli_query($conn,$sql);

		return $result;	
	}

	function getSearchProduct($key){

		$conn = getConnection();
		$sql = "select product.pid, product.name, category.cat_name, subcategory.subcat_name, product.quantity, product.incoming_date, product.buying_price, product.selling_price, product.description, product.image, product.activity from product , category, subcategory where product.subcat_id = subcategory.subcat_id and subcategory.cat_id = category.cat_id and product.name like '{$key}%' order by product.pid asc";
		$result = mysqli_query($conn,$sql);

		return $result;	
	}

	function deleteProduct($id){

		$conn = getConnection();
		$sql = "delete from product where pid = '{$id}'";
		if (mysqli_query($conn,$sql)) {
			return true;
		}else{
			return false;
		}
	}

	function singleProduct($id)
	{
		$conn = getConnection();
		$sql = "select * from product where pid='{$id}'";
		$result = mysqli_query($conn,$sql);

		return $result;
	}

	function productUpdate($pid,$name,$subcat,$quan,$buy,$sell,$date,$des,$finalAct,$imgname){

		$conn = getConnection();
		$sql1 = "select * from subcategory where subcat_name = '{$subcat}'";
		$result1 = mysqli_query($conn,$sql1);
		$sub = mysqli_fetch_assoc($result1);
		$subcatid = $sub['subcat_id'];
		mysqli_close($conn);
		$conn1 = getConnection();
		$sql2 = "update product set name='{$name}',quantity='{$quan}',incoming_date='{$date}',buying_price='{$buy}',selling_price='{$sell}',description='{$des}',image='{$imgname}',activity='{$finalAct}',subcat_id='{$subcatid}' where pid ='{$pid}'";
		if (mysqli_query($conn1,$sql2)) {
			return true;
		}else{
			return false;
		}
	}

	function getCategoryLastId(){

		$conn = getConnection();
		$sql = "select max(cat_id) as 'cat_id' from category";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_assoc($result);

		return $data;
	}

	function categoryAdd($name){

		$conn = getConnection();
		$sql = "insert into category values ('','{$name}')";
		if (mysqli_query($conn,$sql)) {
			return true;
		}else{
			return false;
		}
	}

	function getSubCategoryLastId(){

		$conn = getConnection();
		$sql = "select max(subcat_id) as 'subcat_id' from subcategory";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_assoc($result);

		return $data;
	}

	function getCategoryAndSubcategory(){

		$conn = getConnection();
		$sql = "select category.cat_name,subcategory.subcat_name from category,subcategory where category.cat_id = subcategory.cat_id";
		$result = mysqli_query($conn,$sql);

		return $result;
	}

	function subcategoryAdd($sname,$cname){

		$conn = getConnection();
		$sql1 = "select * from category where cat_name = '{$cname}'";
		$result1 = mysqli_query($conn,$sql1);
		$cat = mysqli_fetch_assoc($result1);
		$catid = $cat['cat_id'];
		$sql2 = "insert into subcategory values ('','{$sname}','{$catid}')";
		if (mysqli_query($conn,$sql2)) {
			return true;
		}else{
			return false;
		}
	}

	function singleProductCategory($id){

		$conn = getConnection();
		$sql = "select product.pid,category.cat_name,subcategory.subcat_name from product,category,subcategory where product.subcat_id=subcategory.subcat_id and subcategory.cat_id=category.cat_id and pid = '{$id}'";
		$result = mysqli_query($conn,$sql);

		return $result;
	}


 ?>