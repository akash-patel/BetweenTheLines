<?php

	// Inialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

?>

<html>

	<head>
		<title>Secured Page</title>
	</head>

	<body>
		<?php
			$username = $_SESSION['username'];
			$query = "SELECT firstname FROM user  WHERE username = '$username'";
			$result = mysql_query($query);

			if (!$result) die ("Database access failed: " . mysql_error());

			echo 'Thank you for logging into your portal, ' . mysql_result($result, 0,'firstname') . '<br />';
		?>


		Here are your current reservations:	


		<br /><br />Click on the button below to create a new reservation:<br /><br />
		
		<form method="POST" action="reservation.php"><input type="submit" value="Create a Reservation"></form>

		<p><a href="logout.php">Logout</a></p>
		
	</body>

</html>