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


<!DOCTYPE html>
<html>
	<body style= "background-color: #F0F0F0 "></body>
	<head>
		<title>Reservation - Between the Lines</title>
	</head>
	<body>

	<div align="center">

		<?php

			$vehiclesize = $_POST['vehiclesize'];
			$starttime = $_POST['starttime'];
			$endtime = $_POST['endtime'];
			$username = $_SESSION['username'];
			$reservationid = 4555;

			$time = strtotime($endtime) - strtotime($starttime);

			echo "You have selected to create reservation for a(n) " . strtolower($vehiclesize) . " sized vehicle is between " . $starttime . " and " . $endtime . ".<br /><br />";

			echo "You will be charged for " . floor($time / 3600) . " hour(s) and " . ($time % 3600) / 60 . " minute(s) in the garage.";

			/*Code to insert reservation into the database
			$query = "INSERT INTO reservations(username, reservationid, starttime,endtime) VALUES ('$username',$reservationid,'$starttime','$endtime')";
			$result = mysql_query($query);
			if (!$result) die ("Database access failed: " . mysql_error());
			*/

		?>

		<form method="POST" action="reservation3.php">

			<br>Please enter the license plate of your vehicle: <input type="text" name="licenseplate" size="7">

			<br><br>Please select the state of your vehicle's license plate:
			<select name = "state">
				<option value="Alabama">Alabama</option>
				<option value="Alaska">Alaska</option>
				<option value="Arizona">Arizona</option>
				<option value="Arkansas">Arkansas</option>
				<option value="California">California</option>
				<option value="Colorado">Colorado</option>				
				<option value="Connecticut">Connecticut</option>
				<option value="District of Columbia">District of Columbia</option>
				<option value="Delaware">Delaware</option>
				<option value="Florida">Florida</option>
				<option value="Georgia">Georgia</option>
				<option value="Hawaii">Hawaii</option>
				<option value="Idaho">Idaho</option>
				<option value="Illinois">Illinois</option>
				<option value="Indiana">Indiana</option>
				<option value="Iowa">Iowa</option>
				<option value="Kansas">Kansas</option>
				<option value="Kentucky">Kentucky</option>
				<option value="Louisiana">Louisiana</option>
				<option value="Maine">Maine</option>
				<option value="Maryland">Maryland</option>
				<option value="Massachusetts">Massachusetts</option>
				<option value="Michigan">Michigan</option>
				<option value="Minnesota">Minnesota</option>
				<option value="Mississippi">Mississippi</option>
				<option value="Missouri">Missouri</option>
				<option value="Montana">Montana</option>
				<option value="Nebraska">Nebraska</option>
				<option value="Nevada">Nevada</option>
				<option value="New Hampshire">New Hampshire</option>
				<option value="New Jersey">New Jersey</option>
				<option value="New Mexico">New Mexico</option>
				<option value="New York">New York</option>
				<option value="North Carolina">North Carolina</option>
				<option value="North Dakota">North Dakota</option>
				<option value="Ohio">Ohio</option>
				<option value="Oklahoma">Oklahoma</option>
				<option value="Oregon">Oregon</option>
				<option value="Pennsylvania">Pennsylvania</option>
				<option value="Rhode Island">Rhode Island</option>
				<option value="South Carolina">South Carolina</option>
				<option value="South Dakota">South Dakota</option>
				<option value="Tennessee">Tennessee</option>
				<option value="Texas">Texas</option>
				<option value="Utah">Utah</option>
				<option value="Vermont">Vermont</option>
				<option value="Virginia">Virginia</option>
				<option value="Washington">Washington</option>
				<option value="West Virginia">West Virginia</option>
				<option value="Wisconsin">Wisconsin</option>
				<option value="Wyoming">Wyoming</option>						
			</select>

			<br><br>Please enter your Credit Card number: <input type="text" name="creditcard" size="16">

			<br><br>Please enter your CVV/CVV2 code: <input type="text" name="cvv" size="4">

			<br><br>Please enter your Credit Card's expiry date (MM | YY): <input type="text" name="ccmm" size="2"> | <input type="text" name="ccyy" size="2">

			<br><br><input type="submit" value="Next">

		</form>

	</div>

	<p><a href="logout.php">Logout</a></p>

	</body>
</html>
