<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

?>

<html>

	<body style= "background-color: #F0F0F0 "></body>
	<head>
		<title>Secured Page</title>
	</head>

	<body>
		
		<?php

			/*Display the user's information, as well as the the number of reservations and their current reservations.
			Currently only the user's reservationIDs are pulled, we need to get it so that the user's other reservation
			information is also displayed.*/

			$username = $_SESSION['username'];
			$query = "SELECT firstname FROM users  WHERE username = '$username'";
			$result = mysql_query($query);

			if (!$result) die ("Database access failed: " . mysql_error());

			echo 'Thank you for logging into your portal, ' . mysql_result($result, 0,'firstname') . '.<br /><br />';

			$query = "SELECT * FROM reservations  WHERE username = '$username'";
			$result = mysql_query($query);

			if (!$result) die ("Database access failed: " . mysql_error());

			$rows = mysql_num_rows($result);

			echo "You currently have $rows reservation(s)." . '<br /><br />' . "Here are your current reservations:". '<br />';

		?>	

		<table style="width:600px">
			
			<tr>
		
				<td><b>Reservation ID</b></td>
				<td><b>License Plate</b></td>
				<td><b>Start Date and Time</b></td>
				<td><b>End Date and Time</b></td>
				
			</tr>
			
			<!-- Print out the details of each of the user's reservations-->

			<?php for ($j = 0 ; $j < $rows ; ++$j){ ?>

				<tr>
					<td><?php echo mysql_result($result, $j,'reservationid'); ?></td>
					<td><?php echo mysql_result($result, $j,'licenseplate'); ?></td>
					<td><?php echo mysql_result($result, $j,'startdatetime'); ?></td>
					<td><?php echo mysql_result($result, $j,'enddatetime'); ?></td>
				</tr>

			<?php } ?>
			
		</table>

		<br>
		<form method="POST" action="deletereservation.php">
		To Delete a reservation, type the Reservation number in the box and press Delete:<br>
		ReservationID: <input type="text" name="reservationID" size="10" maxlength="10">
		<input type="submit" value="Delete">
		</form>


		<br /><br />Click on the button below to create a new reservation:<br /><br />
		
		<form method="POST" action="reservation.php"><input type="submit" value="Create a Reservation"></form>

		<p><a href="logout.php">Logout</a></p>
		
	</body>

</html>