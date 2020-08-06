<?php

session_start();
require_once('../db/buyerFunctions.php');

$id = "";
$name = "";
$email = "";
$dob = "";
$address = "";
$con = "";
$gender = "";
$pass = "";
$cpass = "";

if(isset($_POST['cred']))
{
	$Data = $_POST['cred'];
	$json = json_decode($Data,TRUE);

	//print_r($json);

	if (isset($json['btn'])) {

		$id = $json['Uname'];
		$name = $json['Name'];
		$email = $json['Email'];
		$dob = $json['Dob'];
		$address = $json['Address'];
		$con = $json['Con'];
		$gender = $json['Gender'];
		$pass = $json['Pass'];
		$cpass = $json['ConPass'];


		function verifyEmail($myEmail,$handler)
		{
			$temp = 0;
			//$handlerExist = false;
			$array = str_split($myEmail);
			 for ($i=0; $i < count($array); $i++) { 
			 	if ($array[$i] == $handler) {
			 		$temp+=1;
			 	}
			 	else
			 		continue;
			 }

			 if ($temp==1) {
			 	return true;
			 }
			 else
			 	return false;
		}

		function verifyNumber($myNumber)
		{
			
				if (ctype_digit($myNumber) && strlen($myNumber)==11)
				{
					return true;
				}
				else
					return false;
				
		}

		function verifyName($Name)
		{
			$alphabetBox = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',' ','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			$nameArray = str_split($Name);
			$temp = 0;
			foreach ($nameArray as $key) {
				foreach ($alphabetBox as $alphabet) {
					if ($key == $alphabet) {
						$temp+=1;
					}
					else
						$temp=$temp;
				}
			}
			return $temp;
		}

		if(empty($id) == true || empty($pass) == true || empty($cpass) == true || empty($name) == true || empty($email) == true || empty($dob) == true || empty($address) == true || empty($con) == true || empty($gender) == true)
		{
			//header('location: ../view/buyerReg.php');
			echo "Failed";
		}
		else
		{
			if($pass!=$cpass)
			{
				//header('location: ../view/buyerReg.php');
				echo "Failed";
			}
			elseif(strlen($pass)<8)
			{
				echo 'Failed';
			}
			elseif (!verifyEmail($email,'@')) 
			{
				//header('location: ../view/buyerReg.php');
				echo "Failed";
			}
			elseif (!verifyNumber($con)) 
			{
				//header('location: ../view/buyerReg.php');
				echo "Failed";
			}
			elseif (strlen($name)!=verifyName($name)) {
				//header('location: ../view/buyerReg.php');
				echo "Failed";
			}
			else
			{
				if (verifyEmail($email,'@')) 
				{
					
					$data = explode("@", $email);

					if (!verifyEmail($data[1], '.')) 
					{
						//header('location: ../view/buyerReg.php');
						echo "Failed";
					}
					else
					{
						$user = registration($id,$pass,$name,$email,$dob,$address,$gender,$con);
						//header('location: ../view/buyerLogin.php');
						echo "Done";
					}
				}
				else
				{
					//header('location: ../view/buyerReg.php');
					echo "Failed";
				}

			}
		}
	}
	else
		echo "Failed";
}
else
	header('location: ../index.php');
?>