<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

	include 'functions.php'
?>

<html>
	<body style= "background-color: #F0F0F0 "></body>
	<head>
		<title>Admin Controls</title>
	</head>
	<h3>
		Administrative Controls
	</h3>
	<br>
	<!--"2012-03-24 17:45:12"-->
	<form method="POST" action="adminAdd.php">
		Add <input type="text" name="numReservations" size="4"> reservations from
		<br>
		Date: <input type="text" name="month" size="4" maxlength="2" value="month">-
		<input type="text" name="day" size="2" maxlength="2" value="day">-
		<input type="text" name="year" size="2" maxlength="4" value="year">
		<br>
		Time[00:00 - 24:00]: <input type="text" name="startTime" size="2" maxlength="5"> - 
		<input type="text" name="endTime" size="2" maxlength="5">
		<br>
		<input type="submit" value="Submit">
	</form>
	<p><a href="logout.php">Logout</a></p>
</html>


<?php
	print_something();
/*
		$username = $_SESSION['username'];
		$reservationid = strtotime("now");
		$startdatetime = $_SESSION['startdatetime'];
		$enddatetime = $_SESSION['enddatetime'];
		$startdatetimesec = $_SESSION['startdatetimesec'];
		$enddatetimesec = $_SESSION['enddatetimesec'];
		

	$query = "INSERT INTO reservations(username, reservationid, licenseplate, state, startdatetime, enddatetime, startdatetimesec, enddatetimesec, cc, cvv, ccexpdate) VALUES ('$username', $reservationid, '$licenseplate', '$state' , '$startdatetime','$enddatetime', $startdatetimesec, $enddatetimesec , '$cc' , $cvv , '$ccexpdate' )";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());
*/
?>