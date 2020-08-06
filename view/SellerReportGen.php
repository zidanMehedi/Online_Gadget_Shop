<script type="text/javascript" src="../js/SellerScript.js"></script>
<script type="text/javascript" src="../js/SellerValid.js"></script>
<script type="text/javascript" src="../js/jquery-3.4.1.js"></script>



<?php 
error_reporting(0);
session_start();
require_once '../db/SellerFunctions.php';


if ($_SESSION['name'] AND $_SESSION['type'] AND $_COOKIE['timeout']) {


?>

<center>
	<h1>Report</h1>
		<input type="date" name="date1" id="date1" onclick="date1Valid()" onchange="date1Valid()"> <b>To</b> <input type="date" name="date2" onclick="date2Valid()" onchange="date2Valid()" id="date2"> <button id="data" onclick="get();">Submit</button>
		<div id="report"></div><b id="dateE1" style="color: red"></b><b id="dateE2" style="color: red"></b>

		<br>
		<button id="export" onclick="downloadReport()">Export</button>
		<!-- <script>
			$(document).ready(function(){  
      $('#export').click(function(){  
           var excel_data = $('#report_gen').html();     
           window.location = "../php/export.php?data=" + excel_data;
      });  
 }); 
		</script> -->
</center>





<?php

}
else
{
	header('Location:../ControlPanel.php');
}


 ?>