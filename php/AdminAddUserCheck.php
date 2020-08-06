<?php
	require_once('../db/AdminUserFunction.php');

	if (isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$utype = $_POST['utype'];
		$pass = $_POST['upass'];
		$cpass = $_POST['ucpass'];
		$result = getAllUsers();
		$result1 = getAllUsers();
		$img= $_FILES['uimage'];
		$usrValid="";
		$em = "";
		$length1 = validUserName($fname);
		$length2 = validUserName($lname);
		$length3 = validUName($uname);
	
		if (empty($fname) || empty($lname) || empty($uname) || empty($email) || empty($utype) || empty($pass) || empty($cpass) || empty($img['name'])) {
			header('location: ../view/AdminAddUser.php?msg=Please fill all data');
			//echo '<script type="text/javascript">alert('.$utype.');</script>';
		}else{
			if ($pass != $cpass) {
				header('location: ../view/AdminAddUser.php?msg=Password is not match');
			}else{
				if (strlen($fname) != $length1 || strlen($lname) != $length2){
					header('location: ../view/AdminAddUser.php?msg=Firsname/Lastname is not valid');
				}else{
					while ($rows = mysqli_fetch_assoc($result)) {
						if ($rows['email'] == $email) {
							$em = 1;
							break;
						}else{
							$em=0;
						}
					}
					if ($em == 1) {
						header('location: ../view/AdminAddUser.php?msg=Email already exist');
					}else{
						if (verifyEmail($email,'@') == false) {
						header('location: ../view/AdminAddUser.php?msg=Email is not valid');
						}else{
							$splitEmail = explode("@", $email);

							if (verifyEmail($splitEmail[1], '.') == false) {
								header('location: ../view/AdminAddUser.php?msg=Email is not valid');
							}else{
								while ($row = mysqli_fetch_assoc($result1)) {
									if ($row['username'] == $uname) {
										$usrValid = TRUE;
										break;
									}else{
										$usrValid=FALSE;
									}
								}
								if ($usrValid) {
									header('location: ../view/AdminAddUser.php?msg=Username already exist');
								}else{
									if (strlen($uname) != $length3) {	
										header('location: ../view/AdminAddUser.php?msg=Username is not valid');
									}else{
										$dir ="../upload/";
										$name =$_FILES['uimage']['tmp_name'];
										$rname = $_FILES['uimage']['name'];
										$ext = explode('.', $rname);
										$newname = uniqid().'.'.$ext[1];
										move_uploaded_file($name, $dir.$newname);
										$ufullname = $fname."  ".$lname;
										date_default_timezone_set('Asia/Dhaka');
										$time = date("Y-m-d h:i:sa");
										$status = UserAdd($uname,$pass,$email,$ufullname,$newname,$utype,$time);

										if ($status) {
											header('location: ../view/AdminAddUser.php?msg=User successfully added');
										}else{
											header('location: ../view/AdminAddUser.php?msg=User is not added');
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