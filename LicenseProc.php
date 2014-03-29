<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	$_SESSION['error'] = NULL;
	$lc=$_POST['lname'];
	

	// Retrieve row from database according to user's input
	$query = "SELECT * FROM reservations  WHERE licenseplate = '$lc'";
			$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	if (mysql_num_rows($result) == 1) {

		header('Location: Fourth.php');
	}
	else {
		// Jump to third page
		$_SESSION['error'] = "Error: No reservation detected for your car.";
		header('Location: Third.php');
	}

?>