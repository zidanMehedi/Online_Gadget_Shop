<?php 

	require_once('../db/AdminUserFunction.php');
	session_start();

	if (isset($_POST['submit'])){
		$oldpass = $_POST['opass'];
		$newpass = $_POST['npass'];
		$nconpass = $_POST['cnpass'];

		$result = singleUserByUsername($_SESSION['username']);
		$data = mysqli_fetch_assoc($result);
		$currentid = $data['id'];

		if (empty($oldpass) || empty($newpass) || empty($nconpass)) {
			header('location: ../view/AdminChangePassword.php?msg=Please fill all data');
		}else{
			if ($oldpass != $_SESSION['password']) {
				header('location: ../view/AdminChangePassword.php?msg=Wrong Password');
			}else{
				if ($newpass != $nconpass) {
					header('location: ../view/AdminChangePassword.php?msg=Confirm password not matched');
				}else{
					$status = changePassword($currentid,$newpass);
					if ($status) {
						header('location: AdminLogout.php');
					}else{
						header('location: ../view/AdminChangePassword.php?msg=Password is not changed');
					}
				}
			}
		}

	}else{
		header('location: ../adminLogin.php');
	}

 ?>