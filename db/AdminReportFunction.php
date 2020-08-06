<?php 
	require_once('adminDB.php');

	function getRportDetails(){

		$conn = getConnection();
		$sql = "select * from report order by rid asc";
		$result = mysqli_query($conn,$sql);

		return $result;
	}

	function generateReport($sdate,$edate){

		$conn = getConnection();
		$sql = "select * from report where transaction_date between '{$sdate}' and '{$edate}'";
		$result = mysqli_query($conn,$sql);

		return $result;
	}

	function getTotalProfit($sdate,$edate){

		$conn = getConnection();
		$sql = "select sum(profit) as 'total_profit' from report where transaction_date between '{$sdate}' and '{$edate}'";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_assoc($result);

		return $data;
	}


 ?>