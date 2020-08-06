<?php 
	require_once('AdminUserFunction.php');
	session_start();

	if (isset($_SESSION['username'])  && isset($_COOKIE['username'])) {	

		$uid = $_POST['userid'];

		$stat = deleteUser($uid);
		if ($stat == true) {					
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="100%" cellspacing="20px" style="margin-top: 2.5%">
		<tr>
			<th>User ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>Full Name</th>
			<th>Image</th>
			<th>User Type</th>
			<th colspan="2">Operation</th>
		</tr>

		<?php 

			$result = getUserDetails();
			while ($rows = mysqli_fetch_assoc($result)) {

		?>

		<tr align="center">
			<td><?php echo $rows['id']; ?></td>
			<td><?php echo $rows['username']; ?></td>
			<td><?php echo $rows['email']; ?></td>
			<td><?php echo $rows['fullname']; ?></td>
			<td><img src="../upload/<?php echo $rows['image'];?>" width="150px" height="150px"></td>
			<td><?php echo $rows['type']; ?></td>
			<td><a href="AdminUpdateUser.php?id=<?php echo $rows['id']; ?>" class="a1">Update</a></td>
			<td><button class="btn" onclick="DeleteUser(<?php echo $rows['id']; ?>)">Delete</button></td>
		</tr>
		<?php } ?>
			
	</table>
</body>
</html>

<?php 

	}else{
		echo "<script> alert('User Not Found'); </script>";
	}


	}else{
		header('location: ../adminLogin.php');
	}
?>