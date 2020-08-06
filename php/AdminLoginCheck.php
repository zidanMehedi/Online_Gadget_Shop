<?php
	require_once('../db/AdminUserFunction.php');
	session_start();

	if (isset($_POST['submit'])) {
		$uname = $_POST['username'];
		$pass = $_POST['password'];

		if(empty($uname) == true || empty($pass) == true){
			header('location: ../AdminLogin.php?msg=Please Fill Data');
			
		}else{

			if(validUser($uname, $pass)){
				
				$_SESSION['username'] = $uname;
				$_SESSION['password'] = $pass;
				date_default_timezone_set('Asia/Dhaka');
				$_SESSION['time'] = date("h:i:sa");
				setcookie("username", $uname, time()+3600, "/");
				
				header('location: ../view/AdminHome.php');

			}else{
				header('location: ../AdminLogin.php?msg=Invalid Username/Password');
			}
		}
		
	}else{
		header('location: ../adminLogin.php');
	}

?>