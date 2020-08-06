<?php
	require_once('../db/AdminUserFunction.php');
	session_start();

	if (isset($_POST['submit'])) {
		$myfname = $_POST['myfname'];
		$mylname = $_POST['mylname'];
		$myuname = $_POST['myuname'];
		$myemail = $_POST['myemail'];
		$myutype = $_POST['myutype'];
		$mypass = $_POST['mycpass'];

		$result = getsingleUserEmailAndUname($_SESSION['mid']);
		$result1 = getsingleUserEmailAndUname($_SESSION['mid']);
		$upimg= $_FILES['myuimage'];
		$usrValid="";
		$em = "";
		$length1 = validUserName($myfname);
		$length2 = validUserName($mylname);
		$length3 = validUName($myuname);

		if (empty($myfname) || empty($mylname) || empty($myuname) || empty($myemail) || empty($myutype) || empty($mypass)) {
			header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Please fill all data');
			//echo '<script type="text/javascript">alert('.$utype.');</script>';
		}else{
			if (strlen($myfname) != $length1 || strlen($mylname) != $length2){
					header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Firsname/Lastname is not valid');
			}else{
				while ($rows = mysqli_fetch_assoc($result)) {
						if ($rows['email'] == $myemail) {
							$em = 1;
							break;
						}else{
							$em=0;
						}
					}
					if ($em == 1) {
						header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Email already exist');
					}else{
						if (verifyEmail($myemail,'@') == false) {
						header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Email is not valid');
						}else{
							$splitEmail = explode("@", $myemail);

							if (verifyEmail($splitEmail[1], '.') == false) {
								header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Email is not valid');
							}else{
								while ($row = mysqli_fetch_assoc($result1)) {
									if ($row['username'] == $myuname) {
										$usrValid = TRUE;
										break;
									}else{
										$usrValid=FALSE;
									}
								}
								if ($usrValid) {
									header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Username already exist');
								}else{
									if (strlen($myuname) != $length3) {	
										header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Username is not valid');
									}else{
										if ($mypass != $_SESSION['password']) {
											header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Wrong Password');
										}else{
											$data = singleUser($_SESSION['mid']);
										$row = mysqli_fetch_assoc($data);
										if (empty($_FILES['myuimage']['name'])) {
											$newname = $row['image'];
										}elseif(empty($_FILES['myuimage']['name']) == false){
											$dir ="../upload/";
											$name =$_FILES['myuimage']['tmp_name'];
											$rname = $_FILES['myuimage']['name'];
											$ext = explode('.', $rname);
											$newname = uniqid().'.'.$ext[1];
											move_uploaded_file($name, $dir.$newname);
										}
										
										$myfullname = $myfname."  ".$mylname;
										date_default_timezone_set('Asia/Dhaka');
										$mytime = date("Y-m-d h:i:sa");

										$status = updateProfile($_SESSION['mid'],$myuname,$myemail,$myfullname,$newname,$myutype,$mytime);

										if ($status) {
											$_SESSION['username'] = $myuname;
											header('location: ../view/AdminProfileView.php');
											unset($_SESSION['mid']);	
										}else{
											header('location: ../view/AdminProfileUpdate.php?id='.$_SESSION['mid'].'&msg=Updating error');
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