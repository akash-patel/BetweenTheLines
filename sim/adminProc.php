<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('../config.inc');
	$level=$_POST['floor'];
	$_SESSION['floor']=$level;
	header('Location: photosensor.php');
	
?>
	