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
		<title><?php  echo $_SESSION['username'] . "'s Portal";?></title>
	</head>

	<body>
		
		<?php

			/*Display the user's information, as well as the the number of reservations and their current reservations.
			Currently all of the reservations are pulled (including old reservations), not just the current ones*/

			$username = $_SESSION['username'];
			$query = "SELECT firstname FROM users  WHERE username = '$username'";
			$result = mysql_query($query);

			if (!$result) die ("Database access failed: " . mysql_error());

			echo 'Thank you for logging into your portal, ' . mysql_result($result, 0,'firstname') . '.<br /><br />';

			$query = "SELECT * FROM reservations  WHERE username = '$username' ORDER BY startdatetimesec";
			$result = mysql_query($query);

			if (!$result) die ("Database access failed: " . mysql_error());

			$rows = mysql_num_rows($result);

			echo "You currently have $rows reservation(s)." . '<br /><br />';

		?>	
		<?php if ($rows != 0) { //don't display table if there are no reservations?> 
		
			Here are your current reservations (this only includes reservations that are in progress or have not yet started):

			<table style="width:800px">
				
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
						<td>
							<form method="POST" action="deletereservation.php">
								<input type="hidden" name="reservationID" value="<?php echo mysql_result($result, $j,'reservationid') ?>">
								<input type="submit" value="Delete">
							</form>
						</td>
						<td>
							<form method="POST" action="extendreservation.php">
								<input type="hidden" name="reservationID" value="<?php echo mysql_result($result, $j,'reservationid') ?>">
								<input type="submit" value="Extend">
							</form>
						</td>
					</tr>

				<?php } ?>
				
			</table>


			<br>
			
		<?php } //end if statement ?>
		
		<!--Prints an error if incorrect ReservationID -->
		<font color="green">
			<?php 
				if (isset($_SESSION['success']))
				{
					echo $_SESSION['success'] . '<br /><br />';
					$_SESSION['success'] = NULL;
				}
			?>
		</font>

		<font color="red">
			<?php 
				if (isset($_SESSION['error']))
				{
					echo $_SESSION['error'] . '<br /><br />';
					$_SESSION['error'] = NULL;
				}
			?>
		</font>

		<br />Click on the button below to create a new reservation:<br /><br />
		
		<form method="POST" action="reservation.php"><input type="submit" value="Create a Reservation"></form>

		<p><a href="logout.php">Logout</a></p>
		
	</body>

</html>