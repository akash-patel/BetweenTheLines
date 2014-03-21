<?php

	// Inialize session
	session_start();

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Reservation - Between the Lines</title>
	</head>
	<body>

	<p><a href="logout.php">Logout</a></p>

	</body>
</html>
