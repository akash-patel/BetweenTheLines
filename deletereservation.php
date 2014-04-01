<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	$_SESSION['error'] = NULL;

	$reservationid = $_POST['reservationID'];
	$username = $_SESSION['username'];

	/*Figures out the number of rows before the delete*/
	$query = "SELECT * FROM reservations  WHERE username = '$username'";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());

	$rows_init = mysql_num_rows($result);

	$query = "DELETE FROM reservations WHERE reservationid = '$reservationid' and username = '$username' ";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());

	/*Figures out the number of rows after the delete*/
	$query = "SELECT * FROM reservations  WHERE username = '$username'";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());

	$rows_final = mysql_num_rows($result);

	if ($rows_init == $rows_final)
		$_SESSION['error'] = "The ReservationID entered is either not yours to delete or does not exist.";
	else
		$_SESSION['error'] = "The ReservationID entered has been deleted.";

	header('Location: securedpage.php');
	exit;

?>