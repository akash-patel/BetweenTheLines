<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('../config.inc');

	$_SESSION['error'] = NULL;
	$lc=$_POST['lname'];
	$state = $_POST['state'];
	//$level=$_POST['floor'];
	// Retrieve row from database according to user's input
	$query = "SELECT * FROM reservations  WHERE licenseplate = '$lc' AND state = '$state' AND completed='0' ORDER BY startdatetimesec ASC";
			$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
	
	if (mysql_num_rows($result) >= 1) {
		$query = "SELECT SUBSTRING(psensorid,1,1) FROM occupancy WHERE istaken='0' LIMIT 1";
		$result = mysql_query($query);
		if (!$result) die ("Database access failed: " . mysql_error());

		$query = "UPDATE reservations SET completed='1' WHERE licenseplate = '$lc' AND state = '$state' AND completed='0' ORDER BY enddatetimesec ASC LIMIT 1";
		$result2 = mysql_query($query);
		if (!$result2) die ("Database access failed: " . mysql_error());
		
		$_SESSION['floor']=mysql_result($result, 0);
		header('Location: Fourth.php');
	}
	else {
		// Jump to third page
		$_SESSION['error'] = "Error: No reservation detected for your car.";
		header('Location: Third.php');
	}

?>
