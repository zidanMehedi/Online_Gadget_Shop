<?php
	function getConnection(){
		$conn = mysqli_connect('localhost', 'root', '', 'oas');
		return $conn;
	}
?>