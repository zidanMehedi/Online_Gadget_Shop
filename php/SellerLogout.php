<?php
session_start();

$d = session_destroy();
setcookie('timeout',$cookie_value,time()-1800,'/');

if ($d) {
	header('location:../ControlPanel.php');
}


?>