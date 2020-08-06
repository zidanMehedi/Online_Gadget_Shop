<?php

session_start();
require_once('../db/buyerFunctions.php');
$Data = $_POST['cred'];
$json=json_decode($Data,TRUE);
//print_r($json);
//echo $json['btn'];

if (isset($json['btn'])) {

	$id = $json['uname'];
	$pass = $json['upass'];
	$temp = "";
	$line = "";

	if(empty($id) == true || empty($pass) == true)
	{
		header('location: ../view/buyerLogin.php');
	}
	else
	{
			/*$myFile = fopen('../BuyerInfo.txt', 'r');
			while (!feof($myFile)) {
				$line = fgets($myFile);
				if (stristr($line, $id)) {
					break;
				}
			}*/

			$user = loginCheck($id,$pass);
			//print_r($user);

			/*fclose($myFile);*/ 
				if ($id == $user['username'] && $pass == $user['password']) {
					$temp = TRUE;
					setcookie('id',$user['username'],time()+3600,"/");
					$_SESSION['Gender'] = $user['gender'];
					$_SESSION['Pass'] = $user['password'];
					$_SESSION['DOB'] = $user['dob'];
					$_SESSION['Username'] = $user['username'];
					$_SESSION['NAME'] = $user['fullname'];
					$_SESSION['EMAIL'] = $user['email'];
					$_SESSION['ADDRESS'] = $user['billing_address'];
					$_SESSION['CONTACT'] = $user['phone'];
					
				}
				else
					$temp = false;

			if ($temp == TRUE) {

				//header('location: ../index.php');
				echo "Done";
			}
			else
			{
				//header('location: ../view/buyerLogin.php');
				echo "Failed";
			}
	}
}

	else
		header('location: ../index.php');
?>