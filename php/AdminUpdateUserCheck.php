<?php
	require_once('../db/AdminUserFunction.php');
	session_start();

	if (isset($_POST['submit'])) {
		$upfname = $_POST['upfname'];
		$uplname = $_POST['uplname'];
		$upuname = $_POST['upuname'];
		$upemail = $_POST['upemail'];
		$uputype = $_POST['uputype'];
		$uppass = $_POST['upupass'];
		$upcpass = $_POST['upucpass'];
		$result = getsingleUserEmailAndUname($_SESSION['uid']);
		$result1 = getsingleUserEmailAndUname($_SESSION['uid']);
		$upimg= $_FILES['upuimage'];
		$usrValid="";
		$em = "";
		$length1 = validUserName($upfname);
		$length2 = validUserName($uplname);
		$length3 = validUName($upuname);
	
		if (empty($upfname) || empty($uplname) || empty($upuname) || empty($upemail) || empty($uputype) || empty($uppass) || empty($upcpass)) {
			header('location: ../view/AdminUpdateUser.php?id='.$_SESSION['uid'].'&msg=Please fill all data');
			//echo '<script type="text/javascript">alert('.$utype.');</script>';
		}else{
			if ($uppass != $upcpass) {
				header('location: ../view/AdminUpdateUser.php?id='.$_SESSION['uid'].'&msg=Password is not match');
			}else{
				if (strlen($upfname) != $length1 || strlen($uplname) != $length2){
					header('location: ../view/AdminUpdateUser.php?id='.$_SESSION['uid'].'&msg=Firsname/Lastname is not valid');
				}else{
					while ($rows = mysqli_fetch_assoc($result)) {
						if ($rows['email'] == $upemail) {
							$em = TRUE;
							break;
						}else{
							$em = FALSE;
						}
					}
					if ($em) {
						header('location: ../view/AdminUpdateUser.php?id='.$_SESSION['uid'].'&msg=Email already exist');
					}else{
						if (verifyEmail($upemail,'@') == false) {
						header('location: ../view/AdminUpdateUser.php?id='.$_SESSION['uid'].'&msg=Email is not valid');
						}else{
							$splitEmail = explode("@", $upemail);

							if (verifyEmail($splitEmail[1], '.') == false) {
								header('location: ../view/AdminUpdateUser.php?id='.$_SESSION['uid'].'&msg=Email is not valid');
							}else{
								while ($row = mysqli_fetch_assoc($result1)) {
									if ($row['username'] == $upuname) {
										$usrValid = TRUE;
										break;
									}else{
										$usrValid=FALSE;
									}
								}
								if ($usrValid) {
									header('location: ../view/AdminUpdateUser.php?id='.$_SESSION['uid'].'&msg=Username already exist');
								}else{
									if (strlen($upuname) != $length3) {	
										header('location: ../view/AdminUpdateUser.php?id='.$_SESSION['uid'].'&msg=Username is not valid');
									}else{

										$data = singleUser($_SESSION['uid']);
										$row = mysqli_fetch_assoc($data);
										if (empty($_FILES['upuimage']['name'])) {
											$newname = $row['image'];
										}elseif(empty($_FILES['upuimage']['name']) == false){
											$dir ="../upload/";
											$name =$_FILES['upuimage']['tmp_name'];
											$rname = $_FILES['upuimage']['name'];
											$ext = explode('.', $rname);
											$newname = uniqid().'.'.$ext[1];
											move_uploaded_file($name, $dir.$newname);
										}
										
										$upfullname = $upfname."  ".$uplname;
										date_default_timezone_set('Asia/Dhaka');
										$uptime = date("Y-m-d h:i:sa");

										$status = updateUser($_SESSION['uid'],$upuname,$uppass,$upemail,$upfullname,$newname,$uputype,$uptime);

										if ($status) {
											header('location: ../view/AdminUserDetails.php?msg=Updating successfull');
											unset($_SESSION['uid']);
										}else{
											header('location: ../view/AdminUserDetails.php?msg=Updating error');
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}else{
		header('location: ../adminLogin.php');
	}
?>