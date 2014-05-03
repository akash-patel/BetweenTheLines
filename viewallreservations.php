<?php

	// Initialize session
	session_start();

	// Include database connection settings
	include('config.inc');
	include('header.php');

	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}

?>

<!DOCTYPE html>
<html>

	<head>
		<title><?php  echo "All of " . $_SESSION['username'] . "'s Reservations";?></title>
	</head>
	<body>

		<?php

			/*Display the user's information, as well as the the number of reservations and all of their reservations.*/

			$username = $_SESSION['username'];
			
			$query = "SELECT * FROM reservations  WHERE username = '$username' ORDER BY startdatetimesec";
			$result = mysql_query($query);

			if (!$result) die ("Database access failed: " . mysql_error());

			$rows = mysql_num_rows($result);

			echo "There have been a total of $rows reservation(s) made on this account." . '<br /><br />';

		?>

		<?php if ($rows != 0) { //don't display table if there are no reservations?> 
		
			Here are all of your reservations (former and current reservations):

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
					</tr>

				<?php } ?>
				
			</table>

		<?php } //end if statement ?>

		<p>Click <a href="securedpage.php">here</a> to return your portal.</p>

	</body>
</html>	

<?php include('footer.php');?>