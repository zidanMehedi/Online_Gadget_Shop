<?php 

error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';
if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {



 ?>


<link rel="stylesheet" type="text/css" href="../css/SellerProduct.css">

<script type="text/javascript" src="../js/SellerScript.js"></script>

<center>
	<h1>
		Customer Details
	</h1>
	<table border="1">
		<tr>
			<th>cID</th>
			<th>UserName</th>
			<th>FullName</th>
			<th>Email</th>
			<th>DOB</th>
			<th>Gender</th>
			<th>Phone</th>
		</tr>

		<?php 

			$data = customer_details();
			while ($row = mysqli_fetch_assoc($data)) {
				echo "
				<tr>
				     <td>".$row['cid']."</td>
				     <td>".$row['username']."</td>
				     <td>".$row['fullname']."</td>
				     <td>".$row['email']."</td>
				     <td>".$row['dob']."</td>
				     <td>".$row['gender']."</td>
				     <td>".$row['phone']."</td>
				    
				</tr>
				";	
			}

		 ?>
	</table>
</center>




<?php 

}
else
{
	header('Location:../ControlPanel.php');
}

  ?>