<?php

session_start();
require_once('../db/buyerFunctions.php');



if (isset($_REQUEST['btn'])) 
{

	function verifyEmail($myEmail,$handler)
	{
		$temp = 0;
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

	$username = $_SESSION['Username'];
	$NewName = $_REQUEST['newName'];
	$NewEmail = $_REQUEST['newEmail'];
	$NewCon = $_REQUEST['newCon'];
	//echo $NewEmail.$NewCon.$NewName;

	if(empty($NewName) == true || empty($NewEmail) == true || empty($NewCon) == true)
	{
		header('location: ../view/Profile/buyerContact.php');
	}
	else
	{
		if (!verifyEmail($NewEmail,'@')) 
		{
			//header('location: ../view/Profile/buyerContact.php');
			echo '0';
		}
		elseif (!verifyNumber($NewCon)) 
		{
			echo '0';
			//header('location: ../view/Profile/buyerContact.php');
		}
		elseif (strlen($NewName)!=verifyName($NewName)) {
			//header('location: ../view/Profile/buyerContact.php');
			echo '0';
		}
		else
		{
			if (verifyEmail($NewEmail,'@')) 
			{
				
				$data = explode("@", $NewEmail);

				if (!verifyEmail($data[1], '.')) 
				{
					//header('location: ../view/Profile/buyerContact.php');
					echo '0';
				}
				else
				{
					$update = updateInfo($username,$NewName,$NewEmail,$NewCon);

					//header('location: buyerLogoutCheck.php');
					echo '1';
				}
			}
			else
				//header('location: ../view/Profile/buyerContact.php');
				echo '0';

		}
	}
}
else
				header('location: ../index.php');

?>