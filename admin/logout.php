<?php	
include('database/config.php');
  session_start();												
unset($_SESSION['login_admin']);
  	header("Location: {$hostname}/gis/admin/login.php");
	die();
?>