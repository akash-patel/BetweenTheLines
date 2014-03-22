<?php

	// Initialize session
	session_start();

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

?>


<!DOCTYPE html>
<html>
	<body style= "background-color: #F0F0F0 "></body>
	<head>
		<title>Reservation - Between the Lines</title>
	</head>
	<body>

	<font color="red">Your reservation was successful!</font>
	<br>Here are the details of your reservation:

	<br>Start Time:
	<br>End Time:
	<br>Credit Card


	<p>Click <a href="securedpage.php">here</a> to return your portal.</p>
	<p><a href="logout.php">Logout</a></p>

	</body>
</html>
