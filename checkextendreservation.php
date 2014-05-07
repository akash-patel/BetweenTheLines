<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	$_SESSION['error'] = NULL;

	$reservationid = $_SESSION['reservationid'];
	$extensionTime = $_POST['extensionTime']; //in Minutes

	$query = "SELECT * FROM reservations  WHERE reservationid = '$reservationid'";
	$result = mysql_query($query);
	if (!$result) die ("Database access failed: " . mysql_error());

	$enddatetimesec = mysql_result($result, 0, 'enddatetimesec');

	$newenddatetimesec = $enddatetimesec + $extensionTime * 60;

	for ($i = $enddatetimesec; $i < $newenddatetimesec ; $i+=900) {

		$j = $i + 900;
		
		$query = "SELECT * FROM reservations WHERE startdatetimesec < $j AND enddatetimesec > $i";
		$result = mysql_query($query);
		if (!$result) die ("Database access failed: " . mysql_error());

		$rows = mysql_num_rows($result);
		$max_spots = 45;

		if ( $rows >= $max_spots ) { 
			/*This number 5 should represent the maxmium number of spots 
			in the parking garage*/
			$_SESSION['error'] = "There is not enough room in the garage to extend!";
		}
	}

	if (!isset($_SESSION['error'])){

		$newenddatetime = date("Y-m-d H:i:s",$newenddatetimesec);
		$query = "UPDATE reservations SET enddatetimesec = $newenddatetimesec, enddatetime = '$newenddatetime' WHERE reservationid = '$reservationid'";
		$result = mysql_query($query);
		if (!$result) die ("Database access failed: " . mysql_error());
		$_SESSION['success'] = "Reservation was successfully extended!";
	}

	header('Location: securedpage.php');
	exit;

?>