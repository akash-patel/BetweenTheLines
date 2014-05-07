<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

	$username = $_SESSION['username'];
	$number = $_POST['number'];
	$startdate = $_POST['startdate'];
	$starttime = $_POST['starttime'];
	$enddate = $_POST['enddate'];
	$endtime = $_POST['endtime'];
	$reservationid = strtotime("now");

	//Format used below: YYYY-MM-DD HH:MM:SS
	$startdatetime = $startdate . ' ' . $starttime;
	$enddatetime = $enddate . ' ' . $endtime;

	$startdatetimesec = strtotime($startdatetime);
	$enddatetimesec = strtotime($enddatetime);
	$licenseplate = $_POST['licenseplate'];
	$state = $_POST['state'];

	$query = "INSERT INTO reservations(username, reservationid, licenseplate, state, startdatetime, enddatetime, startdatetimesec, enddatetimesec) VALUES ('$username', $reservationid, '$licenseplate', '$state' , '$startdatetime','$enddatetime', $startdatetimesec, $enddatetimesec)";

	for ($i=0; $i < $number; $i++) { 
		$result = mysql_query($query);
		if (!$result) die ("Database access failed: " . mysql_error());
	}

	header('Location: admin.php')
	
?>