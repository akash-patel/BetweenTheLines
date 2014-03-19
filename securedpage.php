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
		
			//Display the user's information, as well as the the number of reservations and their current reservations.

			$username = $_SESSION['username'];
			$query = "SELECT firstname FROM user  WHERE username = '$username'";
			$result = mysql_query($query);

			if (!$result) die ("Database access failed: " . mysql_error());

			echo 'Thank you for logging into your portal, ' . mysql_result($result, 0,'firstname') . '<br />';

			$query = "SELECT reservationid FROM reservations  WHERE username = '$username'";
			$result = mysql_query($query);

			if (!$result) die ("Database access failed: " . mysql_error());

			$rows = mysql_num_rows($result);

			echo "You currently have $rows reservation(s)." . '<br />' . "Here are your current reservations:". '<br />';

			for ($j = 0 ; $j < $rows ; ++$j)
			{

				echo 'ReservationID:' .  mysql_result($result, $j,'reservationid') . '<br />';

			}
			
		?>	

		<br /><br />Click on the button below to create a new reservation:<br /><br />
		
		<form method="POST" action="reservation.php"><input type="submit" value="Create a Reservation"></form>

		<p><a href="logout.php">Logout</a></p>
		
	</body>

</html>