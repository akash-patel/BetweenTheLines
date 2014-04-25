<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	$_SESSION['error'] = NULL;

	$reservationid = $_POST['reservationID'];
	$username = $_SESSION['username'];

	$query = "SELECT * FROM reservations  WHERE reservationid = '$reservationid'";
	$result = mysql_query($query);
	$startdatetimesec =  mysql_result($result, 0,'startdatetimesec');
	$currenttime = strtotime("now");

	//Checks to see if the reservation is deletable, 1800 seconds = 30 minutes
	if ($startdatetimesec > ($currenttime + 1800) ){

		$query = "DELETE FROM reservations WHERE reservationid = '$reservationid' and username = '$username' ";
		$result = mysql_query($query);
		if (!$result) die ("Database access failed: " . mysql_error());
		$_SESSION['success'] = 'The reservation has been successfully deleted.';

	}else

		$_SESSION['error'] = 'You cannot delete a reservation that has already begun or is within 30 minutes of its starting time.';

	header('Location: securedpage.php');
	exit;

?>