<?php 
	require_once('adminDB.php');

	function getPromoLastId(){

		$conn = getConnection();
		$sql = "select max(did) as 'did' from discount";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_assoc($result);

		return $data;
	}

	function validPromoName($promo){

		$words = explode(" ", $promo);
		$length = count($words);
		if ($length == 1) {
			return true;
		}else{
			return false;
		}
	}

	function getPromoAndCID(){

		$conn = getConnection();
		$sql = "select promo_code, cid from discount";
		$result = mysqli_query($conn,$sql);

		return $result;
	}

	function promoCodeAdd($pcode,$pdis,$validity,$status,$cus){

		$conn = getConnection();
		$sql = "insert into discount values ('','{$pcode}','{$pdis}','{$validity}','{$status}', '','{$cus}')";
		if (mysqli_query($conn,$sql)) {
			return true;
		}else{
			return false;
		}
	}

	function getPromoCodeDetails(){

		$conn = getConnection();
		$sql = "select discount.did,discount.promo_code,discount.amount,discount.validity,discount.status,discount.cid,customer_user.fullname,customer_user.phone from discount,customer_user where discount.cid=customer_user.cid order by discount.did asc";
		$result = mysqli_query($conn,$sql);

		return $result;
	}

	function disablePromo($id){

		$conn = getConnection();
		$sql = "update discount set status='Disable' where did='{$id}'";
		if (mysqli_query($conn,$sql)) {
			return true;
		}else{
			return false;
		}
	}

	function getSearchPromo($key){

		$conn = getConnection();
		$sql = "select discount.did,discount.promo_code,discount.amount,discount.validity,discount.status,discount.cid,customer_user.fullname,customer_user.phone from discount,customer_user where discount.cid=customer_user.cid and (discount.did like '{$key}%' or discount.amount like '{$key}%' or discount.cid like'{$key}%' or customer_user.phone like '{$key}%') order by discount.did asc";
		$result = mysqli_query($conn,$sql);

		return $result;	
	}

	function singlePromo($id)
	{
		$conn = getConnection();
		$sql = "select * from discount where did='{$id}'";
		$result = mysqli_query($conn,$sql);

		return $result;
	}

	function promoCodeUpdate($id,$pdis,$validity,$status){

		$conn = getConnection();
		$sql = "update discount set amount='{$pdis}',validity='{$validity}',status='{$status}' where did='{$id}'";

		if (mysqli_query($conn,$sql)) {
			return true;
		}else{
			return false;
		}
	}

 ?>