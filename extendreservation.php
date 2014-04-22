<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	$_SESSION['error'] = NULL;

	$reservationid = $_POST['reservationID'];
	$username = $_SESSION['username'];

	/*Figures out if the reservationid belongs to the user to determine if it can be extended*/
	$query = "SELECT * FROM reservations  WHERE reservationid = '$reservationid' and username = '$username'";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());

	$rows = mysql_num_rows($result);

	if ($rows == 0){
		$_SESSION['error'] = 'The Reservation ID entered is either not yours to extend or does not exist.';
		header('Location: securedpage.php');
		exit;
	}

	/*
	INSERT CODE HERE TO CHECK TO SEE IF THE RESERVATION IS EXTENDABLE, IF NOT, THEN THE PROGRAM SHOULD 
	JUMP BACK TO THE SECURED PAGE SAYING THAT THE RESERVATION IS NOT EXTENDABLE
	*/

	$startdatetime = mysql_result($result, 0, 'startdatetime');
	$enddatetime = mysql_result($result, 0, 'enddatetime');

	echo "You have chosen to extend reservation " . $reservationid;

	echo "<br />This reservation currently runs from " . $startdatetime . " to " . $enddatetime;

?>

	<form method="POST" action="checkextendreservation.php">
	<br>Please select the amount of time you would like the reservation to be extended for:
	<select name = 'extendhours'>
		<option value="15">15 Minutes</option>
		<option value="30">30 Minutes</option>
		<option value="45">45 Minutes</option>
		<option value="60">60 Minutes</option>
	</select>
	<input type="submit" value="Extend">
	</form>