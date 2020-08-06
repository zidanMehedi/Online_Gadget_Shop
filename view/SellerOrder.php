<script type="text/javascript" src="../js/SellerScript.js"></script>


<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';

if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {


?>

<center>
	<h1>Order List</h1>
		<table border="1">
			<tr>
				<th>Order No</th>
				<th>Order Date</th>
				<th>Customer Name</th>
				<th>Customer ID</th>
				<th>Total Cost</th>
				<th>Status</th>
				<th>Action</th>
			</tr>

				<?php 
					$data= orders();
					while ($row=mysqli_fetch_assoc($data)) {
					echo "
					<tr>
							<td align='center'>".$row['order_no']."</td>
						<td align='center'>".$row['order_date']."</td>
						<td align='center'>".$row['fullname']."</td>
						<td align='center'>".$row['cid']."</td>
						<td align='center'>".$row['total_cost']."</td>
						<td align='center'>".$row['status']."</td>
						<td align='center'><button value='".$row['order_no']."' onclick='approve(this.value)'>Approved</button> <button value='".$row['order_no']."' onclick='deliver(this.value)'>Delivered</button> <button value='".$row['order_no']."' onclick='reject(this.value)'>Rejected</button></td>
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